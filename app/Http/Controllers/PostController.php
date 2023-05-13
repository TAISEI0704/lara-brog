<?php

namespace App\Http\Controllers;
//Postモデルを使う宣言
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function index()
    {
        // postsテーブルから全部のデータを取ってくる
        $posts = Post::all();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }
}
