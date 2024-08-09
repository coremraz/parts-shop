<div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}
    </label>
    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $attributes->get('class') }}"
              id="{{ $name }}" name="{{ $name }}">{{ $slot }}</textarea>

    @error($attributes['name'])
    <div>{{$message}}</div>
    @enderror          
</div>
