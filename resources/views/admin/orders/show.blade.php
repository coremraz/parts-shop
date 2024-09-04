@extends('components.layouts.admin-layout')

@section('content')
    <div class="container mx-auto p-4">

        <h1 class="text-3xl font-bold mb-4">Загрузка данных из Excel</h1>

        {{-- Вывод ошибки и списка товаров --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                @if (session('missingProducts'))
                    <ul>
                        @foreach (session('missingProducts') as $product)
                            <li>{{ $product }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <form action="{{ route('admin.orders.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
        </form>
    </div>
@endsection
