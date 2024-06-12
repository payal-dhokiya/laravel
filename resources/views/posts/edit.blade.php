@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Post</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('post.update', $post->id) }}" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Title</label>
                            <input type="text" class="form-control" name="name" value="{{ $post->name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" rows="5" required>{{ $post->content }}</textarea>
                        </div>
                        @if (isset($post) && $post->featured_image)
                        <div class="form-group mb-3">
                            {{-- <label for="current_image" class="form-label">Current Image</label> --}}
                            <img src="{{ asset('storage/posts/' . $post->featured_image) }}" alt="" height="50%" width="50%">
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="featured_image" class="form-label">{{ isset($post) ? 'Replace Image' : 'Upload Image' }}</label>
                        <input type="file" name="featured_image" accept="image/png, image/jpeg" />
                    </div>
                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Edit Post</button>
                            <a href="{{ route('post.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection