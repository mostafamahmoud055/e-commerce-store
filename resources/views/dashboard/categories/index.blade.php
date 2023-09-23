@extends('layouts.dashboard')
@section('title', 'Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('dashboard.categories.create') }}"
            class="text-blue-600 visited:text-blue-600 border-2 border-gray-500 rounded-lg p-1 px-3">Create</a>
        <a href="{{ route('dashboard.categories.trash') }}"
            class="text-red-600 visited:text-red-600 border-2 border-gray-500 rounded-lg p-1 px-3">Trash</a>
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
                <th>Parent</th>
                <th>Products#</th>
                <th>Status</th>
                <th>Created At</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="" width="100"></td>
                    <td>{{ $category->id }}</td>
                    <td> <a class="text-color-blue" href="{{ route('dashboard.categories.show',$category->id) }}">{{$category->name }}</a> </td>
                    <td>{{ $category->parent->name }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                            class="text-yellow-600 visited:text-yellow-600 border-2 border-gray-400 rounded-lg py-2 px-3">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="text-red-600 visited:text-red-600 border-2 border-gray-400 rounded-lg py-2 px-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No categories defined.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
   {{ $categories->withQueryString()->links() }}
@endsection
