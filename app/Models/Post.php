<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $title
 * @property string|null $content
 * @property int $user_id
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Post> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $dislikes
 * @property-read int|null $dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\User|null $owner
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Post::class, 'parent_id', 'id');
    }

    public function commentCount(): int {
        $count = 0;
        return $this->commentCounter($count);
    }

    private function commentCounter(int &$count): int {

        foreach ($this->comments as $comment) {
            $count++;
            $comment->commentCounter($count);
        }
        return $count;
    }

    public function likes(): BelongsToMany {
        return $this->belongsToMany(User::class, 'likes', 'post_id');
    }

    public function userLikes(User $user): bool {
        $like = $this->likes->where('pivot.user_id', $user->id);
        return ($like->count() > 0);
    }

    public function userDislikes(User $user): bool {
        $dislike = $this->dislikes->where('pivot.user_id', $user->id);
        return ($dislike->count() > 0);
    }
    public function dislikes(): BelongsToMany {
        return $this->belongsToMany(User::class, 'dislikes', 'post_id');
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(Post::class, 'parent_id', 'id');
    }

    public function parentPost(): Post {
        $parent = $this->parent()->first();
        while ($parent->parent_id != null) {
            $parent = $parent->parent()->first();
        }

        return $parent;
    }

    public function like(User $user) {
        $like = new Like();

        $like->user_id = $user->id;
    }

    //
    protected $table = 'posts';
}
