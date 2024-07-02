<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center">
<form class="flex w-screen items-center justify-center" method="post">
    <div class="grid grid-cols-2 w-1/2 space-y-2">
        @foreach($product->getAttributes() as $key => $value)
            <div class="m-5 flex flex-col">
                @if($key != 'description' && $key != 'short_description')
                    <label for="{{ $key }}"><b>{{ ucfirst($key) }}: </b></label>
                    <x-ui.input type="text" value="{{ $value }}" id="{{ $key }}"/>
                @endif
            </div>
        @endforeach
    </div>
    <div class="space-y-12">
        <div class="flex flex-col">
            <label for="description"><b>Description: </b></label>
            <textarea class="h-80 w-[30rem]" id="description">{{ $product->description }}</textarea>
        </div>
        <div class="flex flex-col">
            <label for="short_description"><b>Short description: </b></label>
            <textarea class="h-80 w-96" id="description">{{ $product->short_description }}</textarea>
        </div>
        <x-ui.button type="submit">Save</x-ui.button>
    </div>
</form>

</body>
</html>

