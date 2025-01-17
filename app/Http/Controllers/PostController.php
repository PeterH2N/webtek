<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public static function index(int $id) {
        return Post::find($id);
    }

    public static function create() {

    }

    public static function store(Request $request) {

    }
}
