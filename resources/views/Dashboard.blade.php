@extends('Layouts.app', ['titre'=>'Commercial - Tableau de board'])
@section('content')
{{-- 
<a href="{{route('stockage.index')}}" class="btn btn-info">Stockage</a>
<a href="{{route('Vente.index')}}" class="btn btn-info">Vente</a>
<a href="{{route('caisse.index')}}" class="btn btn-info">Caisse</a>
<a href="{{route('caisse.liste')}}" class="btn btn-info">Historique des paiement</a> --}}


<main class="container d-flex justify-content-around align-item-between flex-wrap align-items-center mt-5">

    <a href="{{ route('stockage.index') }}">
        <div class="card" style="width: 12em">
            <div class="card-body">
             <img src="{{ asset('img/stock.png') }}" alt="" style="margin-left:20px;  max-height: 40%; max-width:60%; display:block">
            </div>
            <div class="card-footer">
         <p class="text-center m-0">LE STOCK</p>
            </div>
        </div>
     </a> 

     <a href="{{ route('Vente.index') }}">
        <div class="card" style="width: 12em">
            <div class="card-body">
             <img src="{{ asset('img/vente.png') }}" alt="" style="margin-left:20px;  max-height: 40%; max-width:60%; display:block">
            </div>
            <div class="card-footer">
         <p class="text-center m-0">LES VENTES</p>
            </div>
        </div>
     </a>


     <a href="{{ route('caisse.index') }}">
        <div class="card" style="width: 12em">
            <div class="card-body">
             <img src="{{ asset('img/cashier-icon.png') }}" alt="" style="margin-left:20px;  max-height: 40%; max-width:60%; display:block">
            </div>
            <div class="card-footer">
         <p class="text-center m-0">LA CAISSE</p>
            </div>
        </div>

       </a>

     <a href="{{ route('caisse.liste') }}">
        <div class="card" style="width: 12em">
            <div class="card-body">
             <img src="{{ asset('img/historiq.png') }}" alt="" style="margin-left:20px;  max-height: 40%; max-width:60%; display:block">
            </div>
            <div class="card-footer">
         <p class="text-center m-0">Historique paiement</p>
            </div>
        </div>

       </a>

     

     
</main>

@endsection