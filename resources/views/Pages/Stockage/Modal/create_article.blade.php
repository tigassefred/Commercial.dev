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
                     <input id="Create_article_name_id" class="form-control" type="text"
                           name="Nom" wire:model="Nom" onkeyup="Controller.Check_if_article_existe()">
                           <small class="text-danger font-weight-bold d-none" id="article_add_samll_id">Cet Article existe deja dans votre catalogue!!!</small>
                   </div>
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="Prix_achat">Prix d'achat</label>
                         <input id="Prix_achat" class="form-control" type="text" name="Prix_achat" wire:model="Prix_achat"
                           onkeypress="Controller.AllowNumberInterger(event)"
                         >
                       </div>
 
                       <div class="form-group col-6">
                         <label for="Prix_vente">Prix de vente</label>
                         <input id="Prix_vente" class="form-control" type="text" 
                         onkeypress="Controller.AllowNumberInterger(event)" name="Prix_vente" wire:model="Prix_vente">
                       </div>
                  </div>
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="magazin">Quantite Magazin</label>
                         <input id="magazin" class="form-control"
                         onkeypress="Controller.AllowNumberInterger(event)" type="text" name="magazin" wire:model="magazin">
                       </div>
 
                       <div class="form-group col-6">
                         <label for="boutiq">Quantite Boutique</label>
                         <input id="boutiq" class="form-control" type="text" 
                         onkeypress="Controller.AllowNumberInterger(event)" name="boutiq" wire:model="boutiq">
                       </div>
                  </div>
 
 
                  <div class="row">
                       <div class="form-group col-6">
                         <label for="nbrpaquet">Quantite Par Paquet</label>
                         <input id="nbrpaquet" class="form-control" type="text" 
                         onkeypress="Controller.AllowNumberInterger(event)" name="nbrpaquet" wire:model="nbrpaquet">
                       </div>
 
                       <div class="form-group col-6">
                         <label for="nbrSeuil">Quantite Seuil</label>
                         <input id="nbrSeuil" class="form-control" type="text"
                         onkeypress="Controller.AllowNumberInterger(event)"  name="nbrSeuil" wire:model="nbrSeuil">
                       </div>
                  </div>
                    
                 <div class="row mr-3 ">
                      <div class="ml-auto">
                      <button class="btn btn-primary" id="add_article_btn_id">Enregistrer</button>
                      <button class="btn btn-secondary"  type="button" data-dismiss="modal" aria-label="Close" >Fermer</button>
                      </div>
                 </div>
              </form>
        </div>
      </div>
    </div>
  </div>
 
 