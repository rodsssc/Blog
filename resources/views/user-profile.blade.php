<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="/css/user-profile.css">
   <title>User Profile</title>
  
</head>
<body>
    <nav>
        @include('layouts.navigation')
    </nav>
    @if($user_profile->isNotEmpty())
        <div class="profile-header">
            <div class="profile-container">
                <div class="profile-info">
                    <div class="profile-picture">
                        <img src="{{ $user_profile->first()->user->profile_image ?? 'https://via.placeholder.com/150' }}" 
                             alt="Profile Picture">
                    </div>
                    <div class="profile-details">
                        <h1 class="profile-name">{{ $user_profile->first()->user->name }}</h1>
                        <div class="profile-email">{{ $user_profile->first()->user->email }}</div>
                    </div>
                    <p>{{$user_profile->first()->user->bio}}</p>
                </div>
            </div>
        </div>

        <div class="posts-container">
            @foreach ($user_profile as $post)
                <div class="post">
                    <div class="post-header">
                        <img src="{{ $post->user->profile_image ?? 'https://via.placeholder.com/40' }}" 
                             alt="User" 
                             class="post-user-img">
                        <div>
                            <div class="post-user-name">{{ $post->user->name }}</div>
                            <div class="post-time">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    @if($post->image)
                        <div class="post-content">
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="Post Image" 
                                 class="post-image">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="posts-container">
            <div class="no-posts">
                <p>No posts found.</p>
            </div>
        </div>
    @endif
</body>
</html>