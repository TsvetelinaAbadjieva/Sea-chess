<?php
//require_once "../common/header.php";
require_once "common/init.php";
session_start();
header("Content-type:application/json");


$url="game.php";

$resultCollection= new ResultCollection();
$total_rows=$resultCollection->getNumRows($_SESSION['username']);

$per_page=10;
$total_pages=(int)ceil($total_rows/$per_page);
//$rest=$total_rows-($total_pages-1)*$per_page+1;

$active_page= isset($_GET['page']) ? (int)htmlspecialchars(trim($_GET['page']),3):$total_pages;


$matrix=isset($_GET['matrix'])?(int)htmlspecialchars(trim($_GET['matrix']),3):3;
if($active_page<=1) {
    $active_page=1;
    $offset=0;
}
elseif($active_page>=$total_pages) {
    $active_page=$total_pages;
    $offset=$total_rows-$per_page;


}
else $offset=$total_rows-($total_pages-$active_page+1)*$per_page;

$results=$resultCollection->getResults(null,null,$_SESSION['username']);
//$results=$resultCollection->getResults(0,$per_page,$_SESSION['username']);

$data=json_encode($results);
echo $data;




