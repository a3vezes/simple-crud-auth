<header class="md:flex md:justify-between md:items-center bg-white border-b-2 p-4 shadow-md">

    <h1 class="font-bold text-2xl text-blue-500">CharBuilder</h1>
    <nav>
        <ul class="md:flex md:space-x-2">
            <li class="text-bold border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 transition {{ request()->is('/') ? 'border-opacity-100' : '' }}"><a href="/" >Home</a></li>
            <li class="text-bold border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 transition {{ request()->is('characters') ? 'border-opacity-100' : '' }}"><a href="{{ route('characters.index') }}">Character</a></li>

            @auth
                <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                <form action="{{ route('session.destroy', auth()->user()) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-bold border-b-2 border-red-500 border-opacity-0 hover:border-opacity-100 transition" type="submit">Log Out</button>
                </form>
            @else
                <li class="text-bold border-b-2 border-blue-500 border-opacity-0 hover:border-opacity-100 transition {{ request()->is('login') ? 'border-opacity-100' : '' }}"><a href="{{ route('session.create') }}">Log In</a></li>
            @endauth
        </ul>
    </nav>
</header>
