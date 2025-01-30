<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments</title>
    <link rel="stylesheet" href="/css/comment.css">
</head>
<body>
    <div class="container">
        <h1>Comments</h1>
        <div class="post">
            <h2>{{ $post->content }}</h2>
            <p><strong>{{ $post->user->name }}</strong></p>
            <span class="post-time">
                {{ $post->created_at->format('F j, Y g:i A') }}
            </span>
        </div>
        <div class="comments-section">
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <h2>{{ $comment->content }}</h2>
                    <p>@<strong>{{ $comment->user->name }}</strong></p>
                    <span class="comment-time">
                        {{ $comment->created_at }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="add-comment">
        <form method="POST" action="{{ route('comment.store') }}">
            @csrf
            <textarea name="content" placeholder="Write a comment..." required></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit">Add Comment</button>
        </form>
    </div>
</body>
</html>
