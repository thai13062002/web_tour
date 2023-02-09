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
      case 'delete':
        Delete();
        break;
    }
}
function Delete(){
    $id = getPOST('id');
    $sql = "select count(*) as total from tour where category_id = $id ";
	$data = executeResult($sql,true);
    $total = $data['total'];
	if($total > 0) {
		echo 'Danh mục này đang chứa danh sách các tour không thể xóa!';
		die();
	}
    else{
        $sql1="delete from category where id = $id";
        execute($sql1);
    }
  
}
?>