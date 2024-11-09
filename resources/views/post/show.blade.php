@extends('layouts.main')

@section('content')
    <section class="content">
        <div class="container mt-5">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <div class="mb-3">
                <h4>Description</h4>
                <p>{{ $post->description }}</p>
            </div>
            <div class="mb-3">
                <h4>Content</h4>
                <p>{{ $post->text }}</p>
            </div>
            <div class="mb-3">
                <h4>Image</h4>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('post.index') }}" class="btn btn-secondary ml-2">Back to List</a>
        </div>
    </section>
@endsection
