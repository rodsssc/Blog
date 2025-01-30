
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
        @include('layouts.navigation')s
    </nav>
    <div class="container">
        <div class="post-form">
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
                   <a href="/user-profile/{{$post->user->id}}"><img src="{{ $post->user->profile_image }}" alt="Profile Image" width="150px"></a>
                    <p class="username"><small>@</small><small>{{ $post->user->name }}</small></p>

                </div>
                <div class="user-info">
                    <span class="post-time">{{ $post->created_at->format('F j, Y g:i A') }}</span>
                </div>
            </div>
    
            <div class="post-content">
                <p>{{ $post->content }}</p>
            </div>
    
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
            @endif
            <div class="comment-link">
                <a href="/comment/{{$post->id}}" class="comment-btn">Comment</a>
                <a href="/comment/{{$post->id}}" class="comment-count">({{ $post->comments->count() }})</a>
            </div>
            
        </div>
        
    @endforeach
    
    
    </div>
</body>
</html>
