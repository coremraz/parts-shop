@props(['viewModel'])
@extends('components.layouts.base')

@section('content')
    <div class="flex flex-col items-center w-screen">
        <x-product-card.category-tree :catalogTree="$viewModel->getCatalogTree()"/>
        <x-product-card.title :name="$viewModel->getKind()->name . ' ' . $viewModel->getProduct()->title"/>
        <div class="flex w-screen justify-around ">
            <div>
                <x-product-card.card-logo :logo="$viewModel->getLogo()"/>
                <x-product-card.short-description
                    :plural="$viewModel->getKind()->name_plural"
                    :name="$viewModel->getProduct()->title"
                    :article="$viewModel->getProduct()->article"
                    :shortDescription="$viewModel->getProduct()->short_description"
                />
            </div>
            <x-product-card.buy-block
                :price="$viewModel->getPrice()"
                :stock="$viewModel->getStock()"
                :deliveryMethods="$viewModel->getDeliveryMethods()"
            />
        </div>
        <x-product-card.card-menu/>
        <x-product-card.description :description="$viewModel->getProduct()->description" id="specs"/>
        <div class="flex justify-around w-screen">
            <div class="flex flex-col space-y-1">
                <span class="font-bold text-2xl mb-2">Технические характеристики</span>
                @foreach($viewModel->getCharacteristics() as $prop => $value)
                    <span>{!! $prop  !!}{{ $value }}</span>
                @endforeach
            </div>
            <div>
                <x-product-card.brand-info :brandInfo="$viewModel->getBrandInfo()" />
                @if($viewModel->getComplectation())
                    <x-product-card.complectation :complectation="$viewModel->getComplectation()"/>
                @endif
                <x-product-card.package-info :packageInfo="$viewModel->getPackageInfo()"/>
            </div>
        </div>
        <x-product-card.related-products :related="$viewModel->getRelatedProducts()"/>
        <h1 id="analogs" style="color:blue;"><b>АНАЛОГИ</b></h1>
        @foreach($viewModel->getAnalogies() as $vendor => $analog)
            <span><b>{{ $vendor }}:</b> {{ $analog }}</span>
        @endforeach
    </div>
@endsection
