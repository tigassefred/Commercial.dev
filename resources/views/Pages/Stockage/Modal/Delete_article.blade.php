
<!-- Modal -->
<div class="modal fade" id="DeleteArticleModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Supprimer un Article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form action="" method="get" id="delete_article_modal">
                        <div class="modal-body">
                            <div class="container-fluid">
                                
                                    @csrf
                                    <h1>Confirmez-vous la suppression de l'article?</h1>
                                    <input type="hidden" name="hidden">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" onclick="Controller.Send_to_delete_article()"> <i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button>
                        </div>
                 </form>
        </div>
    </div>
</div>
