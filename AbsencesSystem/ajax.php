<?php
ob_start();
$activity = $_GET['action'];
include 'checkreqadmi.php';
$grime = new Action();

if ($activity == "save_course") {
    $sosmena = $grime->save_course();
    if ($sosmena) echo $sosmena;
}
if ($activity == "delete_course") {
    $diagrafo = $grime->delete_course();
    if ($diagrafo) echo $diagrafo;
}

if ($activity == "save_class") {
    $sosmena = $grime->save_class();
    if ($sosmena) echo $sosmena;
}
if ($activity == "delete_class") {
    $sosmena = $grime->delete_class();
    if ($sosmena) echo $sosmena;
}

if ($activity == "save_class_subject") {
    $sosmena = $grime->save_class_subject();
    if ($sosmena) echo $sosmena;
}
if ($activity == "delete_class_subject") {
    $sosmena = $grime->delete_class_subject();
    if ($sosmena) echo $sosmena;
}
if ($activity == "get_class_list") {
    $get = $grime->get_class_list();
    if ($get) echo $get;
}
if ($activity == "get_att_record") {
    $get = $grime->get_att_record();
    if ($get) echo $get;
}
if ($activity == "get_att_report") {
    $get = $grime->get_att_report();
    if ($get) echo $get;
}
if ($activity == "save_attendance") {
    $sosmena = $grime->save_attendance();
    if ($sosmena) echo $sosmena;
}
ob_end_flush();
?>
