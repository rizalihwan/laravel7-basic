@extends('layouts.app', ['title' => 'All-Posts'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <b><h1>Beranda All Posts</h1></b>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <b style="color: rgb(25, 206, 25);">Title : {{ $post->title }}</b>
                    </div>
                    <div class="card-body my-3">
                        <b style="color: red;">Body : {{ $post->body }}</b>
                        <div class="text-secondary"><small>Posted By : {{ $post->user->name }}</small></div>
                    </div>
                    <div class="card-footer">
                        Project By &hearts; <a href="https://github.com/rizalihwan" target="_blank">RizalIhwan</a>
                    </div>
                </div>
                <div class="my-5"></div>
            @endforeach
        </div>
    </div>
</div>
@endsection
