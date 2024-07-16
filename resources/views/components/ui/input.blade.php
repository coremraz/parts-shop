<div>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           id="{{ $name }}" type="{{ $type ?? 'text' }}" name="{{ $name }}" {{ $attributes }}>

    @error($attributes['name'])
    <div>{{$message}}</div>
    @enderror
</div>
