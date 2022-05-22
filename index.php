<?php
    include('dbcon.php');
    $num_row = mysqli_num_rows(mysqli_query($con , "SELECT * FROM sound"));
    echo $num_row;
    echo "<br>";
    $limit_page = 10;

    $num_page = $num_row/$limit_page +1 ;
     
    $page = $_GET['page'];
    $limit_start = ($page * $limit_page) - $limit_page;
    echo $limit_start;
    echo "<br>";

    $num_page = floor($num_page);
    echo $num_page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    

    <style>
        .nav_bar{
            display:flex;
        }
        ul {
            display:flex;
            text-decoration:none;

            
        }
        ul li{
            margin: 0 .2rem;
            list-style:none ;
            text-decoration:none;
            color:#fff;
            

        }
        a{
            
            text-decoration:none;
            color:#fff;

        }
        #bg{
            background:#333;
        }
        .nav_bar a{
            padding:0 2rem;
            text-decoration:none;

            color:#fff;
            background:#333;
        }
    </style>
    <div class="container">
    <table class="table table-striped my-5">


       
        <tr>
        <th>id</th>
        <th>file</th>
        <th>name</th>
        <th>keyword</th>

        </tr>
            <?php  
                $sql  = mysqli_query($con , "SELECT * FROM sound  LIMIT  $limit_start,$limit_page");

                while($result = mysqli_fetch_array($sql)){
            
            ?>
        <tr>
            <td><?php echo $result['id']?></td>
            <td><?php echo $result['file']?>dd</td>
            <td><?php echo $result['name']?></td>
            <td><?php echo $result['keyword']?></td>
        </tr>
             <?php }?>       

    </table>
    <div class="nav_bar">
        
        
        <?php if($page <= 1) {?>
            <a href="#">ย้อน</a>
       <?php }else { ?>
            <a href="?page=<?= $page-1?>">ย้อน</a>
        <?php }?>
       
        <ul>
            <?php 
            
            for($i=1; $i<=$num_page ; $i++) {?>
            <li id="bg" ><a href="?page=<?=  $i ?>"><?= $i ?></a></li>
           <?php }?>
        </ul>


        <?php if($page >= $num_page) {?>
            <a href="#">ถัดไป</a>
        <?php }else{?>
            <a href="?page=<?= $page+1?>">ถัดไป</a>
        <?php }?>
    </div>
  
    

</body>
</html>