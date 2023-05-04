@extends('backoffice.layout.crud.create')

@section('backoffice.layout.crud.create')
    <x-backoffice.books.forms.create-or-edit :book="null" />
@endsection