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
          <div class="alert alert-danger d-none" id="errorEdit">
   
          </div>
 
              <form action id="form_submit_stock_edit">
                   <input type="hidden" name='ref'>
                   <div class="form-group">
                     <label for="">Nom de l'article</label>
                     <input id="" class="form-control" type="text" name="name" wire:model="Nom">
                   </div>
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="Prix_achat">Prix d'achat</label>
                         <input id="Prix_achat" class="form-control" type="text" name="prix_achat" wire:model="Prix_achat">
                       </div>
 
                       <div class="form-group col-6">
                         <label for="Prix_vente">Prix de vente</label>
                         <input id="Prix_vente" class="form-control" type="text" name="prix_vente" wire:model="Prix_vente">
                       </div>
                  </div>
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="magazin">Quantite Magazin</label>
                         <input id="magazin" class="form-control" type="text" name="qte_magasin" wire:model="magazin">
                       </div>
 
                       <div class="form-group col-6">
                         <label for="boutiq">Quantite Boutique</label>
                         <input id="boutiq" class="form-control" type="text" name="qte_boutique" wire:model="boutiq">
                       </div>
                  </div>
 
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="nbrpaquet">Quantite Par Paquet</label>
                         <input id="nbrpaquet" class="form-control" type="text" name="nombre_paquet" wire:model="nbrpaquet">
                       </div>
 
                       <div class="form-group col-6">
                         <label for="nbrSeuil">Quantite Seuil</label>
                         <input id="nbrSeuil" class="form-control" type="text" name="qte_seuil" wire:model="nbrSeuil">
                       </div>
 
                  </div>
                    
                 <div class="row mr-3 ">
                      <div class="ml-auto">
                      <button class="btn btn-primary" type="submit">Enregistrer</button>
                      <button class="btn btn-secondary"  type="button" data-dismiss="modal" aria-label="Close" >Fermer</button>
                      </div>
                 </div>
              </form>
 
        </div>
      </div>
    </div>
  </div>
 