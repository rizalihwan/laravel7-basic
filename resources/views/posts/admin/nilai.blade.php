@extends('layouts.app', ['title' => 'BeriNilai'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <center>Beri Nilai</center>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->slug) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Body :</label>
                            <input type="text" name="body" value="{{ $post->body }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nilai :</label>
                            <select name="status" class="form-control">
                                <option value="1" @if($post->status == 1) selected @endif>Tidak Lulus Penilaian</option>
                                <option value="2" @if($post->status == 2) selected @endif>Lulus Penilaian</option>
                            </select>
                        </div>
                        <a href="{{ route('post.admin') }}" class="btn btn-danger mb-2 ml-2">Back</a>
                        <button type="submit" class="btn btn-success mb-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
