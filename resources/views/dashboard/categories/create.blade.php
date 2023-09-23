@extends('layouts.dashboard')
@section('title', 'Create Categories')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data"
        class="inverted-colors:outline flex flex-col w-75 mx-auto">
        @csrf
        @include('dashboard.categories._form', [
            'button_label' => 'Create',
        ])
    </form>
@endsection
