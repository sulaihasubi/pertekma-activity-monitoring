<?php
session_start();
include ('connect.php');
//User Login
if(isset($_POST["login"])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	$checkuser=mysqli_query($con, "SELECT * FROM user WHERE BINARY username='$username' AND password='$password'");
	$result=mysqli_fetch_array($checkuser);
	$status=$result["status"];
	$iduser=$result["iduser"];
	if($status==2){
		$_SESSION["iduser"]=$iduser;
		echo "<script>window.location='superadmin'</script>";
	}elseif($status==3){
		$_SESSION["iduser"]=$iduser;
		echo "<script>window.location='admin'</script>";
	}elseif($status==4){
		$_SESSION["iduser"]=$iduser;
		echo "<script>window.location='user'</script>";
	}elseif($status==5){
		$_SESSION["iduser"]=$iduser;
		echo "<script>window.location='dekan'</script>";
	}elseif($status==6){
		$_SESSION["iduser"]=$iduser;
		echo "<script>window.location='timbalandekan'</script>";	
	}else{	
		header("location: index.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PERTEKMA Activity Monitoring</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Validation Script-->
  <script src="../pertekma/jquery-validation-1.19.0/lib/jquery.js"></script>
  <script src="../pertekma/jquery-validation-1.19.0/dist/jquery.validate.js"></script>
  <script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics"
			}
		});

		// propose username by combining first- and lastname


		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});
	</script>
 	
  	<style>
	#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
	}
	#signupForm {
		width: 670px;
	}
	#Form label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	}
	</style>


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <!-- <div class="col-xl-10 col-lg-12 col-md-9"> -->

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class=""></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">PERTEKMA Activity Monitoring</h1>
                  </div>
                  <fieldset>
                  
                  <form class="user" id="Form" method="post" action="" role="form">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username"  minlength="2" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Sign in</button>
                    
                  </fieldset>
                  </form>
                  <hr>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Validation Script-->
	

  

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
