<div class="ml-3 mr-3">
    <div class="card">
        <div class="card-header">
    
            <div class=" d-flex justify-content-between">
                <div class="p-2">
                    <p class="m-0 font-weight-bold">LISTE DES ARTICLES</p>
                </div>
    
                <div class="row">
    
                    <div>
                        <input type="text" wire:model="search" name="" id="" placeholder="Rechercher"
                            class="form-control" style="width: 400px">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-inverse table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th width="1%">#</th>
                        <th width="50%">Article</th>
                        <th width="15%">Quantite en magazin</th>
                        <th width="20%">Mouvement de stock</th>
                        <th width="14%">Quantite en boutique </th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach ($Articles as  $key => $item)
                             <tr class="{{($item->qte_boutique < $item->qte_seuil) ? "table-warning" : ""}}">
                                 <td>{{++$key}}</td>
                                 <td>{{$item->name}}</td>
                                 <td>{{$item->qte_magasin}}</td>
                                 <td>
                                        <div class="row justify-content-center">
                                               <button class="btn btn-info btn-sm mr-1" wire:click="countDesc('{{$item->ref}}')">-</button>
                                               <input type="text"  class="text-align" wire:model.defer='count' style="height: 15px; width:60px; text-align :center" onkeypress="Controller.AllowNumberInterger(event)">
                                               <button class="btn btn-info btn-sm ml-1 " wire:click="countInc('{{$item->ref}}')">+</button>
                                        </div>
                                 </td>
                                 <td>{{$item->qte_boutique}}</td>
                             </tr>
                         @endforeach
                    </tbody>
            </table>   

            <div>{{$Articles->links()}}</div>
        </div>
    </div>

</div>   