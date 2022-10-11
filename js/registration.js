/**HAMBURGER MENU**/
var navLinks = document.getElementById("navLinks");

function showMenu(argument) {
	navLinks.style.right = "0";
}
function hideMenu(argument) {
	navLinks.style.right = "-200px";
}

/**REGISTRATION CANCEL BUTTON**/
document.getElementById("cancelBtn").onclick = function () {
	window.location.href = "index.php";
}
$(document).ready(function () {
	/**REGISTRATION FORM WITH VALIDATION**/
  $('#registrationForm').validate({
    rules: {
      firstName: {
        required: true
      },
      middleName: {
        required: true
      },
      lastName: {
        required: true
      },
      mobileNum: {
        required: true,
        number: true,
        maxlength: 11,
        minlength: 11
      },
      emailAdd: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 8
      },
      confirmPassword: {
        required: true,
        equalTo: '#password'
      }
    },
    messages: {
      firstName: {
        required: "Please enter your first name"
      },
      middleName: {
        required: "Please enter your middle name",
      },
      lastName: "Please enter your last name",
      mobileNum: {
        required: "Please enter your mobile number",
        maxlength: "Should be 11 digits",
        minlength: "Should be 11 digits"
      },
      emailAdd: {
        required: "Please enter valid E-mail address"
      },
      password: {
        required: "Please enter a password",
        minlength: "Password must be atleast 8 characters long"
      },
      confirmPassword: {
        required: "Please confirm your password",
        equalTo: "Password does not match!"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-control').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('error');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('error');
    },
    submitHandler: function(form){

            var form = $(form);

            // validation
            var firstName = $("#firstName").val();
            var middleName = $("#middleName").val();
            var lastName = $("#lastName").val();
            var mobileNum = $("#mobileNum").val();
            var emailAdd = $("#emailAdd").val();
            var password = $("#password").val();

            if(firstName && middleName && lastName && mobileNum && emailAdd && password) {
                //submit the form to server
                $.ajax({
                    url : form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType : 'json',
                    success:function(response) {

                		const swalWithBootstrapButtons = Swal.mixin({
						  customClass: {
						    confirmButton: 'hero-btn green-btn-solid'
						  },
						  buttonsStyling: false
						});

                        if(response.success == true) {
                            swalWithBootstrapButtons.fire({
		                        title: 'Success',
		                        text: response.messages,
		                        icon: 'success',
		                        confirmButtonText: 'Okay',
		                    });
		                    $('#registrationForm')[0].reset();
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