<?php include("connection.php")?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php 
       include("aside.php");
       
       ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <div class="row">
                        <h1>add category</h1>
                    </div>
                    <div class="container">
                    <form action="" method="post" enctype='multipart/form-data'>
<div class="form-group">
  <label for="">category name</label>
  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
  
</div>
<div class="form-group">
  <label for="">category description</label>
  <input type="text" name="des" id="" class="form-control" placeholder="" aria-describedby="helpId">
  
</div>

<div class="form-group">
  <label for="">category image</label>
  <input type="file" name="img" id="" class="form-control" placeholder="" aria-describedby="helpId">
  
</div>
<input type="submit" value="add" class="btn btn-info"  name="btn_cat" >





                    </form>

                    <?php 
                    if(isset($_POST['btn_cat'])){

                        $cname=$_POST['name'];
                        $cdes=$_POST['des'];
                       $catimg= $_FILES['img']['name'];
                       $cattmpname=$_FILES['img']['tmp_name'];
                       $detination="img/".$catimg;
                       $extension=pathinfo($catimg,PATHINFO_EXTENSION);
                       if($extension=='png' || $extension=='jpg' || $extension=='jpeg'){
                        if(move_uploaded_file($cattmpname,$detination)){
                            $q=mysqli_query($con,"INSERT INTO `categories`(`cat_name`, `cat_des`, `image`) VALUES ('$cname','$cdes','$catimg')");
                            echo"<script>alert('category added')</script>";
                        }
                        else{
                            echo"<script>alert('error')</script>";
                        }
                       }
                       else{
                        echo"<script>alert('extension does not matched')</script>";
                       }

                    }
                    
                    ?>















                    </div>   
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php")?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>