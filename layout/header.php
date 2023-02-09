<?php
    session_start();
    
    require_once('./database/dbhelper.php');
    require_once('./utils/utility.php');
    $sql = "select * from category ";
    $data =  executeResult($sql);
    
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title><?=$title?></title>
    <style>
      .carousel-inner img{
    width: 100%;
    z-index: -1;
    height: 550px;
}
.icon{
  padding:20px 20px 0 20px;
}
.mb-4 a{
  border-radius:50%;
}
.card{
  width: 98%;
}
.col-md-3 img{
    width: 200px;
    height: 200px;
    
}


nav{
  background:rgba(7,63,96,1);
}

    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg  navbar-dark fixed-top" >
        <!-- Brand -->
        <a class="navbar-brand" href="index.php"><h3>BlackWhite</h2></a>
      
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Navbar links -->
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <?php
              foreach($data as $value){
                echo'
                  <li class="nav-item">
                    <a class="nav-link" href="category.php?id='.$value['id'].'">'.$value['name'].'</a>
                  </li>';
              }
            ?>
            <li class="nav-item">
              <a href="check.php" class="nav-link">Tra cứu Booking</a>
            </li>
            
          </ul>
        </div>
        
      </nav>
     
    

      <!-- Modal body -->

    </div>
  </div>
</div>
    </header>
    <main>
    


</script>