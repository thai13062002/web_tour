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
  $sql="delete from user where id = $id";
  execute($sql);
  
}
?>