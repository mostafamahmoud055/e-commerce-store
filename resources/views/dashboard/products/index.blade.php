@extends('layouts.dashboard')
@section('title', 'Products')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('dashboard.products.create') }}"
            class="text-blue-600 visited:text-blue-600 border-2 border-gray-500 rounded-lg p-1 px-3">Create</a>
        {{-- <a href="{{ route('dashboard.products.trash') }}"
            class="text-red-600 visited:text-red-600 border-2 border-gray-500 rounded-lg p-1 px-3">Trash</a> --}}
    </div>
    <x-alert type="success" class="mb-3"/>

    <form action="{{ URL::current() }}" method="get" class="mb-3">

        <x-form.input name="name" label="Name" :value="request('name')" class="w-50" />

        <select class="border-1 border-gray-300 rounded-lg w-25" name="status" id="">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="archived" @selected(request('status') == 'archived')>Archived</option>
        </select>
        <button type="submit" class=" border-2 border-gray-400 rounded-lg py-2 px-3">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product->image) }}" alt="" width="100"></td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route('dashboard.products.edit', $product->id) }}"
                            class="text-yellow-600 visited:text-yellow-600 border-2 border-gray-400 rounded-lg py-2 px-3">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="text-red-600 visited:text-red-600 border-2 border-gray-400 rounded-lg py-2 px-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No products defined.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
   {{ $products->withQueryString()->links() }}
@endsection
