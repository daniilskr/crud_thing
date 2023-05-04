@extends('backoffice.layout.crud.edit')

@section('backoffice.layout.crud.edit')
    <x-backoffice.books.forms.create-or-edit :book="$book" />
@endsection