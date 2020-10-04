@extends('layouts.app', ['title' => 'Create-Post'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <b>Form Input Post</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title :</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Body :</label>
                            <input type="text" id="body" name="body" class="form-control">
                        </div>
                        <a href="{{ route('post.index') }}" class="btn btn-danger mb-2 ml-2">Back</a>
                        <button type="submit" class="btn btn-success mb-2">Save</button>
                    </form>
                </div>
                <div class="card-footer">
                    Created By &hearts; <a href="https://github.com/rizalihwan" target="_blank">RizalIhwan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
