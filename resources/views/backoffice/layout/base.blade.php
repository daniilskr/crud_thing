@extends('layout.app')

@section('body')
    <x-backoffice.header />
    <div class="container-xl mt-4">
        @yield('backoffice.layout.crud')
    </div>
@endsection