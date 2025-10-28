creacion de pdfs

ob_start();
// este se pondria delante 
del HTML que vamos a generar 

$contenido = ob_end_clean();
$mpdf = new \Mpdf\Mpdf();
$mpdf -> WriteHTML($contenido);
$mpdf -> Output();

//esto lo ponemos al final del html