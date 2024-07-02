@props(['packageInfo'])

<div class="flex flex-col m-4 space-y-2 w-64">
        <span>Вес, кг: {{$packageInfo['weight']}}</span>
        <span>Длина, мм: {{$packageInfo['length']}}</span>
        <span>Ширина, мм: {{$packageInfo['width']}}</span>
        <span>Высота, мм: {{$packageInfo['height']}}</span>
 </div>

