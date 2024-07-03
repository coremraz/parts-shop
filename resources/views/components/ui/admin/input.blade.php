<div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
        {{ $label ?? ucfirst(str_replace('_', ' ', $name)) }}
    </label>
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           id="{{ $name }}" type="{{ $type ?? 'text' }}" name="{{ $name }}" {{ $attributes }}>
</div>
