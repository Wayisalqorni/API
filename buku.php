<?php
require_once "method.php";
$buku = new Buku();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method){
    case 'GET':
        if(!empty($_GET["id"]))
        {
            $id=intval($_GET["id"]);
            $buku->get_bk($id);
        }
        else
        {
            $buku->get_buku();
        }
        break;
    case 'POST':
        if(!empty($_GET["id"]))
        {
            $id=intval($_GET["id"]);
            $buku->update_buku($id);
        }
        else
        {
            $buku->insert_buku();
        }
        break;
    case 'DELETE':
        $id=intval($_GET["id"]);
        $buku->delete_buku($id);
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    break;
}
?>