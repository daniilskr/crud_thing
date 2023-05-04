@extends('backoffice.layout.crud.create')

@section('backoffice.layout.crud.create')
    <x-backoffice.authors.forms.create-or-edit :author="null" />
@endsection