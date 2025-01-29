<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .post-form {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .post-form textarea, .post-form input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .post-form button {
            background-color: #1877f2;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        .post-form button:hover {
            background-color: #166fe5;
        }
        .post {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .post-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .post-header .user-info {
            display: flex;
            flex-direction: column;
        }
        .post-header .user-info span {
            font-weight: bold;
            color: #333;
        }
        .post-content {
            margin: 10px 0;
        }
        .post img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 10px;
        }
        .post-time {
            color: gray;
            font-size: 12px;
        }
    </style>
</head>
<body>
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
                    @if(auth()->user()->profile_image)
                        <img src="{{ auth()->user()->profile_image }}" alt="Profile Image" width="150px">
                    @endif

                    <div class="user-info">
                        <span>{{ $post->user->name }}</span>
                        <span class="post-time">{{ $post->created_at->format('F j, Y g:i A') }}</span>
                    </div>
                </div>
                
                <div class="post-content">
                    <p>{{ $post->content }}</p>
                </div>

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
