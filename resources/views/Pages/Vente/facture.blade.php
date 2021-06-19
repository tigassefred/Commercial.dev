@extends('Layouts.print')
@section('content')

@push('custum-styles')
    <style>
          @page{
              size:'A5';
              margin: 0;
          }

          body{
              height: 210mm;
              width: 148.5mm;
              margin: 0;
          }
    </style>
@endpush

<?php

$data = Vente::where('NVente', $_GET["vente"])->first();
$Panier = Panier::where('ref_panier', $data->NPanier)->get();
$Caisse = Caisse::where('NVente', $_GET["vente"])->first();

$info = Parametre::first();


?>



<page_footer>
    <p style="text-align: right;"> Page [[page_cu]] sur [[page_nb]]</p>
</page_footer>
<div>

    <img src="/opt/lampp/htdocs/Commercial.dev/public/img/header1.jpeg" alt="image banner" style="width:100%;height:100px;" />
    <table>

        <tr style="width: 100%;">
            <td class="infos"><?php if (isset($info)) echo $info->number1 . " /" . $info->number2 . " /" . $info->number3 . " /" . $info->number4  . "  | " . $info->email  ?></td>
        </tr>

    </table>
</div>


<table style="margin-top: 15px;">

    <tr style="width: 100%;">
        <td class="Ticket">TICKET DE CAISSE N°: <?php if (isset($data))  echo $data->NVente ?></td>
    </tr>

</table>

<table style="margin-top: 5px;">
    <tr>
        <td style="width: 60%;">Type de règlement : <strong>Espece</strong> </td>
        <td style="width: 40%;">Vente Effectuée le : <?php if (isset($data))  echo date('d-m-Y', strtotime($data->created_at)) ?> </td>
    </tr>
</table>


<hr>
<table>
    <tr>
        <td style="width: 60%; height : 30px">Client: <strong><?php if (isset($data))  echo $data->client ?></strong> </td>
    </tr>

    <tr>
        <td style="width: 50%;">Pour: <strong>Achat de Materiel</strong> </td>
        <td style="width: 50%;">Vendeur(se): <strong><?php if (isset($data))  echo $data->Vendeur ?></strong> </td>
    </tr>
</table>


<!-- /////////////////////////////////////////////////// -->

<table style="margin-top:20px; " class="border">
    <thead>
        <tr>
            <th style="width: 56%;">Désignation</th>
            <th style="width: 8%;">Qté</th>
            <th style="width: 12%;">PU</th>
            <th style="width: 12%;">Remise</th>
            <th style="width: 12%;">Total</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Panier as  $value) { ?>

            <tr>
                <td> <?php echo $value->article ?></td>
                <td> <?php echo $value->qte ?></td>
                <td> <?php echo $value->PU ?></td>
                <td> <?php echo $value->Remise ?></td>
                <td> <?php echo $value->Net_payer ?></td>
            </tr>

        <?php } ?>

        <tr>

            <td colspan="4" class="td-iner">
                TOTAL <br> REMISE
            </td>
            <td>
             <?php if (isset($data))  echo $data->valeur_panier ?> <br>  <?php if (isset($data))  echo $data->remise ?>
            </td>
        </tr>

        <tr>
            <td colspan="4" style=" font-weight: bold" class="td-iner">Net à Payer</td>
            <td><?php if (isset($data))  echo $data->net_a_payer ?></td>
        </tr>


    </tbody>


</table>
<p>Reste à payer : <span class="font-weight-bold"><?php if(isset($Caisse)) echo $Caisse->Reste ;  ?> </span>FCFA</p>

<table>
    <tr>
        <td style="width : 60%">Le Responsable</td>
        <td style="width : 50%; text-align : center">Le Client</td>
    </tr>

    <tr>
        <td style="width : 60%"> </td>
        <td style="width : 50%; text-align : center"></td>
    </tr>
</table>






@push('custom-scripts')
<script>
     window.print();
</script> 
@endpush
@endsection