<?php

use App\Models\Caisse;
use App\Models\Panier;
use App\Models\Parametre;
use App\Models\PanierItem;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;


function Gen_facture()
{
    ob_start();
?>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .p-info {

            color: white;
            background-color: #008BD2;
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
            margin-top: 0;
            height: 8px;
            padding: 2pt;
        }

        .infos {
            width: 100%;
            font-weight: bold;
            font-size: 11pt;
            text-align: center;
            background-color: #008BD2;
            color: white;
            padding-top: 5pt;
            padding-bottom: 5pt;
        }

        .Ticket {

            width: 100%;
            font-weight: bold;
            font-size: 12pt;
            text-align: center;
            background-color: #008BD2;
            padding-top: 5pt;
            padding-bottom: 5pt;
            color: white;


        }

        td.right {
            text-align: right;
        }

        table.border td {
            border: 1px solid #CFD1D2;
            padding: 2mm 1mm
        }

        table.border th {
            background-color: #008BD2;
            color: white;
            padding: 3mm;
            font-weight: normal;
            border: 1px solid #CFD1D2;
        }

        .td-iner {
            text-align: right;
        }
        .font-weight-bold{
            font-weight: bold;
        }
        .italic{
            font-style: italic;
        }
    </style>

    <page backright="3mm">

                <?php

                $data = Panier::where('ref', $_GET["reference"])->first();
                 $Caisse = Caisse::where('ref_vente', $_GET["reference"])->first();
                 $Panier = PanierItem::where('ref_vente',$_GET["reference"])->get();
              /*  $Caisse = Caisse::where('NVente', $_GET["vente"])->first();
*/
                $info = Parametre::first(); 


                ?>



<page_footer>
    <p style="text-align: right;"> Page [[page_cu]] sur [[page_nb]]</p>
</page_footer>
<div>

<img src="http://localhost/Laravel/Comm2/public/img/header1.jpeg" alt="image banner" style="width:100%;height:120px;" />
    <table>

        <tr style="width: 100%;">
            <td class="infos"><?php if (isset($info)) echo $info->number1 . " /" . $info->number2 . " /" . $info->number3 . " /" . $info->number4  . "  | " . $info->email  ?></td>
        </tr>

    </table>
</div>


<table style="margin-top: 15px;">

    <tr style="width: 100%;">
        <td class="Ticket">TICKET DE CAISSE N°: <?php if (isset($data))  echo $data->ref ?></td>
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
        <td style="width: 60%; height : 30px">Client: <strong><?php if (isset($data))  echo $data->client->name ?></strong> </td>
    </tr>

    <tr>
        <td style="width: 50%;">Pour: <strong>Achat de matériels</strong> </td>
        <td style="width: 50%;">Vendeur(se): <strong><?php if (isset($data))  echo $data->Vendeur->fullname ?></strong> </td>
    </tr>
</table>


<!-- /////////////////////////////////////////////////// -->

<table style="margin-top:20px; " class="border">
    <thead>
        <tr>
            <th style="width: 60%;">Désignation</th>
            <th style="width: 10%;">Qté</th>
            <th style="width: 15%;">PU</th>
            <th style="width: 15%;">Total</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Panier as  $value) { ?>

            <tr>
                <td> <?php echo $value->article->name ?></td>
                <td> <?php echo $value->quantite ?></td>
                <td> <?php echo $value->valeur ?></td>
                <td> <?php echo $value->quantite*$value->valeur ?></td>
            </tr>

        <?php } ?>

        <tr>

            <td colspan="3" class="td-iner">
                TOTAL <br> REMISE
            </td>
            <td>
             <?php if (isset($data))  echo $data->valeurs?> <br>  <?php if (isset($data))  echo $data->remise ?>
            </td>
        </tr>

        <tr>
            <td colspan="3" style=" font-weight: bold" class="td-iner">Net à Payer</td>
            <td><?php if (isset($data))  echo $data->valeurs - $data->remise ?></td>
        </tr>


    </tbody>


</table>
<p class="italic">Reste à payer : <span class=" font-weight-bold"><?php if(isset($Caisse)) echo $Caisse->reste ;  ?> </span>FCFA</p>

<table style="margin-top : 50px ">
    <tr>
        <td style="width : 60%"></td>
        <td style="width : 50%; text-align : center">La Caisse</td>
    </tr>

    <tr>
        <td style="width : 60%"> </td>
        <td style="width : 50%; text-align : center"></td>
    </tr>
</table>



</page>

<?php

    $content = ob_get_clean();

    require(base_path() . '/vendor/spipu/html2pdf/src/Html2Pdf.php');

    try {
        ob_end_flush();
        $pdf = new Html2Pdf('P', 'A5');
        $pdf->pdf->SetDisplayMode('fullpage');
        $pdf->writeHTML($content);

        $pdf->output('facture.pdf');
    } catch (Html2PdfException $e) {

        die($e);
    }
}
