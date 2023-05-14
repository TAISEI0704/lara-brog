<?php

namespace App\Http\Controllers;
//Postモデルを使う宣言
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
        // dd($request);
        //$requestに入っている値を、new Postでデータベースに保存するという記述
        $post = new Post;
        //左辺:テーブル、右辺が送られてきた値(formから送られてきたnameが入っている)
        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> user_id = Auth::id();

        $post -> save();

        return redirect()->route('posts.index');
    }

    //$idはindex.blade.phpから送られてきたid
    function show($id)
    {
        // dd($id);
        $post = Post::find($id);

        return view('posts.show',['post'=>$post]);
    }

    function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit',['post'=>$post]);
    }

    function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> save();

        return view('posts.show',['post'=>$post]);
    }
}
