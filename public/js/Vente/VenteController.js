class VenteController {
    static AllowNumberInterger(evt) {
        let ikeyCode = evt.which ? evt.which : evt.keyCode;
        if (ikeyCode >= 48 && ikeyCode <= 57) {
            return true;
        } else {
            evt.preventDefault();
            return false;
        }
    }

    static CalculeMonaie() {
        let depense = parseInt($("#Paiement_vente #valeur").val());
        let sommes = parseInt($("#Paiement_vente #somme").val());
        let monnaie = sommes - depense;
        $("#Paiement_vente #monaie").val(monnaie);
    }
    static paiement_facture_vente() {
    
        let ref_vente = $("#Paiement_vente #reference").val();
        let valeur = $("#Paiement_vente #valeur").val();
        let sommes = $("#Paiement_vente #somme").val();
        if(sommes.trim() === "")
        {
            sommes = 0;
        }
        
    
        if((sommes - valeur) < 0 )
        { let client = $("#Paiement_vente #client").val()
  
               if(client  === 'Client Ordinaire')
               {  $("#Paiement_vente #alert_box").removeClass('d-none')
                   setTimeout(() => {
                    $("#Paiement_vente #alert_box").addClass('d-none')
                   }, 3000);
                   return 0;
               }

        }
     
        VenteController.Paiement(ref_vente, valeur, sommes);
     
            $(`#Paiement_vente`).modal("hide");
 
              
        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1000,height=${window.screen.height},left=-1000,top=-1000`;

        var url = routeJS('facture');

       // url = `http://127.0.0.1:8000/admin/print/Rapport_hebdo`;

        url = `${url}?reference=${ref_vente}`;

        var currentPrintDialog = window.open(url, 'bsta', params);
        window.currentPrintDialog = currentPrintDialog;
        window.currentPrintDialog.addEventListener('afterprint',function(e){

            currentPrintDialog.close();
        });

    }

    static paiement_simple_vente() {
        let ref_vente = $("#Paiement_vente #reference").val();
        let valeur = $("#Paiement_vente #valeur").val();
        let sommes = $("#Paiement_vente #somme").val();
        if(sommes.trim() === "")
        {
            sommes = 0;
        }
        
    
        if((sommes - valeur) < 0 )
        { let client = $("#Paiement_vente #client").val()
  
               if(client  === 'Client Ordinaire')
               {  $("#Paiement_vente #alert_box").removeClass('d-none')
                   setTimeout(() => {
                    $("#Paiement_vente #alert_box").addClass('d-none')
                   }, 3000);
                   return 0;
               }

        }
     
        VenteController.Paiement(ref_vente, valeur, sommes);
        setTimeout(() => {
            $(`#Paiement_vente`).modal("hide");
            
        }, 1000);
    }

    static Paiement(ref_vente, valeur, sommes) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: routeJS("caisse.store"),
            data: { 'ref': ref_vente, 'valeur': valeur, 'sommes': sommes },

            success: function (response) {},
        });
    }


        static saveClient()
        {
            let vente =  $('#hidden_vente_modal_client').val();
            let id =  $('#vente_modal_select_client').val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: routeJS('client.update_client'),
                data: {'ref_vente':vente, 'id_client':id},
                success: function (response) {
                    $('#Vente_modal_client').modal('hide')
                    VenteController.get_ten_last_vente();
                }
            });
        }


      static get_ten_last_vente()
      {
        $.get(routeJS('getAll'),
        function (data, textStatus, jqXHR) {
            $('#liste_vente_modal_id').empty()
            data.forEach(element => {
                  $('#liste_vente_modal_id').append(`<tr>
                  <td>${element.ref}</td>
                  <td>${element.name}</td>
                  <td>${element.valeurs}</td>
                  <td width="40%">
                    ${(element.status === 'non traite') ? `
                    
                         <div class="d-flex justify-content-between">
                         <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Vente_modal_client" vente="${element.ref}"  reference=${element.id_client}>Changer Client</button>
                         <button class="btn btn-danger btn-sm" onclick="VenteController.abandonner_vente_modal_vente('${element.ref}')">Abandonner</button>
                         </div>
                        
                        `
                    : (element.status === 'traite') ? `

                           <div class=""d-flex justifu-content-center"> <button class="btn btn-success btn-sm">Imprimer</button>
                           <div/>` : `<span class="badge badge-danger p-3">Abandonner</span>`
                       }
                  </td>
               </tr>`)

            });
        },
    );
   
      }  

      static abandonner_vente_modal_vente(ref)
      {

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
          $.ajax({
              type: "POST",
              url: routeJS('vente.abandonner'),
              data: {'ref' : ref},
              success: function (response) {
                VenteController.get_ten_last_vente();
              }
          });
        }


      static print(ref_vente)
      {
         
        let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1000,height=${window.screen.height},left=-1000,top=-1000`;

        var url = routeJS('facture');

       // url = `http://127.0.0.1:8000/admin/print/Rapport_hebdo`;

        url = `${url}?reference=${ref_vente}`;

        var currentPrintDialog = window.open(url, 'bsta', params);
        window.currentPrintDialog = currentPrintDialog;
        window.currentPrintDialog.addEventListener('afterprint',function(e){

            currentPrintDialog.close();
        });
      }


      static save_client()
      {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

          let name =  $('#CreateClient #name').val();
          let numero =  $('#CreateClient #numero').val();
    
          if(name.trim().length  > 0){
          $.ajax({
              type: "POST",
              url: routeJS('client.store.vente'),
              data: {'name': name, 'numero':numero},
              success: function (response) {
                   $('#CreateClient').modal('hide') 
              }
          });
        }
      }

}