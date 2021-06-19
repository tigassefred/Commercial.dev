@extends('Layouts.app', ['titre'=>'Commercial - Tableau de board'])
@section('content')

<a href="{{route('stockage.index')}}" class="btn btn-info">Stockage</a>
<a href="{{route('Vente.index')}}" class="btn btn-info">Vente</a>
<a href="{{route('caisse.index')}}" class="btn btn-info">Caisse</a>
<a href="{{route('caisse.liste')}}" class="btn btn-info">Historique des paiement</a>

@endsection