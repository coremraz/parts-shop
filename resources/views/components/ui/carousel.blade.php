<div class="relative" id="{{ $id }}">
    <div class="flex space-x-6 overflow-hidden" id="{{ $id }}-container">
        {{ $slot }}
    </div>

    <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-200 rounded-full p-2 hover:bg-gray-300 focus:outline-none" id="{{ $id }}-prev">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-200 rounded-full p-2 hover:bg-gray-300 focus:outline-none" id="{{ $id }}-next">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>
</div>

<script>
    const container{{ $id }} = document.getElementById('{{ $id }}-container');
    const prevButton{{ $id }}  = document.getElementById('{{ $id }}-prev');
    const nextButton{{ $id }}  = document.getElementById('{{ $id }}-next');

    nextButton{{ $id }}.addEventListener('click', () => {
        container{{ $id }}.scrollBy({
            left: container{{ $id }}.offsetWidth / 3,
            behavior: 'smooth'
        });
    });

    prevButton{{ $id }}.addEventListener('click', () => {
        container{{ $id }}.scrollBy({
            left: -container{{ $id }}.offsetWidth / 3,
            behavior: 'smooth'
        });
    });
</script>
