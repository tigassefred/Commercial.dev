@extends('Layouts.app', ['titre'=>'Commercial - Stockage'])
@section('content')

    @include('Pages.Stockage.navigation')

     @livewire('stockage.tab-list')


@include('Pages.Stockage.Modal.create_article')
@include('Pages.Stockage.Modal.edit_article')
@include('Pages.Stockage.Modal.Delete_article')


  

@endsection