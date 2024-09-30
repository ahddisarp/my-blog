<!-- resources/views/admin/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
<h1  class="mt-4">Welcome to the Blog </h1>
    <h2 class="mt-4">Posts</h2>

    <a class="btn btn-primary mb-3" href="{{ route('admin.posts.create') }}">Create Post</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>contents</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        @can('update', $post)
                            <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
