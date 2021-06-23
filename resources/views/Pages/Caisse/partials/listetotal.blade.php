<div class="card" style="height:100%">
    <div class="card-header">
     
         INFORMATION DE LA VENTE 


    </div>
     <div class="card-body" style="overflow: scroll; height:90px" >
         <table class="table table-bordered" >
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Reference</th>
                     <th>Client</th>
                     <th>Valeur</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody >
                   @for ($i=0;$i<count($lesVentes);$i++)
                                
                      <tr>
                       
                        <td></td>
                        <td>{{$lesVentes[$i]['ref']}}</td>
                        <td>{{$lesVentes[$i]['lastname']}} {{$lesVentes[$i]['firstname']}}</td>
                        <td class="font-weight-bold">{{$lesVentes[$i]['valeurs']}}</td>
                        <td>
                            <button class="btn btn-success btn-sm" wire:click="SendToPay('{{$lesVentes[$i]['ref']}}')">Traite</button>
                        </td>
                      </tr>
                      @endfor
   
               
             </tbody>
         </table>
   

     </div>

   </div>