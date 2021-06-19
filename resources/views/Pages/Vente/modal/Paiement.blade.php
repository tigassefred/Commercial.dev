
<!-- Modal -->
<div class="modal fade" id="Paiement_vente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Paiement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="alert alert-danger d-none" id="alert_box">
                                         <p>Veuillez enregistrer le client avant de lui faire credit</p>
                    </div>
                    <form action="" method="post">

                       <div class="row justify-content-between">
                        <div class="form-group">
                            <label for="">Numero de la vente</label>
                            <input type="text"
                              class="form-control" name="" id="reference" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                          <div class="form-group">
                            <label for="">Date de la vente</label>
                            <input type="text"
                              class="form-control" name="" id="Date_vente" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                       </div>
                       <div class="row justify-content-between">
                        <div class="form-group">
                            <label for="">Vendeur(euse)</label>
                            <input type="text"
                              class="form-control" name="" id="Vendeur" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                          <div class="form-group">
                            <label for="">Client</label>
                            <input type="text"
                              class="form-control" name="" id="client" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                       </div>
                       <div class="row justify-content-between">
                        <div class="form-group">
                            <label for="">Nombre article</label>
                            <input type="text"
                              class="form-control" name="" id="NbArticle" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                          <div class="form-group">
                            <label for="">Valeur</label>
                            <input type="text"
                              class="form-control" name="" id="valeur" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                       </div>
                       <div class="row justify-content-between">
                        <div class="form-group">
                            <label for="">Sommes encaisser</label>
                            <input type="text"
                              class="form-control" name="" id="somme" onkeyup="VenteController.CalculeMonaie()" onkeypress="VenteController.AllowNumberInterger(event)" aria-describedby="helpId" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="">Monnaie à remettre</label>
                            <input type="text"
                              class="form-control" name="" id="monaie" aria-describedby="helpId" placeholder="" disabled>
                          </div>
                       </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="VenteController.paiement_simple_vente()" ><i class="fas fa-hand-holding-usd"></i>Payer</button>
                <button type="button" class="btn btn-info" onclick="VenteController.paiement_facture_vente()" > <i class="fa fa-print" aria-hidden="true"></i> Payer et imprimer la facture</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


