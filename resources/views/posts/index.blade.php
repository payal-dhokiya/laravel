@extends('layouts.app')

{{-- @section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Posts</h2>
        <a href="#" class="btn btn-primary">Create New Post</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col" class="text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-outline-primary">Show</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form method="post" action="#" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<div class="container py-5 ">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Posts</h2>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Create New Post</a>
    </div>
    @if (session('success') || session('error'))
    <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }}">
        {{ session('success') ?? session('error') }}
        {{-- <button type="button" class="close" data-dismiss="alert">×</button> --}}
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
                        <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm show-post" data-id="{{ $post->id }}" data-url="{{ route('post.show', $post->id) }}">Show</a>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                        <a href="javascript:void(0)" data-url="{{ route('post.delete', $post->id) }}" class="btn btn-outline-secondary btn-sm delete-post">Delete</a>
                    </div>
                    <small class="text-muted">Posted {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postModalLabel">Post Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="postDetails">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div> --}}

<div class="modal fade" data-bs-backdrop='static' id="postModal" data-id="{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postModalLabel">Post Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <img id="postImage" src="" alt="Post Image" class="img-fluid mb-3">
              </div>
                <div class="col-md-8">
                    <h5 id="postTitle"></h5>
                    <p id="postContent"></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p id="postCreated"></p>
                        </div>
                        <div class="col-md-6">
                            <p id="postUpdated"></p>
                        </div>
                    </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="card">
                    <div class="card-body" id="commentList">
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />
                       <div data-mdb-input-init class="form-outline w-100">
                        <form id="commentForm">
                            @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="commentContent" name="content" class="form-control" placeholder="Type comment..." />
                                    <div class="float-end mt-2 pt-1">
                                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Post comment</button>
                                        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">Cancel</button>
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>



<script>
    $(document).ready(function () {

        //show post in model view
        $('.show-post').click(function () {
            var postId = $(this).data('id');
            // console.log(postId);
            $.ajax({
                type: "GET",
                url: $(this).data('url'),
                data: "data",
                dataType: "json",
                success: function (response) {
                    var post = response.post;
                    var comments = response.comments;

                    var createdAt = moment(post.created_at).fromNow();
                    var updatedAt = moment(post.updated_at).fromNow();
                    $('#postImage').attr('src', '/storage/posts/' + post.featured_image);
                    $('#postTitle').text(post.name);
                    $('#postContent').text(post.content);
                    $('#postCreated').text('Created: ' + createdAt);
                    $('#postUpdated').text('Updated: ' + updatedAt);
                    $('#postModal').modal('show');

                     // Set postId on the comment form
                    $('#commentForm').data('id', postId);

                    //Show commnt data of post
                    $.ajax({
                        url: `/comments/${postId}`,
                        method: 'GET',
                        dataType: "json",
                        success: function (data) {
                            var commentsHtml = '';
                            data.comments.forEach(comment => {
                                 commentsHtml += `
                                 <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="30" height="30" />
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                        <p class="text-muted small mb-0">Created - ${moment(comment.created_at).fromNow()}</p>
                                    </div>
                                </div>
                                <p class="mt-3 mb-4 pb-2 comment-body" data-comment-id="${comment.id}" contenteditable="true">${comment.body} </p>
                                `;
                            });
                            $('#commentList').html(commentsHtml);
                        }
                    });
                }
            });

        });

        $('#commentList').on('blur', '.comment-body', function () {
            var commentId = $(this).data('comment-id');
            var commentBody = $(this).text();

            console.log(commentId, commentBody);
            $.ajax({
                url: `/comments/${commentId}`,
                method: "PUT",
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    commentBody: commentBody,
                },
                success: function (response) {
                    console.log('Comment updated successfully', response);
                }
            });
        });

        //Delete post
        $('.delete-post').click(function () {
            if(confirm("Are you sure want to delete item?")) {
                var postURL = $(this).data('url');
                $.ajax({
                    type: 'DELETE',
                    url: postURL,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response.success);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });


        // Submit and add new comment form via AJAX
        $('#commentForm').on('submit', function (e) {
        e.preventDefault();
        var postId = $('#commentForm').data('id');
        var content = $('#commentContent').val();

        $.ajax({
            url: `/posts/${postId}/comments`,
            method: 'POST',
            data: { content: content, postId: postId },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var comment = response.comment;
                    var commentHtml = `
                        <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="30" height="30" />
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                        <p class="text-muted small mb-0">Created - ${moment(comment.created_at).fromNow()}</p>
                                    </div>
                                </div>
                        <p class="mt-3 mb-4 pb-2">${comment.body} </p>
                    `;
                    $('#commentList').append(commentHtml);
                $('#commentContent').val('');
            }
        });

        $(document).on('click', '.delete-comment', function () {
        alert('dffffddd');
        if (confirm('Are you sure you want to delete this comment?')) {
            var commentId = $(this).data('id');

            $.ajax({
                url: `/comments/${commentId}`,
                method: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $(`.comment[data-id="${commentId}"]`).remove();
                    $(`.comment[data-id="${commentId}"]`).next('hr').remove();
                }
            });
        }
    });

    });

    });
</script>

@endsection

