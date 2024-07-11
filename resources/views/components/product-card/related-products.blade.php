@props(['related'])

<h1 id="similar" style="color:blue;"><b>ПОХОЖИЕ ТОВАРЫ</b></h1>
<div>
    @foreach($related as $prop => $value)
        <span class="flex flex-col"><b>{{ $prop }}:</b> {{ $value }}</span>
    @endforeach
</div>
<br>
