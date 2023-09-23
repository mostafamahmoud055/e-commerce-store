@extends('layouts.dashboard')
@section('title', 'Trashed Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Categories</li>
    <li class="breadcrumb-item active">Trash</li>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ route('dashboard.categories.index') }}"
            class="text-blue-600 visited:text-blue-600 border-2 border-gray-500 rounded-lg p-1 px-3">Back</a>
    </div>
    <x-alert type="success" />

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
                <th>Status</th>
                <th>Deleted At</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="" width="100"></td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->deleted_at }}</td>
                    <td>
                        <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit"
                                class="text-blue-600 visited:text-blue-600 border-2 border-gray-400 rounded-lg py-2 px-2">Restore</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="text-red-600 visited:text-red-600 border-2 border-gray-400 rounded-lg py-2 px-2">Delete Permanently</button>
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
