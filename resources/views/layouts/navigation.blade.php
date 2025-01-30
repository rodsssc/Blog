<nav class="navbar">
    <ul class="navbar-ul">
        <li><a href="/index">Home</a></li>
        <li><a href="/profile">Profile</a></li>
       
        @if(Auth()->check())
        <li>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
      
                <li>
                    <img src="{{ $user->profile_image ?? 'https://via.placeholder.com/40' }}" 
                             alt="User" 
                             class="profile_image">
                </li>
         
        </li>
        
        @else
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
    @endif
    </ul>
</nav>
<link rel="stylesheet" href="/css/navigation.css">
