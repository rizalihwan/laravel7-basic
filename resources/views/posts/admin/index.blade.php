@extends('layouts.app', ['title' => 'All-Posts'])
@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-active">
                    <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Status</th>
                        <th>Published On</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration + $posts->firstItem() - 1 . '.'}}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ Str::limit($post->title, 10, '') }}</td>
                        <td>{{ Str::limit($post->body, 10, '') }}</td>
                        <td>
                            @if ($post->status == 1)
                                <span class="badge badge-danger">Belum Dikonfirmasi</span>
                            @else
                                <span class="badge badge-success">Success</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('post.nilai', $post->slug) }}" class="btn btn-warning">Beri Nilai</a></td>
                    </tr>
                    @empty
                    <td>
                        <td colspan="5" style="color: red;" align="center">Data Kosong!</td>
                    </td>
                    @endforelse
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
