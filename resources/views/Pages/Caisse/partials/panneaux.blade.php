<div class="d-flex justify-content-between">
    <div class="card bg-primary" style="color:#ffffff ; width:120px;height:100px"> 
      <div class="card-body">
        <p class="text-underline m-0 font-weight-bold">En attente</p>
        <p class="mb-0 pb-0 text-center" style="font-size: 20px; ">{{count($lesVentes)}}</p>
      </div>
    </div>

    <div class="card bg-success" style="color:#ffffff;width:120px;height:100px">
      <div class="card-body">
       <p class="text-underline m-0 font-weight-bold">Traitée</p>
        <p class="mb-0 pb-0 text-center" style="font-size: 20px; ">{{$traite}}</p>
      </div>
    </div>
    <div class="card bg-danger" style="color:#ffffff;width:150px;height:100px">
      <div class="card-body">
       <p class="text-underline m-0 font-weight-bold">Abandonnée</p>
       <p class="mb-0 pb-0 text-center" style="font-size: 20px; ">{{$abandonne}}</p>
      </div>
    </div>

    <div class="card bg-info" style="color:#ffffff;width:150px;height:100px">
      <div class="card-body">
       <p class="text-underline m-0 font-weight-bold">Encaisser</p>
        <p class="mb-0 pb-0 text-center" style="font-size: 20px; ">{{$caisse[0]->somme ?? 0}}</p>
      </div>
    </div>


</div>