@extends('Layouts.app', ['titre'=>'Commercial - Caisse'])
@section('content')


<div class=" container mt-3">
   
   <table class="table table-striped table-bordered">
       <thead >
           <tr>
               <th>#</th>
               <th>Reference</th>
               <th>Client</th>
               <th>Valeur</th>
               <th>Date</th>
               <th>Action</th>
           </tr>
           </thead>
           <tbody>
               @foreach ($caisses as  $key => $item)
                 <tr>
                   <td>{{++$key}}</td>
                   <td>{{$item->ref}}</td>
                   <td>{{$item->name}}</td>
                   <td>{{$item->valeurs}}</td>
                   <td>{{$item->created_at->format('Y-m-d H:i')}}</td>
                   <td>
                       <button class="btn btn-primary" onclick="print('{{$item->ref}}')">Imprimer</button>
                    </td>
                   
                 </tr>
               @endforeach
           </tbody>
   </table>

     {{$caisses->links()}}

</div>

@push('custom-scripts')
    

  <script>
          function print(ref_vente)
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
  </script>
@endpush
@endsection