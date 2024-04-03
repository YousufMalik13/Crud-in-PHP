<?php
if(isset($_POST['save'])){
    $Name=$_POST['name'];
    $discript=$_POST['discription'];
    $Price=$_POST['price'];

    $imgname=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $imgurl="images/".$imgname;
    move_uploaded_file($tempname,$imgurl);

    include"conn.php";
    $insert="INSERT INTO `product`(`prodname`,`description`,`prodprice`,`image`) VALUES ('$Name','$discript','$Price','$imgurl')";
    mysqli_query($con,$insert);
    header("location:view.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductCrud</title>
            <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
</head>
<body>
     <h3 class="text-center my1 fw-bolder text-info">~ADD PRODUCT~</h3>
     
     <div class="container col-5 rounded bg-light text-dark my-3 shadow">
        
     <form method="post" enctype="multipart/form-data">
            <div class="mb-3 row py-4 px-5">
                <label for="inputName" class="col-6 col-form-label fw-bold fs-5">Product Name:</label>
                <div class="col-6 w-50">
                    <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
            </div>
            <div class="mb-3 row py-4 px-5 input-wrapper">
                <label for="inputName" class="col-6 col-form-label fw-bold fs-5">Product description:</label>
                <div class="col-6">
                    <textarea name="discription"  required placeholder="Write Discription..."
                    class="input-field w-100"></textarea>
                </div>
            </div>
            <div class="mb-3 row py-4 px-5">
                <label for="inputName" class="col-6 col-form-label fw-bold fs-5">Product Price:</label>
                <div class="col-6 w-50">
                    <input type="text" class="form-control" name="price" placeholder="Enter Price">
                </div>
            </div>
            <div class="mb-3 row py-4 px-5">
                <label for="image" class="col-6 col-form-label fw-bold fs-5">Product Image:</label>
                <div class="col-6 w-50">
                    <input type="file" class="form-control" name="image">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-8 pb-3">
                    <button type="submit" class="btn btn-primary" name='save'>Save data</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>