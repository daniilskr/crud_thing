@extends('layout.app')

@section('body')
    <x-catalog.header />
    <div class="container-xl mt-4">
        <x-catalog.catalog-list />
    </div>
@endsection