@props(['brandInfo'])
<div class="flex flex-col m-4 space-x-1">
    <div class="flex">
        <span>{{$brandInfo['name']}}</span>
        @if($brandInfo['logo'])
            <img src="{{$brandInfo['logo']}}">
        @endif
    </div>
    <span>Страна производства: {{$brandInfo['country']}}</span>
    <span>Гарантия производителя: {{$brandInfo['warranty']}}</span>
    <a class="underline font-bold" href="#">Все товары бренда</a>
</div>

