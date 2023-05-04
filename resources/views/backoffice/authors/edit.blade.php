@extends('backoffice.layout.crud.edit')

@section('backoffice.layout.crud.edit')
    <x-backoffice.authors.forms.create-or-edit :author="$author" />
@endsection