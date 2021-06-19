<div class="my-4 mx-5">
    <div class="row justify-content-between">
        <div class="card" style="width: 55%">
            <div class="card-header">
                Terminal de vente
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="form-group m-0 mb-3">

                        <input type="text" class="form-control vente_input" 
                            wire:model="Search_article_to_sell"
                            wire:keydown.arrow-up="hightlight_decrement"
                            wire:keydown.arrow-down="hightlight_increment"
                            wire:keydown.enter="selectItem"
                            id="" aria-describedby="helpId" placeholder="Votre article" 
                            autocomplete="off" width="100%"
                            style="height: 60px">

                        @if (!empty($Search_article_to_sell))

                            @if (!empty($Response_articles))
                                <div class="list-group bg-white w-full rounded-t-none shadow-lg p-3" style="position: absolute; z-index:10;width:90%">
                                    @foreach ($Response_articles as $key => $article)
                                    <p
                                    wire:click="selectItem('{{$article['ref']}}')" 
                                    class="font-weight-bold  pl-2 list-group-item list-group-item-action m-0 p-1 pr-3  d-flex justify-content-between {{($highlightIndex===$key) ? "active" : "" }} {{ $article['qte_boutique'] < 0 ? 'text-danger':"" }} ">
                                    <span>{{ $article['name'] }}</span><span>{{ $article['qte_magasin'] }}/{{ $article['qte_boutique'] }}</span></p>

                                    @endforeach
                                </div>

                            @else
                                <div class="list-group bg-white w-full rounded-t-none shadow-lg p-3"  style="position: absolute; z-index:10;width:90%">
                                    <p class="font-weight-bold ">  Aucun resultat</p>
                                </div>
                            @endif

                        @endif

                    </div>


                    <input type="text" name="" id="" class="form-control vente_input" disabled
                        placeholder="le nom de votre article" wire:model="nom_article">

                    <div class="row justify-content-between mt-2">
                        <div class="col-6 form-group">
                            <label for="">Prix de l'article</label>
                            <input type="text" name="" id="" class="vente_input form-control"
                                onkeypress="VenteController.AllowNumberInterger(event)" wire:model="prix_vente">
                        </div>

                        <div class="col-6 form-group">
                            <label for="">Quantite</label>
                            <input type="text" name="" id="" value="0" class="vente_input form-control"
                                onkeypress="VenteController.AllowNumberInterger(event)" wire:model="quantite_article">
                        </div>
                    </div>
                    <label for="">Valeur total de l'article</label>
                    <input type="text" name="" id="" class="form-control vente_input" disabled placeholder="" wire:model="valeur_total">

                    <div class=" row mr-1 mt-2">
                        <button class="ml-auto btn btn-info" wire:click="Add_Products">Suivant>>></button>
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
                            <input type="text" class="form-control" readonly name="" id="" aria-describedby="helpId" wire:model="numero_vente"
                                placeholder="" value="">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="my-select">Vendeur(e)</label>
                            <input type="text" class="form-control" name="" readonly value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
         

                <div>
                    <div class="form-group">

                        <label for="my-select">Nom du client</label>



                        <input type="text" name="" wire:model="client_search" id="id_client_name"
                            placeholder="Client Ordinaire" autocomplete="off" class="form-control"
                            wire:keydown.arrow-up="hightlight_decrement" wire:keydown.arrow-down="hightlight_increment"
                            wire:keydown.enter="SelectClient">

                        @if (!empty($client_search_tmp))

                            @if (!empty($Response_client))
                                <div class="list-group bg-white w-full rounded-t-none shadow-lg p-3" style="position: absolute; z-index:10;width:90%">
                                    @foreach ($Response_client as $key => $client)
                                        <p wire:click="SelectClient({{ $client['id'] }})"
                                            class="pl-2 list-group-item list-group-item-action m-0 p-1 pr-3  d-flex justify-content-between ">
                                            {{ $client['name'] }}</p>
                                    @endforeach
                                </div>
                            @else
                                <div class="list-group bg-white w-full rounded-t-none shadow-lg p-3" style="position: absolute; z-index:10;width:90%">
                                        <p wire:click="SelectClient"
                                            class="pl-2 list-group-item list-group-item-action m-0 p-1 pr-3  d-flex justify-content-between ">
                                            {{ __('Client Ordinaire') }}
                                        </p>
                                </div>
                            @endif

                        @endif
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Quantite d'article</label>
                            <input type="text" class="form-control" readonly name="" id="" value="" wire:model="qte_article">
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Valeur de la vente</label>
                            <div class="input-group">
                                <input class="form-control" value="" type="text" name="" readonly wire:model="valeur_panier">
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
                            <input type="text" class="form-control" name="" wire:model="remise" 
                            onkeypress="VenteController.AllowNumberInterger(event)">
                        </div>
                    </div>

                    <div class="col-6 ">
                        @if (count($Panier) > 0)
                        <div class="btn-group ">
                            <button class="btn btn-info " wire:click="Envoyer_caisse">Caisse</button>
                            <button class="btn btn-success " wire:click="Faire_paiement">Payer</button>
                            <button class="btn btn-warning " wire:click="payer_vente">Credit</button>
                        </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>

        {{-- ******************************* --}}


    </div>

    <div class="row">
         <div class="my-3">
             <a type="button" href="{{route('Dashboard')}}" class="btn btn-info btn-sm">Tableau de board</a>
             <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#voirVente">
                Voire les ventes
              </button>
         </div>
        <div class="ml-auto my-3">
            <button class="btn btn-info btn-sm" wire:click="Add_Article">Creer un article</button>
            <button class="btn btn-primary btn-sm" wire:click="Add_Client">ajouter un client</button>
            <button class="btn btn-danger btn-sm" wire:click="Abandonner">Abandonner</button>
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
                      @if (count($Panier) > 0)
                            @for ($i = 1 ; $i <= count($Panier) ;  $i++)
                            
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$Panier[$i-1]['name']}}</td>
                                <td>{{$Panier[$i-1]['quantite_article']}}</td>
                                <td>{{$Panier[$i-1]['prix_vente']}}</td>
                                <td>{{$Panier[$i-1]['prix_total']}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" wire:click="Descrement_Panier('{{$i-1}}')">-</button>
                                    <button class="btn btn-info btn-sm" wire:click="Increment_Panier('{{$i-1}}')">+</button>
                                    <button class="btn btn-danger btn-sm" wire:click="Delete_Panier('{{$i-1}}')" ><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            @endfor
                       @else   
                                    <td colspan="6" class="text-center">Aucun Article</td>    
                      @endif
                </tbody>
            </tr> 

        </table>
    </div>
</div>
