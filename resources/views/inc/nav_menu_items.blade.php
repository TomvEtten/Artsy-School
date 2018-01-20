
<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">Finished</a><!--TODO add right url's-->
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#">Unfinished</a>
    </li>
    @guest
    @else
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/research/create') }}">Upload</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/profile/'.Auth::user()->profile->user_id) }}">My profile</a>
    </li>
    @endguest
</ul>