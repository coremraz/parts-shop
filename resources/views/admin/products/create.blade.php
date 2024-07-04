<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<x-ui.admin.form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @foreach($columns as $column)
            @if($column != 'description' && $column != 'short_description' && $column != 'created_at' && $column != 'updated_at' && $column != 'id')
                <x-ui.admin.input name="{{ $column }}" />
            @endif
        @endforeach
    </div>

<x-ui.admin.textarea name="description" label="Description" class="h-48" id="description"/>

<x-ui.admin.textarea name="short_description" label="Short Description" class="h-24" id="short_description"/>

    <div class="flex items-center justify-end mt-6">
        <x-ui.admin.button type="submit">Add</x-ui.admin.button>
    </div>


</x-ui.admin.form>
</body>
</html>
