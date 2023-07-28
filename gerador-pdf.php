<?php

require "vendor/autoload.php"; //baixei do packagist o dompdf utilizando o composer para baixar esse cara

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

ob_start(); //inicia um buffer de saída e tudo que vem depois dessa função eu to falando com o php: eu to carregando um arquivo, carrega ele mas não exibe na página ainda, guarda, e quando eu pedir para você fazer alguma ação, vocÊ faz
require "conteudo-pdf.php";
$html = ob_get_clean(); //pega o conteudo já renderizado e joga na variavel html, ou seja, esta jogando o conteudo-pdf.php na variavel


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream(); //gera a saída / arquivo