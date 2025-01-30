<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($user_profile->count() > 0)
        @foreach ($user_profile as $post)
            <ul>
                <li>{{ $post->user->name }}</li>
                <li>{{ $post->user->email }}</li>
                <li>{{ $post->image }}</li>
                {{-- <li>{{ $post->content }}</li> --}}
            </ul>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
            @endif
        @endforeach
    @else
        <p>No posts found.</p>
    @endif
</body>
</html>