
<nav class="flex items-center bg-white shadow h-[70px]">
    <div class="wrapper w-full max-w-6xl mx-auto flex items-center justify-between gap-5">
        <a href="/" class="font-bold text-lg">Donatify</a>


        @guest()
            <div class="flex items-center gap-3">
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            </div>
        @else
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-1 p-3">
                    {{ explode(' ', auth()->user()->name)[0] }}
                    <i class="w-4" data-feather="chevron-down"></i>
                </button>
                <ul class="navmenu absolute top-full right-0 shadow bg-white min-w-[200px] border"
                    x-show="open" @click.outside="open = false">
                    <li><a href="{{ route('dashboard') }}">My Campaigns</a></li>
                    <li><a href="{{ route('donation.history') }}">My Donations</a></li>
                    <li><a href="{{ route('donations.create') }}">Create Campaign</a></li>
                    <hr/>
                    <li><a href="#">Profile</a></li>
                    <li><x-logout class="btn">Logout</x-logout></li>
                </ul>
            </div>
        @endguest
    </div>
</nav>
