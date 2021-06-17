class Controller{

  static AllowNumber(evt) {       
      let ikeyCode = evt.which ? evt.which : evt.keyCode;
      if (ikeyCode === 46 || (ikeyCode >= 48 && ikeyCode <= 57)) {
          return true;
      } else {
          evt.preventDefault()
          return false;
      }
    }

  static AllowNumberInterger(evt) {       
      let ikeyCode = evt.which ? evt.which : evt.keyCode;
      if ( ikeyCode >= 48 && ikeyCode <= 57) {
          return true;
      } else {
          evt.preventDefault()
          return false;
      }
    }

  static Check_if_article_existe()
  {
    let value = document.getElementById('Create_article_name_id').value;

    $.get(routeJS('Stockage_check_name_exist'),{'key':value},
      function (data, textStatus, jqXHR) {
          if(parseInt(data) >= 1)
          {
            document.getElementById('article_add_samll_id').classList.remove('d-none')
            document.getElementById('add_article_btn_id').classList.add('d-none')

          }else{

            document.getElementById('article_add_samll_id').classList.add('d-none')
            document.getElementById('add_article_btn_id').classList.remove('d-none')
          }
      },
    );
  } 

  static Check_if_article_existe_edit()
  {
    let value = document.getElementById('edit_article_name_id').value;
    let ref = $('#form_submit_stock_edit #ref').val();

    $.get(routeJS('Check_if_article_existe_edit'),{'key':value, 'ref':ref},
      function (data, textStatus, jqXHR) {
          if(parseInt(data) >= 1)
          {
            document.getElementById('article_edit_samll_id').classList.remove('d-none')
            document.getElementById('edit_article_btn_id').classList.add('d-none')

          }else{

            document.getElementById('article_edit_samll_id').classList.add('d-none')
            document.getElementById('edit_article_btn_id').classList.remove('d-none')
          }
      },
    );
  } 
  

  static Send_to_delete_article()
  {
    let value = $('#delete_article_modal input[type=hidden]').val();
      $.get(routeJS('stockage.delete'), {'key':value},
        function (data, textStatus, jqXHR) {
          $('#DeleteArticleModal').modal('hide');
          livewire.emit('RefreshStockage');
        },
      );
  }


    
}