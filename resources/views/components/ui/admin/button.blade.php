@php
    $isSubmit = $attributes->has('type') && $attributes->get('type') === 'submit';
@endphp

@if($isSubmit)
    <button {{ $attributes->except('href') }} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ $slot }}
    </button>
@else
    <a href="{{ $attributes->get('href') }}" {{ $attributes->except('href') }} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ $slot }}
    </a>
@endif