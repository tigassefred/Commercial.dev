<div class="ml-3 mr-3">
    <table class="table table-striped table-bordered mt-4 table-sm">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Nom de l'article</th>
            <th>Quantite</th>
            <th>PU</th>
            <th>Remise</th>
            <th>Net a Payer</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($Paniers as $key => $item)
                 
             <tr>
               <td>{{ ++$key }}</td>
               <td>{{ $item['article'] }}</td>
               <td>{{ $item['qte'] }}</td>
               <td>{{ $item['PU'] }}</td>
               <td>{{ $item['Remise'] }}</td>
               <td>{{ $item['Net_payer'] }}</td>
             </tr>
            @endforeach
 
                
 
           </tbody>
      </table>
</div>