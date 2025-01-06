<p>Hello {{ auth()->user()->name }}!</p>
<br />
<br />
<p>Welcome to user dashbaord.</p>
<br />
<br />
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
