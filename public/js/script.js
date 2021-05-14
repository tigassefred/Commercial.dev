

function SuijeVide($variable) {
    return ($variable.trim().length > 0) ?  false : true;
  }
  
  function ContientLettre($variable) { return isNaN($variable)}

  function RemoveDNone(balise)
  {
      document.getElementById(balise).classList.remove('d-none')
  }

  function isNumberKey(evt) {
    let ikeyCode = (evt.which) ? evt.which : evt.keyCode;
    if (ikeyCode != 46 && ikeyCode > 31 && (ikeyCode < 48 || ikeyCode > 57)) {
      return false;
    } else {
      return true;
    }
  }

  

  function toggleCheck(check, action) { 
       $(`#${check}`).prop('checked',action)
   }

  $('#userModalForm').on('show.bs.modal', function(event){
    $('#error_span_user_modal').addClass('d-none');   
  })

  $('#userModalForm').on('submit', function(event){
     event.preventDefault();
     let form = $(this).serialize();
     if (SuijeVide($('#lastname').val())) {
       $('#error_span_user_modal').text('Vous devez préciser le nom!!')
       RemoveDNone('error_span_user_modal');
       return 0;
     }
     if (SuijeVide($('#firstname').val())) {
       $('#error_span_user_modal').text('Vous devez préciser le prénoms!!')
       RemoveDNone('error_span_user_modal');
       return 0;
     }
     if (SuijeVide($('#phone').val())) {
       $('#error_span_user_modal').text('Vous devez préciser le Numero de Telephone!!')
       RemoveDNone('error_span_user_modal')
       return 0;
     }
   
     if ($('#phone').val().trim().length > 8 || $('#phone').val().trim().length < 8) {
       $('#error_span_user_modal').text('Le numero de telephone doit faire exactement 8 charactères!!')
       RemoveDNone('error_span_user_modal')
       return 0;
     }
   
     if(ContientLettre($('#phone').val()))
     {
       $('#error_span_user_modal').text('Le numero de telephone doit contenir uniquement des chiffres !!')
       RemoveDNone('error_span_user_modal')
       return 0;
     }
   
     $.ajax({
       type: "POST",
       url: "/employer",
       data: form,
       success: function (response) {
             livewire.emit('RefreshUserList');
             $('#CreateUsers').modal('hide')
             
       }
     });
  });

  $('#ModifierUsers').on('show.bs.modal', function (event) {
    $('#error_span_user_edit_modal').addClass('d-none');  
        const ref = $(event.relatedTarget).attr('value')
  
        $.ajax({
          type: "get",
          url: "/employer/"+ref,
          success: function (response) {
               $('#edit_lastname').val(response.lastname)
               $('#edit_firstname').val(response.firstname)
               $('#edit_phone').val(response.phone)
               $('#edit_ref').val(response.ref)
          }
        });
  
       $('#error_span_user_edit_modal').addClass('d-nome');  
  })
  
  $('#edit_userModalForm').on('submit', function (event) {
    event.preventDefault();
    let form = $(this).serialize();
    if (SuijeVide($('#edit_lastname').val())) {
      $('#error_span_user_edit_modal').text('Vous devez préciser le nom!!')
      $('#error_span_user_edit_modal').removeClass('d-none');
      return 0;
    }
    if (SuijeVide($('#edit_firstname').val())) {
      $('#error_span_user_edit_modal').text('Vous devez préciser le prénoms!!')
      $('#error_span_user_edit_modal').removeClass('d-none');
      return 0;
    }
    if (SuijeVide($('#edit_phone').val())) {
      $('#error_span_user_edit_modal').text('Vous devez préciser le Numero de Telephone!!')
      $('#error_span_user_edit_modal').removeClass('d-none');
      return 0;
    }
  
    if ($('#edit_phone').val().trim().length > 8 || $('#edit_phone').val().trim().length < 8) {
      $('#error_span_user_edit_modal').text('Le numero de telephone doit faire exactement 8 charactères!!')
      $('#error_span_user_edit_modal').removeClass('d-none');
      return 0;
    }
  
    if(ContientLettre($('#edit_phone').val()))
    {
      $('#error_span_user_modal').text('Le numero de telephone doit contenir uniquement des chiffres !!')
      $('#error_span_user_modal').removeClass('d-none');
      return 0;
    }
   
    $.ajax({
      type: "POST",
      url: "/users",
      data: form,
      success: function (response) {
        livewire.emit('RefreshUserList');
        $('#ModifierUsers').modal('hide')
      }
    });
  
  })

  $('#UserDelete').on('show.bs.modal', function(event){
    const ref = $(event.relatedTarget).attr('value')
    const domaine = document.location;
    $('#deleteUser').attr('action',"/employer/"+ref+"/delete")
});

$('#ModifierUsersRole').on('show.bs.modal', function(event){
  toggleCheck('stockage', false)
  toggleCheck('vendeur', false)
  toggleCheck('caissier', false)
  toggleCheck('supervisseur', false)

      const ref = $(event.relatedTarget).attr('value')
      $("#role_ref").val(ref)
      $.ajax({
        type: "get",
        url: "/roles/"+ref,
        success: function (response) {
           response.forEach(element => {
    
                if(element.name === "Stockage".toLowerCase()){ toggleCheck('stockage', true)}
                if(element.name === "Vendeur".toLowerCase()){ toggleCheck('vendeur', true)}
                if(element.name === "Caissier".toLowerCase()){ toggleCheck('caissier', true)}
                if(element.name === "Supervisseur".toLowerCase()){ toggleCheck('supervisseur', true)}
         
           });
        }
      });

      
})

$('#modalRoleUser').on('submit',function(event){
  event.preventDefault();

     const form = $(this).serialize();
     $.ajax({
       type: "POST",
       url: "/roles",
       data: form,
       success: function (response) {
        livewire.emit('RefreshUserList');
        $('#ModifierUsersRole').modal('hide')
       }
     });
})

$('#CreateArticleModal').on('show.bs.modal',function(){
    document.getElementById('errorCreate').classList.add('d-none')
    $('#form_submit_stock  input[type = text]').val('')
});


$('#form_submit_stock').on('submit', function(event){
        event.preventDefault();
        const form = $(this).serialize();
        $('#errorCreate').addClass('d-none')

        $.ajax({
          type: "POST",
          url: "/stockage",
          data: form,
          success: function (response) {

               if(response.statut === 'errors') 
               {
                   $('#errorCreate').text(response.message)
                   $('#errorCreate').removeClass('d-none')
               }  
               if(response.statut === 'success') 
               {     
                     $('#form_submit_stock  input[type = text]').val('')
                     livewire.emit('RefreshArticle');
                     $('#CreateArticleModal').modal('hide')  
               }   
          }
        });
})



$('#EditArticleModal').on('show.bs.modal',function(){
   document.getElementById('errorEdit').classList.add('d-none')
});


$('#form_submit_stock_edit').on('submit', function(event){
        event.preventDefault();
        document.getElementById('errorEdit').classList.add('d-none')
        const ref =  $('#form_submit_stock_edit input[name=ref]').val()
        const form = $(this).serialize();
    
        $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

  $.ajax({
    type: "POST",
    url: `stockage/${ref}`,
    data: form,
    success: function (response) {

      if(response.statut === 'errors') 
      {
          $('#errorEdit').text(response.message)
          $('#errorEdit').removeClass('d-none')
      }  
      if(response.statut === 'success') 
      {     
            $('#form_submit_stock_edit  input[type = text]').val('')
            livewire.emit('RefreshArticle');
            $('#EditArticleModal').modal('hide')  
      }  

    }
  });


})





