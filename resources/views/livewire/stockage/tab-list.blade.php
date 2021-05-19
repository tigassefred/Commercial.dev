<div class="ml-3 mr-3">
   

<div class="card mr-4 " style="width: 100%">
        <div class="card-header">
    
            <div class=" d-flex justify-content-between">
                <div class="p-2">
                    <p class="m-0 font-weight-bold">LISTE DES ARTICLES</p>
                </div>
    
                <div class="row">
    
                    <div>
                        <input type="text" wire:model="search" name="" id="" placeholder="Rechercher"
                            class="form-control" style="width: 300px">
                    </div>

    
                    <div class="ml-2">
                        <div class="input-group">
                            <input class="form-control" type="text" wire:model="qte_magazin" name="qte_magazin" value="0" placeholder="Magazin"
                                style="width:100px" id="qte_magazin".>
                            <div class="input-group-append">
                                <select wire:model="qte_magazin_signe" class="w-auto custom-select">
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                    <option value="=">=</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ml-2">
                        <div class="input-group">
                            <input class="form-control" type="text" name="qte_boutique" wire:model="qte_boutique" placeholder="Boutique"
                                value="0" style="width: 100px" id="qte_boutique"  >
                            <div class="input-group-append">
                                <select name="" id="" wire:model="qte_boutique_signe" class="w-auto custom-select">
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                    <option value="=">=</option>
                                </select>
                            </div>
                        </div>
                    </div>
    
    
                    <div class="mr-2 ml-2">
                        <select class="w-auto custom-select" wire:model="filtre">
                            <option value="1">Activer</option>
                            <option value="0">Desactiver</option>
                        </select>
                    </div>
    
                    <div>
                        <select wire:model="PageRow" class="w-auto custom-select">
                            @for ($i = 25 ;  $i<=100; $i+=25)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-md table-bordered table-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l'article</th>
                        <th width="13%">Quantite en Magasin</th>
                        <th width="13%">Quantite en boutique</th>
                        <th width="10%">Prix de vente</th>
                        <th width="8%">{{ Str::ucfirst('état') }}</th>
                        <th width="10%">action</th>
                    </tr>
                </thead>
                <tbody >
                      @foreach ($Articles as $key => $article)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->qte_magasin }}</td>
                            <td>{{ $article->qte_boutique }}</td>
                            <td>{{ $article->prix_vente }}</td>
    
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    @if ($article->Enabled)
                                        <button class="btn btn-info btn-sm"
                                            wire:click="change_state('{{ $article->ref }}', 0)" >Desactiver </button>
                                    @else
                                        <button class="btn btn-success btn-sm"
                                            wire:click="change_state('{{ $article->ref }}', 1)">Activer</button>
                                    @endif
                                </div>
                            </td>
                            
                            <td class="text-center">
                                <div class="d-flex justify-content-end">
                                   
                                @cannot('is_manager')

                                <button class="btn btn-info btn-sm btn_edit_article"
                                wire:click="launchToEdit('{{ $article->ref }}') " data-toggle="tooltip" data-placement="top" title="Modifier l'article" > <i class="fas fa-edit    "></i></button>
                                 <button class="btn btn-danger btn-sm ml-2"
                                     wire:click="Delete('{{ $article->id }}') " data-toggle="tooltip" data-placement="top" title="Suppimer l'article"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                     
                                @endcannot
                                </div>
                            </td>
                        </tr>
                    @endforeach 
    
                </tbody>
            </table>
            
            <div class="m-0 p-0">{{ $Articles->links() }}</div>
        </div>
    </div>


</div>
