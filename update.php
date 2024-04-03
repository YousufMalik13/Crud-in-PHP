<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"crossorigin="anonymous"/>
    </head>
    <title>Document</title>
</head>
<body>
<?php
$updtid=$_GET['id'];
include"conn.php";
$query="SELECT * FROM `product` WHERE ID=$updtid";
$getdata=mysqli_query($con,$query);
$show=mysqli_fetch_array($getdata);
?>
    <?php
    include"conn.php";
    if(isset($_POST['action'])){
        $Name=$_POST['name'];
        $discript=$_POST['discription'];
        $Price=$_POST['price'];
    
        $imgname = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $url = "";
        if(!empty($imgname)) {
            $url = "images/".$imgname;
        } 
        else{
            $url = $show['image'];
        }
        move_uploaded_file($tempname,$url);
    
        $update="UPDATE `product` SET `prodname`='$Name',`description`='$discript',`prodprice`='$Price',`image`='$url' WHERE id=$updtid";
        mysqli_query($con,$update);
        header("location:view.php");
    
    }
    ?>
    <form class="form-group" method="post" enctype="multipart/form-data">
        <input class="form-control" type="text" name="id" readonly value="<?php echo $show['id']?>">
        <input class="form-control" type="text" name="name" value="<?php echo $show['prodname']?>">
        <input class="form-control" type="text" name="discription" value="<?php echo $show['description']?>">
        <input class="form-control" type="text" name="price" value="<?php echo $show['prodprice']?>">
        <input class="form-control" type="file" name="image" value="<?php echo $show['image']?>">
        <button name="action" class="btn btn-primary my-3">uppdate</button>
    </form>
    
</body>
</html>