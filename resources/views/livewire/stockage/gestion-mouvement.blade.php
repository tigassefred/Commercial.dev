<div>
    <div class="card">
        <div class="card-header">
          <div class=" d-flex justify-content-between">
              <div class="p-2">
                  <p class="m-0 font-weight-bold">Mouvement du stock</p>
              </div>

          <div class="row mr-5">

              <div>
                  <input type="text" wire:model="search" name="" id="" placeholder="Rechercher" class="form-control" style="width: 230px">
              </div>

              <div class="ml-2">
           
               <div class="input-group">
                   <input class="form-control" type="text" name="" wire:model="quantite_valeur" value="0"  style="width: 60px"  onkeypress="Controller.AllowNumberInterger(event)" >
                   <div class="input-group-append">
                       <select name="" id="" wire:model="quantite_signe" class="w-auto custom-select">
                           <option value=">">></option>
                           <option value="<"><</option>
                           <option value="=">=</option>
                       </select>
                   </div>
               </div>
              </div>
    


              <div>
                  <select wire:model="PageRow" class="w-auto custom-select">
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="75">75</option>
                      <option value="100">100</option>
                  </select>
              </div>

          </div>
      </div>
        </div>
        <div class="card-body">
          
     <table class=" table table-bordered table-striped table-md" >
         <thead class="thead-light" >
             <tr>
                 <th width="2%">#</th>
                 <th>Nom de l'article</th>
                 <th width="15%">Quantité en magasin</th>
                 <th width="15%">Quantite entrante</th>
                 <th width="5%">action</th>
             </tr>
             </thead>
             <tbody>
      
                      @foreach ($Articles as $key => $article)
                      <tr class="{{($article->qte_magasin < $article->qte_seuil) ? "table-danger" : ""}}">
                           <td>{{ ++$key }}</td>
                           <td>{{ $article->name }}</td>
                           <td>{{ $article->qte_magasin }}</td>
                            <td>
                                      <input type="text" wire:model.defer="qte"  onkeypress="Controller.AllowNumberInterger(event)" >
                            </td>

                            <td class="text-center">
                                 <div class="d-flex justify-content-end">
                                          <button class="btn btn-info btn-sm ml-2"    wire:click="mise_a_jour('{{ $article->ref }}') ">Changer</button>
                                 </div>
                            </td>
                      </tr>
                  @endforeach
             </tbody>
     </table>

     <div>{{ $Articles->links() }}</div>
        </div>
    </div>
</div>