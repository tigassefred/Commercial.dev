
<!-- Modal -->
<div class="modal fade" id="CreateClient" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Enregistrer un client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                     <div class="form-group">
                       <label for="">Nom du client</label>
                       <input type="text"
                         class="form-control" name="" id="name" aria-describedby="helpId" placeholder="">
                     </div>
                     <div class="form-group">
                       <label for="">Numero du client</label>
                       <input type="text"
                         class="form-control" name="" id="numero" aria-describedby="helpId" placeholder="">
   
                     </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="VenteController.save_client()">Save</button>
            </div>
        </div>
    </div>
</div>
