<?php
    $id= getPOST('id');
    $name = getPOST('name');
    if(!empty($_POST)){
    if($id > 0) {
		//update
		$sql = "update category set name = '$name' where id = $id";
		execute($sql);
	} else {
		//insert
		$sql = "insert into category(name) values ('$name')";
		execute($sql);
		
	}
}
    
?>