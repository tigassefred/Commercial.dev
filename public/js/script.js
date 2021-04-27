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

  document.getElementById('userModalForm').addEventListener('submit', function(event){
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
   
   console.log('teste de precejgdsjh');
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