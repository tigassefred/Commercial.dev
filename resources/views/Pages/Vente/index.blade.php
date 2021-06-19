@extends('Layouts.app', ['titre'=>'Commercial - Vente'])
@section('content')

@push('custum-styles')
    <style>
          .vente_input{
               height: 50px;
               font-size: 18px;
               font-weight: 600;
          }
    </style>
@endpush


@include('Pages.Stockage.Modal.create_article')
@include('Pages.Client.modal.create_client')
@include('Pages.Vente.modal.Paiement')
@include('Pages.Vente.modal.listeVente')
@livewire('vente.vente-system')
    
@push('custom-scripts')
      <script src="{{asset('js/Vente/VenteController.js')}}"></script> 
@endpush
@endsection