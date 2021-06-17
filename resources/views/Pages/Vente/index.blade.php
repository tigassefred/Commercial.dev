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
<div>

</div>
@livewire('vente.vente-system')
    
@push('custom-scripts')
      <script src="{{asset('js/Vente/VenteController.js')}}"></script> 
@endpush
@endsection