@extends('Layouts.app', ['titre'=>'Commercial - Employer'])
@section('content')
    <div class="d-flex justify-content-center">
        <button class="btn btn-outline-primary">Tableau de board</button>
        <button class="btn btn-outline-primary ml-5">Ajouter un Employer</button>
    </div>
  <hr>
  

  


  <div id="CreateUsers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Création d'un nouvel utilisateur</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="error_span_user_modal">
                
                </div>

                <form action="" method="post" id="userModalForm">
                    @csrf
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="firstname">Prénom(s)</label>
                        <input id="firstname" class="form-control" type="text" name="firstname" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input id="phone" class="form-control" type="tel" name="phone" required  autocomplete="off" onkeypress="javascript:return isNumberKey(event)">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary mr-3" type="submit">Enregistrer</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close" >fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="ModifierUsers" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Modification d'un utilisateur</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="error_span_user_edit_modal">
                
                </div>

                <form action="" method="post" id="edit_userModalForm">
                    @csrf
                    <div class="form-group">
                        <label for="edit_lastname">Nom</label>
                        <input type="text" name="lastname" id="edit_lastname" class="form-control" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="edit_firstname">Prénom(s)</label>
                        <input id="edit_firstname" class="form-control" type="text" name="firstname" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="edit_phone">Téléphone</label>
                        <input id="edit_phone" class="form-control" type="tel" name="phone" required  autocomplete="off" onkeypress="javascript:return isNumberKey(event)">
                    </div>
                            <input type="hidden" name="ref"  id="edit_ref">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success mr-3" type="submit">Modifier</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close" >fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection