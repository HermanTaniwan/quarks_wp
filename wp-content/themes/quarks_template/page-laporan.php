<?php
/*
Template Name: View Laporan Template
Template Post Type: page
*/

include "template-parts/lib/LaporanWP.php";
include "template-parts/lib/EncryptionWP.php";

function view($encryptedData)
{
    $data = EncryptionWP::decrypt($encryptedData);
    $strdata = explode('_', $data);

    $category = $strdata[1];
    $emiten = $strdata[2];
    $file = $strdata[3];


    $filename    = ABSPATH . 'wp-content/emiten/' . $category . '/' . $emiten . '/' . $file;
    header("Content-type: application/pdf");
    header("Content-Length: " . filesize($filename));
    readfile($filename);
    exit;
}

$data = get_query_var('data', 'not set');

view($data);
