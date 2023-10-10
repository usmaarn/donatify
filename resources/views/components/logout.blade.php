<form action="{{route('logout')}}" method="post">
    @csrf
    <button {{ $attributes }} type="submit">{{ $slot }}</button>
</form>
