<?php
    $title = 'Tour';
    $Url = '../';
    require_once('../layouts/header.php');  
    $sql = "select tour.*,category.name as category_name from tour left join category on tour.category_id = category.id";
    $data = executeResult($sql);
?>
<div class="container">
    
    <h2 style="text-align:center;margin-top:1em;">Danh sách các Tour</h2>
    
    <a href="add.php"><button type="button" class="btn btn-success"  style="margin-bottom:10px;"><i class="fas fa-plus"></i></button></a>

    <!-- The Modal -->
    
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th style="width:50px">STT</th>
                <th>Tên tour</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th style="width:50px">Sửa</th>
                <th style="width:50px">Xóa</th>
                <th style="width:50px">chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $index = 0;
                foreach($data as $value){
                    echo'
                        <tr>
                            <td style="width:50px">'.(++$index).'</td>
                            <td>'.$value['title'].'</td>
                            <td><img src="'.path($value['thumbnail']).'" style="width:100px"></td>
                            <td>'.number_format($value['discount']).'</td>
                            <td>'.$value['category_name'].'</td>
                            <td style="width:50px"><a href="edit.php?id='.$value['id'].'"><button class="btn btn-primary"><i class="fas fa-edit"></i></button</a></td>
                            <td style="width:50px"><a><button class="btn btn-danger" onclick="Delete('.$value['id'].')"><i class="fas fa-trash-alt"></i></button</a></td>
                            <td style="width:50px"><a href="detail.php?id='.$value['id'].'"><button class="btn btn-success"><i class="fas fa-info-square"></i></button>
                        </tr>';
                }
            ?>
            
        </tbody>
    </table>
</div>
<script>
    function Delete(id){
        option= confirm('Bạn có muốn xóa tour này không?');
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