
<?php
error_reporting(0); 
ob_start();
      include('Connection.php');
      if(isset($_POST['login']))
  {
  $select="select USER_ID,PASSWORD from TPGBHS_USER
where USER_ID='".$_POST['username']."' and PASSWORD='".$_POST['password']."'";
//print $select;
  $parseresults = ociparse($conn, $select);
ociexecute($parseresults);
   

  while($userrow=oci_fetch_assoc($parseresults))
  {
  $USER_ID=$userrow['USER_ID'];
  } oci_free_statement($parseresults);
oci_close($conn); 
if($USER_ID==$_POST['username']){
  session_start();
  $_SESSION['USER_ID']=$USER_ID;
  
  if($USER_ID=='SUPERADMIN'){
    header("Location: Home.php");
  }else{
    header("Location: addNewData.php");
  }
  
  
}
echo $_SESSION['USER_ID'];
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
<link rel="icon" type="image/ico" href="img/logo1.ico"/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="h-100" >
    <div id="wrapper" class="h-100">
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form method="post">
                <h1 style="color: black; text-shadow: 0px 0px 3px green; text-align: center; font-weight: bold;">Login</h1>

                <!-- Input fields -->
                <div class="form-group">
                    <label for="username" style="color: black; text-shadow: 0px 0px 3px green; text-align: center; font-weight: bold;">Tracking No:</label>
                    <input type="text" class="form-control username" id="username" placeholder="Tracking No..." name="username">
                </div>
                <div class="form-group">
                    <label for="password" style="color: black; text-shadow: 0px 0px 3px green; text-align: center; font-weight: bold;">Pin Number:</label>
                    <input type="password" class="form-control password" id="password" placeholder="Pin Number..." name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="login" value="login">
                      Login
                    </button>
                
            </form>
            <!-- Form end -->
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

</body>

</html>
