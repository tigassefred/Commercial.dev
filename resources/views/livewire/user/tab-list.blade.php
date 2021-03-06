<div class="ml-5 mr-5">
  <div class='row'>
      <div class="ml-auto">
        <input type="text" name="" id="" class="form-control mb-2" wire:model="qry" placeholder="Rechercher">
      </div>
  </div>
<table class=" table table-striped table-bordered table-responsive-sm">
       <caption>Liste des Utilisateurs</caption>
       <thead class="thead-light">
           <tr>
               <th>#</th>
               <th width="15%">Nom</th>
               <th width="20%">Prénom(s)</th>
               <th>Téléphone</th>
               <th width="10%">{{Str::Ucfirst('état')}}</th>
               <th width="30%">Rôle</th>
               <th>Actions</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($Users as $Key => $user )
               <tr>
                   <td>{{++$Key}}</td>
                   <td class='text-uppercase'>{{$user->lastname}}</td>
                   <td>{{$user->firstname}}</td>
                   <td>{{$user->phone}}</td>
                   <td >@if ($user->statut === 0)
                                <button class="btn btn-danger btn-sm" wire:click="Statut('{{$user->ref}}')" >Desactiver</button>
                              @else
                                <button class="btn btn-primary btn-sm" wire:click="Statut('{{$user->ref}}')">Activer</button>
                      @endif  
                   </td>
                   <td>
                       @if ($user->role->count() > 3 )
                          <span class="badge badge-primary">Super utilsateur</span>
                       @else
                            @foreach ($user->Role as $role )
                                <span class="badge badge-primary">{{$role->name}}</span>
                            @endforeach
                       @endif
                  </td>
                  <td>
                       <div class="btn-group">   
                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModifierUsers" value="{{$user->ref}}">Modifier</button>
                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModifierUsersRole" value="{{$user->ref}}">Role</button>
                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#UserDelete" value="{{$user->ref}}">Supprimer</button>

                       </div>
                  </td>

               </tr>
           @endforeach
       </tbody>
        
   </table>
   <div>{{$Users->links()}}</div>
</div>
