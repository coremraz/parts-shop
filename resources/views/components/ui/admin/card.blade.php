
<div class="flex flex-col w-1/2 m-4 items-center bg-white shadow-md rounded p-2">
    @if(isset($title))
        <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>
