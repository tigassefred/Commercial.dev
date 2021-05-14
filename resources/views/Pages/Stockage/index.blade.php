@extends('Layouts.app', ['titre'=>'Commercial - Stockage'])
@section('content')
<div class="d-flex justify-content-center mt-3">
        <a href="{{route('Dashboard')}}" class="btn btn-outline-primary mr-4">Tableau de board</a>
        <button class="btn btn-outline-primary mr-4" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateArticleModal">Ajouter un article</button>
        <button class="btn btn-outline-primary mr-4">Gestion de Stock</button>
        <button class="btn btn-outline-primary mr-4" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateUsers">Mouvement de stock</button>
        <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateUsers">Etat du Article</button>
    </div>
  <hr>
  
  @livewire('stockage.tab-list')


@include('Pages.Stockage.Modal.create_article')
@include('Pages.Stockage.Modal.edit_article')





<script>  
     function LoadTable(option,index)
     { 
         const form = document.querySelectorAll(''+index);
         let name = "";
         form.forEach(element => {
             name = element.getAttribute('name');
             element.value = option[name] 
         });
     }


    window.addEventListener('event-edit', event => {
         $('#EditArticleModal').modal('show')
         LoadTable(event.detail.response,"#form_submit_stock_edit input")
    })
</script>
  
  

@endsection