@props(['action', 'method' => 'POST', 'submit' => 'Save'])

<div class="card">
    <div class="card-header">
        {{ $cardTitle }}
    </div>
    <div class="card-body">
        <form action="{{ $action }}" method="POST" {{ $attributes }}>
            @csrf
            @if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
                @method($method)
            @endif
            {{ $slot }}
            <button type="submit" class="btn btn-primary mt-3">{{ $submit }}</button>
        </form>
    </div>
</div>
