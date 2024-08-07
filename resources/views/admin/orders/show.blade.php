@extends('components.layouts.admin-layout')

@section('content')



    <div class="container mx-auto p-4">
        <table class="w-1/2 table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">№</th>
                <th class="py-3 px-6 text-left">Модель</th>
                <th class="py-3 px-6 text-center">Количество</th>
            </tr>
            </thead>
            @foreach($order->details()->get() as $detail)
                <tbody class="text-gray-800 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $detail->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $detail->product()->first()->title  }}</td>
                    <td class="py-3 px-6 text-center">{{ $detail->quantity  }}</td>
                </tr>
                </tbody>
            @endforeach

        </table>
</div>
@endsection
