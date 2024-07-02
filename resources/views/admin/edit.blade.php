<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col>">
<form class="flex flex-col w-1/2">
    @foreach($product->getAttributes() as $key => $value)
        <label for="{{ $key }}"><b>{{ ucfirst($key) }}: </b></label>
        @if($key == 'description')
            <textarea id="{{ $key }}">{{ $value }}</textarea>
        @elseif(in_array($key, ['published']))
            <input type="checkbox" value="{{ $value }}" id="{{ $key }}" {{ $value? 'checked' : '' }}>
        @else
            <input type="text" value="{{ $value }}" id="{{ $key }}">
        @endif
    @endforeach
    <button>Save</button>
</form>
</body>
</html>

