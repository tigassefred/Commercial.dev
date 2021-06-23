@php
    ob_start()
@endphp

<p>dsakdjksdjsd</p>



@php
        $content = ob_get_clean();

        require(base_path() . '/vendor/spipu/html2pdf/src/Html2Pdf.php');

try {
    $pdf = new Html2Pdf('P', 'A5');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->output('facture.pdf');
} catch (Html2PdfException $e) {

    die($e);
}
@endphp