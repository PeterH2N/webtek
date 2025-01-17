<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $gender
 * @property string $birthday
 * @property string $bio
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    public function posts(): HasMany {
        return $this->hasMany(Post::class)->whereNull('parent_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Post::class)->whereNotNull('parent_id');
    }

    public function likes(): BelongsToMany {
        return $this->belongsToMany(Post::class, 'likes', 'user_id');
    }

    public function dislikes(): BelongsToMany {
        return $this->belongsToMany(Post::class, 'dislikes', 'user_id');
    }

    public function friends(): Collection {
        $friends1 = $this->belongsToMany(User::class, 'friends', 'user1_id', 'user2_id')->get();
        $friends2 = $this->belongsToMany(User::class, 'friends', 'user2_id', 'user1_id')->get();

        return $friends1->merge($friends2);
    }

    public function mutuals(User $user): Collection {
        $myFriends = $this->friends();
        $theirFriends = $user->friends();
        return $myFriends->whereIn('id', $theirFriends->pluck('id'));
    }
    //

    protected $table = 'users';
}
