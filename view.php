<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"crossorigin="anonymous"/>
    </head>
        <div class="text-center fs-5 fw-bold my-2">If You Want to add new Product, GO BACK to add Page 
            <a href="create.php" class="fw-normal fs-6">click here</a>
        </div>
    <body>
        <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th class="col-sm-1 text-center border-light border-end">ID</th>
                    <th class="col-sm-1 text-center border-light border-end">PRODUCT NAME</th>
                    <th class="col-sm-2 text-center border-light border-end">DESCRIPTION</th>
                    <th class="col-sm-1 text-center border-light border-end">PRICE</th>
                    <th class="col-sm-2 text-center border-light border-end">IMAGE</th>
                    <th class="col-sm-2 text-center border-light border-end">EDIT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conn.php";
                $read="select * from `product`";
                $show=mysqli_query($con,$read);
                foreach($show as $s){
                ?>
                <tr>
                    <td class="border-end text-center"><?php echo $s['id'];?></td>
                    <td class="border-end"><?php echo $s['prodname'];?></td>
                    <td class="border-end"><?php echo $s['description'];?></td>
                    <td class="border-end"><?php echo $s['prodprice'];?></td>
                    <td class="border-end text-center"><img height="60px" src="<?php echo $s['image'];?>" alt=""></td>
                    <td class="border-end">
                        
                        <a href="prodview.php?id=<?php echo $s['id']?>" class="btn btn-info mx-1">view</a>

                        <a href="delete.php?id=<?php echo $s['id']?>" class="btn btn-danger mx-4">Delete</a>

                        <a href="update.php?id=<?php echo $s['id']?>" class="btn btn-success">UPDATE</a>

                        
                    </td>
                </tr>
                <?php
                }?>
            </tbody>
        </table>
    </div>
    </body>
</html>
