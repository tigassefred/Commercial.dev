// var app_base_url ="http://127.0.0.1:8000/";

var app_route_list = {
  'Stockage_check_name_exist' : 'api/Stockage_check_name_exist',
  'stockage.delete' : 'api/stockage',
  'Check_if_article_existe_edit' : 'api/Check_if_article_existe_edit',
  'caisse.store' : 'api/caisse/store',
  'facture' : 'facture',
  'getAll' : 'liste_vente',
  'client.index' : 'api/client',
  'client.update_client' : 'api/client/update',
  'vente.abandonner' : 'api/vente/giveup',
  'client.store.vente' : 'api/client/save',
 
    
};

function routeJS(name){

 let app_base_url = ""; //'127.0.0.1:8000';
 let the_url = app_route_list[name];

 if(app_base_url.substr(-1)=="/"){
     the_url = app_base_url + the_url;
 }else{
     the_url = app_base_url + "/" + the_url;
 }
  console.log(the_url);
 var RegUrl = /{\s*([a-zA-Z0-9_]*)\s*}/g;
 var match = the_url.matchAll(RegUrl);
 var args = Array.from(arguments);
 args.shift();
 var index = 0;
 for(var item of match){
     the_url = the_url.replace(item[0], args[index]);
     index++;
 }
 return the_url;
}