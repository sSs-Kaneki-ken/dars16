@extends('layouts.main')

@section('content')
    <section class="content">
        <div class="container mt-5">
            <h1 class="mb-3">Create New Post</h1>

            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </form>
        </div>
    </section>
@endsection