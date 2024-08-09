@extends('components.layouts.admin-layout')

@section('content')


    <div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Product kind props</h1>

    <div class="bg-white shadow-md rounded my-6">
        <table class="w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Название</th>
                <th class="py-3 px-6 text-center">Редактировать</th>
                <th class="py-3 px-6 text-center">Удалить</th>
            </tr>
            </thead>
            <tbody class="text-gray-800 text-sm font-light">
            @foreach($productKindProps as $productKindProp)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $productKindProp->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $productKindProp->name }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('product-kind-props.edit', $productKindProp) }}" title="Редактировать" class="text-blue-400 hover:text-blue-600">
                            ✎
                        </a>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <form action="{{ route('product-kind-props.destroy', $productKindProp) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Удалить" class="text-red-500 hover:text-red-700">
                                ×
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $productKindProps->links() }}
</div>
@endsection
