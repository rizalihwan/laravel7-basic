<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest()->SimplePaginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beranda()
    {
        $posts = Post::where('status', 2)->latest()->get();
        return view('posts.beranda.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attr = $this->validateRequest();
        $attr['user_id'] = auth()->user()->id;
        $attr['slug'] = \Str::slug(request('title').\Str::random(15));
        $attr['status'] = 1;
        Post::create($attr);
        session()->flash('success', 'Data Berhasil Disimpan');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.admin.nilai', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $post->update(request()->all());
        session()->flash('success', 'Data Berhasil Dinilai');
        return redirect()->route('post.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Data Berhasil Dihapus!');
        return redirect()->route('post.index');
    }

    public function validateRequest()
    {
        return $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
