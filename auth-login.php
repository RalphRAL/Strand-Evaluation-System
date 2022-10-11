<?php 
require_once 'database/db_config.php';

$sql = 'SELECT * FROM users';
$query = $connection->query($sql);
$row = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Caloocan High School Strand Evaluation System</title>
	<!--ICONS-->
	<link href="images/uploads/<?php echo $row['logo_image'];?>" rel="icon">
	<!--BOOTSTRAP CSS-->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/auth-users-login.css">
	<!--GOOGLE FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!--GOOGLE MATERIAL ICONS-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!---SWEETALERT 2--->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--FONTAWESOME 6-->
	<script src="https://kit.fontawesome.com/fe40695223.js" crossorigin="anonymous"></script>

</head>
<body class="bg-primary">

<section class="container-fluid">
	<section class="row justify-content-center">
		<section class="card-content col-lg-12 col-md-6">
			<form id="authLoginForm" class="form-container" action="controllers/authLogin.php" method="POST">
				<div class="imgcontainer text-center">
			      <img src="images/chslogo.jpg" alt="Avatar" class="avatar">
			      <p class="h4 mt-3 mb-3">CHS Faculty</p>
			    </div>
			  <div class="form-group">
			    <label for="auth_username">Username</label>
			    <input type="text" class="form-control" name="auth_username" id="auth_username">
			  </div>
			  <div class="form-group">
			  	<div class="password-container">
			  		<label for="auth_password">Password</label>
				    <input type="password" class="form-control" name="auth_password" id="auth_password" aria-describedby="authPassHelp">
				    <i class="far fa-eye-slash" id="togglePassword"></i>
				    <small id="authPassHelp" class="form-text text-muted">Never share your password with anyone else.</small>
			  	</div>
			  </div>
			  <button type="submit" class="btn btn-primary btn-block">Log In</button>

			  <!--<label class="mt-3 w-100 text-center">Forgot your password? <a href="#">Click here</a></label>-->
			</form>
		</section>
	</section>
</section>


<script src="jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="jquery-validation/jquery.validate.min.js"></script>
<script src="jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

/**TOGGLE PASSWORD**/

	$("#togglePassword").on('click', function(e) {
    e.preventDefault()

    // get input group of clicked link
    var form_control = $(this).closest('.password-container')

    // find the input, within the input group
    var input = form_control.find('#auth_password')

    // find the icon, within the input group
    var icon = form_control.find('i')

    // toggle field type
    input.attr('type', input.attr("type") === "text" ? 'password' : 'text')

    // toggle icon class
    icon.toggleClass('fa-eye')
  });


/**AUTHORIZED LOGIN FORM WITH VALIDATION**/
$('#authLoginForm').validate({
	rules: {
	  auth_username: {
	    required: true
	  },
	  auth_password: {
	    required: true
	  },
	},
	messages: {
	  auth_username: {
	    required: "Please enter your username"
	  },
	  auth_password: {
	    required: "Please enter your password"
	  }
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
	  error.addClass('invalid-feedback');
	  element.closest('.form-group').append(error);
	  $("#auth_username").css({ 'background-image' : 'none' });
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	  $("#auth_password").css({ 'background-image' : 'none' });
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	},
	submitHandler: function(form){

	        var form = $(form);

	        // validation
	        var username = $("#auth_username").val();
	        var password = $("#auth_password").val();

	        if(username && password) {
	            //submit the form to server
	            $.ajax({
	                url : form.attr('action'),
	                type : form.attr('method'),
	                data : form.serialize(),
	                dataType : 'json',
	                success:function(response) {

                		const swalWithBootstrapButtons = Swal.mixin({
						  customClass: {
						    confirmButton: 'btn btn-primary'
						  },
						  buttonsStyling: false
						});

	                    if(response.success == true && response.role == 'admin') {
							/**swalWithBootstrapButtons.fire({
		                        title: 'Success',
		                        text: response.messages,
		                        icon: 'success',
		                        confirmButtonText: 'Okay',
		                    });**/
				            window.location = "admin/";
	                        //alert(response.messages);
	                    }else if(response.success == true && response.role == 'teacher') {
							/**swalWithBootstrapButtons.fire({
		                        title: 'Success',
		                        text: response.messages,
		                        icon: 'success',
		                        confirmButtonText: 'Okay',
		                    });**/
				            window.location = "faculty/";
	                        //alert(response.messages);
	                    } else {
							swalWithBootstrapButtons.fire({
		                        title: 'Error',
		                        text: response.messages,
		                        icon: 'error',
		                        confirmButtonText: 'Okay',
		                    });
	                    }  // /else
	                } // success  
	            }); // ajax submit               
	        } /// if

	        return false;
	}
});
});
</script>
</body>
</html>