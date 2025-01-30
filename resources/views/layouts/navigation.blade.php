<nav class="navbar">
    <ul>
        <li><a href="/index">Home</a></li>
        <li><a href="/profile">Profile</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">Log out</button>
            </form>
        </li>
    </ul>
</nav>

<style>
/* Navbar Styling */
.navbar {
    background: #007bff;
    padding: 12px 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Make navbar items inline */
.navbar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Navbar items */
.navbar ul li {
    margin: 0 15px;
}

/* Navbar links */
.navbar ul li a,
.logout-btn {
    color: white;
    text-decoration: none;
    font-weight: bold;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

/* Add hover effect */
.navbar ul li a:hover,
.logout-btn:hover {
    text-decoration: underline;
}

/* Style logout button */
.logout-form {
    display: inline;
}

.logout-btn {
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
}

.logout-btn:hover {
    text-decoration: underline;
}
</style>
