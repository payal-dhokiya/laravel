@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Posts</h2>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Create New Post</a>
    </div>
    @if (session('success') || session('error'))
    <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('success') ?? session('error') }}
    </div>
@endif
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="text-center mt-3">
                        <img src="{{ asset('storage/posts/'. $post->featured_image ) }}" alt="" class="rounded" style="width: 200px; height: 150px; object-fit: cover;">
                    </div>
    
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary btn-sm show-post" data-url="{{ route('post.show', $post->id) }}">Show</button>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                        <a href="javascript:void(0)" data-url="{{ route('post.delete', $post->id) }}" class="btn btn-outline-secondary btn-sm delete-post">Delete</a>
                    </div>
                    <small class="text-muted">9 mins</small>
                    </div>
                </div>
                </div>
            </div>
        @endforeach    
    </div>
</div>
@endsection