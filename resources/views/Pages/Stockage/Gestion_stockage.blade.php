@extends('Layouts.app', ['titre'=>'Commercial - Stockage'])
@section('content')

    @include('Pages.Stockage.navigation')

    

 @livewire('stockage.gestion-stockage') 






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