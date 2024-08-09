@extends('components.layouts.admin-layout')

@section('content')


    <x-ui.admin.form method="POST" action="{{route('admin.product.store', $product)}}">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @foreach($product->getAttributes() as $key => $value)
            @if($key != 'description' && $key != 'short_description' && $key != 'created_at' && $key != 'updated_at' && $key != 'id')
                <x-ui.admin.input name="{{ $key }}" value="{{ $value }}" />
            @endif
        @endforeach
    </div>

    <x-ui.admin.textarea name="description" label="Description" class="h-48">{{ $product->description }}</x-ui.admin.textarea>

    <x-ui.admin.textarea name="short_description" label="Short Description" class="h-24">{{ $product->short_description }}</x-ui.admin.textarea>

    <div class="flex items-center justify-end mt-6">
        <x-ui.admin.button type="submit">Save</x-ui.admin.button>
    </div>
</x-ui.admin.form>
@endsection
