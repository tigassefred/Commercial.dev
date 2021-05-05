@extends('Layouts.app', ['titre'=>'Commercial - Stockage'])
@section('content')
<div class="d-flex justify-content-center mt-3">
        <a href="{{route('Dashboard')}}" class="btn btn-outline-primary mr-4">Tableau de board</a>
        <button class="btn btn-outline-primary mr-4" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateArticleModal">Ajouter un article</button>
        <button class="btn btn-outline-primary mr-4">Gestion de Stock</button>
        <button class="btn btn-outline-primary mr-4" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateUsers">Ajouter un Article</button>
        <button class="btn btn-outline-primary mr-4" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateUsers">Mouvement de stock</button>
        <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#CreateUsers">Etat du Article</button>
    </div>
  <hr>
  
  @livewire('stockage.tab-list')


 <div id="CreateArticleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="my-modal-title">Ajout d'article</h5>
         <button class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="alert alert-danger d-none" id="errorCreate">
  
         </div>
             <form action id="form_submit_stock">
               @csrf
                  <div class="form-group">
                    <label for="">Nom de l'article</label>
                    <input id="" class="form-control" type="text" name="Nom" wire:model="Nom">
                  </div>

                 <div class="row">
                      <div class="form-group col-6">
                        <label for="Prix_achat">Prix d'achat</label>
                        <input id="Prix_achat" class="form-control" type="text" name="Prix_achat" wire:model="Prix_achat"
                          onkeypress="isNumberKey(event)"
                        >
                      </div>

                      <div class="form-group col-6">
                        <label for="Prix_vente">Prix de vente</label>
                        <input id="Prix_vente" class="form-control" type="text" name="Prix_vente" wire:model="Prix_vente">
                      </div>
                 </div>

                 <div class="row">
                      <div class="form-group col-6">
                        <label for="magazin">Quantite Magazin</label>
                        <input id="magazin" class="form-control" type="text" name="magazin" wire:model="magazin">
                      </div>

                      <div class="form-group col-6">
                        <label for="boutiq">Quantite Boutique</label>
                        <input id="boutiq" class="form-control" type="text" name="boutiq" wire:model="boutiq">
                      </div>
                 </div>


                 <div class="row">
                      <div class="form-group col-6">
                        <label for="nbrpaquet">Quantite Par Paquet</label>
                        <input id="nbrpaquet" class="form-control" type="text" name="nbrpaquet" wire:model="nbrpaquet">
                      </div>

                      <div class="form-group col-6">
                        <label for="nbrSeuil">Quantite Seuil</label>
                        <input id="nbrSeuil" class="form-control" type="text" name="nbrSeuil" wire:model="nbrSeuil">
                      </div>
                 </div>
                   
                <div class="row mr-3 ">
                     <div class="ml-auto">
                     <button class="btn btn-primary">Enregistrer</button>
                     <button class="btn btn-secondary"  type="button" data-dismiss="modal" aria-label="Close" >Fermer</button>
                     </div>
                </div>
             </form>
       </div>
     </div>
   </div>
 </div>


 <div id="EditArticleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="my-modal-title">Modification de l'article</h5>
         <button class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="alert alert-danger d-none" id="errorCreate">
  
         </div>
             <form action id="form_submit_stock_edit">
               @csrf
                  <div class="form-group">
                    <label for="">Nom de l'article</label>
                    <input id="" class="form-control" type="text" name="Nom" wire:model="Nom">
                  </div>

                 <div class="row">
                      <div class="form-group col-6">
                        <label for="Prix_achat">Prix d'achat</label>
                        <input id="Prix_achat" class="form-control" type="text" name="Prix_achat" wire:model="Prix_achat">
                      </div>

                      <div class="form-group col-6">
                        <label for="Prix_vente">Prix de vente</label>
                        <input id="Prix_vente" class="form-control" type="text" name="Prix_vente" wire:model="Prix_vente">
                      </div>
                 </div>

                 <div class="row">
                      <div class="form-group col-6">
                        <label for="magazin">Quantite Magazin</label>
                        <input id="magazin" class="form-control" type="text" name="magazin" wire:model="magazin">
                      </div>

                      <div class="form-group col-6">
                        <label for="boutiq">Quantite Boutique</label>
                        <input id="boutiq" class="form-control" type="text" name="boutiq" wire:model="boutiq">
                      </div>
                 </div>


                 <div class="row">
                      <div class="form-group col-6">
                        <label for="nbrpaquet">Quantite Par Paquet</label>
                        <input id="nbrpaquet" class="form-control" type="text" name="nbrpaquet" wire:model="nbrpaquet">
                      </div>

                      <div class="form-group col-6">
                        <label for="nbrSeuil">Quantite Seuil</label>
                        <input id="nbrSeuil" class="form-control" type="text" name="nbrSeuil" wire:model="nbrSeuil">
                      </div>
                 </div>
                   
                <div class="row mr-3 ">
                     <div class="ml-auto">
                     <button class="btn btn-primary">Enregistrer</button>
                     <button class="btn btn-secondary"  type="button" data-dismiss="modal" aria-label="Close" >Fermer</button>
                     </div>
                </div>
             </form>
       </div>
     </div>
   </div>
 </div>

@endsection