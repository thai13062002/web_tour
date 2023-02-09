<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
$user = getToken();
  if($user== null){
    
    die();
}
if(!empty($_POST)){
    $action = getPOST('action');
    switch($action){
        case 'update':
            update();
            break;
        case 'delete':
            Delete();
            break;
    }
}
function Delete(){
    $id = getPOST('id');
    $sql="delete from order_tour where id = $id";
    execute($sql);
  
}
function update() {
	$id = getPost('id');
	$status = getPost('status');

	$sql = "update order_tour set status = $status where id = $id";
	execute($sql);
}
?>