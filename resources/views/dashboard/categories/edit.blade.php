@extends('layouts.dashboard')
@section('title', 'Edit Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post" enctype="multipart/form-data"
        class="inverted-colors:outline flex flex-col w-75 mx-auto">
        @csrf
        @method('put')
        @include('dashboard.categories._form', [
            'button_label' => 'Update',
        ])
    </form>
@endsection
