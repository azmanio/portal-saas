@props(['action', 'method' => 'POST', 'submit' => 'Save'])

<form action="{{ $action }}" method="POST" {{ $attributes }}>
    @csrf
    @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif
    {{ $slot }}
    <button type="submit" class="btn btn-primary mt-3">{{ $submit }}</button>
</form>
