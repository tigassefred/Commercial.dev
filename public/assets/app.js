function SuijeVide($variable) {
  if ($variable.trim().length > 0) {
    return false
  } else {
    return true;
  }
}

function ContientLettre($variable)
{
  return isNaN($variable)
}

$('#userModalForm').on('submit', function (event) {
  event.preventDefault();
  let form = $(this).serialize();
  if (SuijeVide($('#lastname').val())) {
    $('#error_span_user_modal').text('Vous devez préciser le nom!!')
    $('#error_span_user_modal').removeClass('d-none');
    return 0;
  }
  if (SuijeVide($('#firstname').val())) {
    $('#error_span_user_modal').text('Vous devez préciser le prénoms!!')
    $('#error_span_user_modal').removeClass('d-none');
    return 0;
  }
  if (SuijeVide($('#phone').val())) {
    $('#error_span_user_modal').text('Vous devez préciser le Numero de Telephone!!')
    $('#error_span_user_modal').removeClass('d-none');
    return 0;
  }

  if ($('#phone').val().trim().length > 8 || $('#phone').val().trim().length < 8) {
    $('#error_span_user_modal').text('Le numero de telephone doit faire exactement 8 charactères!!')
    $('#error_span_user_modal').removeClass('d-none');
    return 0;
  }

  if(ContientLettre($('#phone').val()))
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
          $('#CreateUsers').modal('hide')
          
    }
  });

})

function isNumberKey(evt) {
  let ikeyCode = (evt.which) ? evt.which : evt.keyCode;
  if (ikeyCode != 46 && ikeyCode > 31 && (ikeyCode < 48 || ikeyCode > 57)) {
    return false;
  } else {
    return true;
  }
}

$('#userModalForm').on('show.bs.modal', function(event){
  $('#error_span_user_modal').addClass('d-none');   
})

$('#ModifierUsers').on('show.bs.modal', function (event) {
  $('#error_span_user_edit_modal').addClass('d-none');  
      const ref = $(event.relatedTarget).attr('value')

      $.ajax({
        type: "get",
        url: "/users/"+ref,
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

function toggleCheck(check, action) {
    $(check).attr('checked',action); 
}

$('#ModifierUsersRole').on('show.bs.modal', function(event){
  toggleCheck('#stockage', false)
  toggleCheck('#vendeur', false)
  toggleCheck('#caissier', false)
  toggleCheck('#supervisseur', false)

      const ref = $(event.relatedTarget).attr('value')
      $("#role_ref").val(ref)
      $.ajax({
        type: "get",
        url: "/roles/"+ref,
        success: function (response) {
           response.forEach(element => {
                if(element.name === "Stockage"){ toggleCheck('#stockage', true)}
                if(element.name === "Vendeur"){ toggleCheck('#vendeur', true)}
                if(element.name === "Caissier"){ toggleCheck('#caissier', true)}
                if(element.name === "Supervisseur"){ toggleCheck('#supervisseur', true)}
          

                
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

$('#UserDelete').on('show.bs.modal', function(event){
      const ref = $(event.relatedTarget).attr('value')
      const domaine = document.location;
      $('#deleteUser').attr('action',"/users/"+ref+"/delete")
});