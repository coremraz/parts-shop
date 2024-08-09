@props(['title' => 'Заголовок', 'description' => 'Краткое описание статьи. Несколько слов о том, о чем идет речь.'])

<div class="p-4 min-w-64 max-w-64 flex flex-col items-center border border-gray-200">
    <img src="https://via.placeholder.com/600x400" alt="Новость 1" class="w-full h-48 object-cover">
    <div class="flex flex-col items-center p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">{{$title}}</h3>
        <p class="text-gray-700 text-sm mb-4">{{$description}}</p>
        <a href="#" class="inline-block px-4 py-2 bg-blue-500 text-white hover:bg-blue-600">Подробнее</a>
    </div>
</div>
