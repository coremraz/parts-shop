@extends('components.layouts.admin-layout')

@section('content')



    <div class="container mx-auto p-4">

    <h1 class="text-3xl font-bold mb-4">Загрузка данных из Excel</h1>

    <form action="{{ route('admin.orders.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="excel_file" class="block text-gray-700 text-sm font-bold mb-2">Выберите файл Excel:</label>
            <input type="file" name="excel_file" id="excel_file" class="border border-gray-400 p-2 rounded-lg w-full">
        </div>
        @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Загрузить</button>

        <table class="mt-4 w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Номер заказа</th>
                <th class="py-3 px-6 text-left">Дата загрузки</th>
                <th class="py-3 px-6 text-center">Заказ получен</th>
                <th class="py-3 px-6 text-center">Подробнее</th>
            </tr>
            </thead>
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
            <tbody class="text-gray-800 text-sm font-light">
            @foreach($orders as $order)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $order->order_number }}</td>
                    <td class="py-3 px-6 text-left">{{ $order->order_date }}</td>
                    <td class="py-3 px-6 text-center">
                        <input id="order-{{ $order->id }}" type="checkbox" @checked($order->received) onchange="updateReceivedStatus({{ $order->id }}, this.checked)">
                    </td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('admin.orders.show', $order) }}" title="Развернуть" class="text-blue-400 hover:text-blue-600">
                            Развернуть
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
</div>
@endsection
<script>
    function updateReceivedStatus(orderId, received) {
        fetch('{{ route('admin.orders.updateReceived') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: orderId,
                received: received ? 1 : 0
            })
        });
    }
</script>
