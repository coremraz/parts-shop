@props(['catalogTree' => [
      'url1' => 'Главная',
      'url2' => 'Каталог товаров',
      'url3' => 'default',
      'url4' => 'default',
      'url5' => 'default',
    ]])

<div class="flex m-4 space-x-1">
    @foreach($catalogTree as $path)
        <span>{{ $path }}{{ !$loop->last ? ' /' : '' }}</span>
    @endforeach

</div>

