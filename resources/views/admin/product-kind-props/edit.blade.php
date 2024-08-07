@extends('components.layouts.admin-layout')

@section('content')


    <x-ui.admin.form method="POST" action="{{route('product-kinds.store', $productKindProp)}}">
    @csrf
    @method('PATCH')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($productKindProp->getAttributes() as $key => $value)
            @if($key != 'description' && $key != 'short_description')
                <x-ui.admin.input name="{{ $key }}" value="{{ $value }}" />
            @endif
        @endforeach
    </div>
    <div class="flex items-center justify-end mt-6">
        <x-ui.admin.button type="submit">Save</x-ui.admin.button>
    </div>
</x-ui.admin.form>
@endsection
