<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>Blog Posts</title>
</head>
<body>
    <nav>
        @include('layouts.navigation', ['user' => $user])
    </nav>
    <div class="container">
        <div class="post-form">
            <h1>New Post</h1>
            <form action="index" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="content" placeholder="What's on your mind?" required></textarea>
                <input type="file" name="image" accept="image/*">
                <button type="submit">Post</button>
            </form>
        </div>

        @foreach ($posts as $post)
        <div class="post">
            <div class="post-header">
                <div class="profile-image">
                   <a href="/user-profile/{{$post->user->id}}"><img src="{{ $post->user->profile_image }}" alt="Profile Image"></a>
                </div>
                <div class="user-info">
                    <h4 class="username">{{ $post->user->name}}</h4>
                    <span class="post-time">{{ $post->created_at->diffForHumans()}}</span>
                </div>
            </div>
    
            <div class="post-content">
                <p>{{ $post->content }}</p>
            </div>
            <div class="photo">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                @endif
          </div>
            <div class="comment-link">
                <a href="/comment/{{$post->id}}" class="comment-btn">Comment</a>
                <a href="/comment/{{$post->id}}" class="comment-count">({{ $post->comments->count() }})</a>
            </div>
        </div>
    @endforeach
    
    </div>
</body>
</html>
