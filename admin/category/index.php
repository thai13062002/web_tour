<?php
    $title = 'Quản lý danh mục tour';
    $Url = '../';
    require_once('../layouts/header.php');
    
    require_once('save.php');
    
    $name=$id = '';
    if(isset($_GET['id'])) {
		$id = getGet('id');
		$sql = "select * from Category where id = $id";
		$data = executeResult($sql, true);
		if($data != null) {
			$name = $data['name'];
		}
	}

    $sql = "select category.* from category ";
    $data = executeResult($sql);
    
?>
<div class="container">
    
    <h2 style="text-align:center;margin-top:1em;">Danh mục Tour</h2>
    <label style="margin-left:15px;" >Tên danh mục:</label>
    <form class="form-inline " action="?"style="margin:0 0 10px 15px;" method="post" onsubmit=" return validateForm()">
        <input class="form-control mr-sm-2" require="true" type="text" id="name" name="name" value="<?=$name?>">
        <input type="text" name = "id" name="id" value = "<?=$id?>" hidden="true">
        <button class="btn btn-success" type="submit"><i class="fas fa-save" style="margin-right:5px"></i>Lưu</button>
        
    </form>
    <div class="col-md-12">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="width:50px">STT</th>
                    <th>Tên danh mục</th>
                    <th style="width:50px">Sửa</th>
                    <th style="width:50px">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index=0;
                    foreach($data as $value){
                        echo '
                            <tr>
                                <td style="width:50px">'.(++$index).'</td>
                                <td>'.$value['name'].'</td>
                                <td><a href="?id='.$value['id'].'"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                                <td><a ><button class="btn btn-danger" onclick="Delete('.$value['id'].')"><i class="fas fa-trash-alt"></i></button></a></td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function validateForm(){
        
        $name = $('#name').val();
        if($name==''){
            alert("Vui lòng nhập tên");
            return false;
        }
    return true;
    }
    function Delete(id){
        option= confirm('Bạn có muốn xóa danh mục này không?');
        if(!option) return;
        $.post('api.php',{
            'id': id,
            'action':'delete'
        },function(data){
            if(data != null && data != '') {
				alert(data);
				return;
			}
            location.reload();
    })
    }
</script>
<?php
    require_once('../layouts/footer.php');
?>