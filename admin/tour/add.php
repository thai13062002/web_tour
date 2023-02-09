<?php
  $title = 'Thêm tour';
  $Url = '../';
  require_once ('../layouts/header.php');
  $sql = "select * from Category";
  $categoryItems = executeResult($sql);
 
?>
<div class="container">
    <h2 style="text-align:center">Thêm tour</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" class="form-control"  id="title" name="title">
        </div>
        <div class="form-group">
            <label>Danh mục:</label>
            <select name="category_id" id="category_id" class="custom-select">
                <?php
                    foreach($categoryItems as $item) {
                        if($item['id'] == $category_id) {
                            echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                        } else {
                            echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail"accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
        </div>
        <div class="form-group">
            <label>Giá tiền</label>
            <input type="text" class="form-control"  id="price" name="price">
        </div>
        <div class="form-group">
            <label>Giảm giá</label>
            <input type="text" class="form-control"  id="discount" name="discount">
        </div>
        <div class="form-group">
            <label>Thời gian</label>
            <input type="text" class="form-control"  id="day" name="day">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description" id="description" value="" cols="30" rows="10"></textarea>
        </div>
        
        <button class="btn btn-success ">Lưu</button>
        
        
    </form>
    
</div>
<?php
  
    if(!empty($_POST)) {
        $id = getPOST('id');
        $title = getPOST('title');
        $price = getPOST('price');
        $discount = getPOST('discount');
        $day = getPOST('day');
        $thumbnail = uploadFile('thumbnail');
    
        $description = getPOST('description');
        $category_id = getPOST('category_id');
        $creat_at = $update_at = date('Y-m-d H:s:i');
    
        
            //insert
        $sql = "insert into tour(category_id,title,price,discount,thumbnail,day,description,creat_at,update_at) values ('$category_id','$title','$price','$discount','$thumbnail','$day','$description','$creat_at','$update_at')";
        execute($sql);
        echo"<script>alert('Thêm thành công')</script>";
        die();
        
    }
    
?>
<?php
  require_once ('../layouts/footer.php');
?>