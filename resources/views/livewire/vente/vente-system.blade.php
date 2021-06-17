<div class="my-4 mx-5">
      <div class="row justify-content-between">
            <div class="card" style="width: 55%">
                <div class="card-header">
                    Terminal de vente
                </div>
                <div class="card-body">
                     <div class="container">
                            <div class="form-group m-0 mb-3">
                             
                              <input type="text"
                                class="form-control vente_input" name="" id="" aria-describedby="helpId" placeholder="Votre article" autocomplete="off" width="100%" style="height: 60px">
                            </div>
                  
       
                              <input type="text" name="" id="" class="form-control vente_input" disabled placeholder="le nom de votre article">

                              <div class="row justify-content-between mt-2">
                                  <div class="col-6 form-group">
                                      <label for="">Prix de l'article</label>
                                      <input type="text" name="" id="" class="vente_input form-control" onkeypress="VenteController.AllowNumberInterger(event)">
                                  </div>

                                  <div class="col-6 form-group">
                                      <label for="">Quantite</label>
                                      <input type="text" name="" id="" value="0"  class="vente_input form-control" onkeypress="VenteController.AllowNumberInterger(event)">
                                  </div>
                              </div>
                              <label for="">Valeur total de l'article</label>
                              <input type="text" name="" id="" class="form-control vente_input" disabled placeholder="">     
                              
                              <div  class=" row mr-1 mt-2">
                                   <button class="ml-auto btn btn-info">Suivant>>></button>
                              </div>
                    </div> 

                </div>
            </div>
            {{-- ******************************* --}}

            <div class="card" style="width: 40%">
                <div class="card-header">
                    FINALISATION DE LA VENTE
               
                </div>
                <div class="card-body pt-0">
                    <p class="error mt-2 mb-0">{{-- $message_modal --}}</p>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">N° de Vente</label>
                                <input type="text" class="form-control" readonly name="" id="" aria-describedby="helpId"
                                    placeholder="" value="">
                            </div>
                        </div>
            
                        <div class="col-6">
                            <div class="form-group">
                                <label for="my-select">Vendeur(e)</label>
                                <input type="text" class="form-control" name="" readonly
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>
            
                    <div>
                        <div class="form-group">
                           
                                <label for="my-select">Nom du client</label>
                               
                        
        
                            <input type="text" name="" wire:model="client_name" id="id_client_name" placeholder="Client Ordinaire"
                                autocomplete="off" class="form-control"
                                wire:keydown.arrow-up="hightlight_decrement"
                                wire:keydown.arrow-down="hightlight_increment" wire:keydown.enter="SelectClient">
            
                            @if (!empty($client_name))
            
                                @if (!empty($ClientResult))
                                    <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
                                        @foreach ($ClientResult as $key => $client)
                                            <p wire:click="SelectClient({{ $client['id'] }})"
                                               class="pl-2 list-group-item list-group-item-action m-0 p-1 pr-3  d-flex justify-content-between {{($highlightIndex===$key) ? "active" : "" }} ">{{ $client['name'] }}</p>
                                         @endforeach
                                   </div>
                              @endif
            
                            @endif
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Quantite d'article</label>
                                <input type="text" class="form-control" readonly name="" id=""
                                    value="">
                            </div>
                        </div>
            
            
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Valeur de la vente</label>
                                <div class="input-group">
                                    <input class="form-control" value="" type="text" name=""
                                        readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">FCFA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                    <div class="row mt-2 align-items-center ">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">REMISE</label>
                                <input type="text" class="form-control" name="" >
                            </div>
                        </div>
            
                        <div class="col-6 ">
                              
                            <div class="btn-group ">
                                <button class="btn btn-info  ">Caisse</button>
                                <button class="btn btn-success " wire:click="payer_vente">Payer</button>
                                <button class="btn btn-warning " wire:click="payer_vente">Credit</button>
                            </div>
                        </div>
            
                    </div>
            
            
                </div>
            </div>

            {{-- ******************************* --}}
        

      </div>

      <div class="row">

        <div class="ml-auto my-3">
            <button class="btn btn-danger btn-sm">Creer un article</button>
            <button class="btn btn-danger btn-sm">ajouter un client</button>
            <button class="btn btn-danger btn-sm">Abandonner</button>
        </div>
           <table class="table table-sm table-striped table-bordered">
               <tr>
                   <thead>
                       <th>#</th>
                       <th>Nom de l'article</th>
                       <th>Quantite dans le Panier</th>
                       <th>Prix de vente</th>
                       <th>Valeur total de l'article</th>
                       <th>Action</th>
                   </thead>

                   <tbody>
                       <tr>
                           <td>1</td>
                           <td>Lorem, ipsum dolor.</td>
                           <td>3</td>
                           <td>3000</td>
                           <td>9000</td>
                           <td>
                               <button class="btn btn-info btn-sm">+</button>
                               <button class="btn btn-info btn-sm">+</button>
                               <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                           </td>
                       </tr>
                   </tbody>
               </tr>

           </table>
      </div>
</div>
