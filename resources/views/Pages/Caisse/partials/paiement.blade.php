<div>
    <div class="card mt-5" style="height: ">
        <div class="card-header">
          PAIEMENT
        </div>
         <div class="card-body pt-0">
          <div class="row mt-3">
    
            <div class="col-6">
    
             <div class="form-group">
               <label for="" class="Caisse_label">MONTANT ENCAISSER</label>
               <div class="input-group">
                 <input class="form-control font-weight-bold text-center" wire:model="Encaissement"
                 onkeypress="javascript:return isNumberKey(event)" type="text" name="" value="25000">
                 <div class="input-group-append">
                   <span class="input-group-text" id="my-addon">FCFA</span>
                 </div>
               </div>
             </div>
    
            </div>
            
    
    
            <div class="col-6">
             <div class="form-group">
               <label for="" class="Caisse_label">MONNAIE A REMETTRE</label>
               <div class="input-group">
                 <input class="form-control font-weight-bold text-center" wire:model="monnaie" type="text"  readonly value="600">
                 <div class="input-group-append">
                   <span class="input-group-text" id="my-addon">FCFA</span>
                 </div>
               </div>
             </div>
            </div>
          </div>
            
          <div class="row mt-2">
           <div class="col-6">
             <div class="form-group">
               <label for="">REMISE</label>
               <input type="text" class="form-control" wire:model="remise" disabled>
             </div>
           </div>
    
           <div class="col-6">
                 <div class="form-group">
                   <label for="my-select">Reference</label>
                         <input type="text" name="" id="" class="input-group-text form-control" wire:model="Selling_ref">
                 </div>
           </div>
    
         </div>
    
    
  
          <div class="d-flex justify-content-between">
                 <div class="btn-group" role="group" aria-label="Button group">
                       <button class="btn btn-success ml-3"  id="btnPay" wire:click="Encaissement"> <i class="fas fa-hand-holding-usd    "></i> </button>
                       <button class="btn btn-primary ml-3" wire:click="Encaissement_facture" id="btnPay" > <i class="fas fa-hand-holding-usd    "></i> <i class="fa fa-print" aria-hidden="true"></i></button>
                       <button class="btn btn-warning ml-3" wire:click="Encaissement_credit"><i class="fas fa-hand-holding    "></i> Credit</button>
                       <button class="btn btn-warning ml-3" wire:click="Encaissement_credit_facture"><i class="fas fa-hand-holding    "></i> <i class="fa fa-print" aria-hidden="true"></i> </button>
                 </div>
    
                 <div class="btn-group" role="group" aria-label="Button group">
                       <button class="btn btn-danger ml-3 btn-sm" wire:click="Abandonner">Abandonner</button>
                 </div>
    
          </div>
    
    
    
        </div>
       </div>
</div>