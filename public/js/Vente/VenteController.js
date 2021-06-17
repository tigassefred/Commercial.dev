class VenteController 
{

    static AllowNumberInterger(evt) {       
        let ikeyCode = evt.which ? evt.which : evt.keyCode;
        if ( ikeyCode >= 48 && ikeyCode <= 57) {
            return true;
        } else {
            evt.preventDefault()
            return false;
        }
      }
      
}