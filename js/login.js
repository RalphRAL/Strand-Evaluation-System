/**HAMBURGER MENU**/
var navLinks = document.getElementById("navLinks");

function showMenu(argument) {
  navLinks.style.right = "0";
}
function hideMenu(argument) {
  navLinks.style.right = "-200px";
}
$(document).ready(function () {

	/**TOGGLE PASSWORD**/

	$("#togglePassword").on('click', function(e) {
    e.preventDefault()

    // get input group of clicked link
    var form_control = $(this).closest('.password-container')

    // find the input, within the input group
    var input = form_control.find('#password')

    // find the icon, within the input group
    var icon = form_control.find('i')

    // toggle field type
    input.attr('type', input.attr("type") === "text" ? 'password' : 'text')

    // toggle icon class
    icon.toggleClass('fa-eye')
  });

	/**LOGIN FORM WITH VALIDATION**/
  $('#loginForm').validate({
    rules: {
      emailAdd: {
        required: true,
        email: true
      },
      password: {
        required: true
      }
    },
    messages: {
      emailAdd: {
        required: "Please enter valid E-mail address"
      },
      password: {
        required: "Please enter your password"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-control').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('error');
      //$(".fa-eye-slash").detach();
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('error');
      //element.closest('.fa').append(error);
    },
    submitHandler: function(form){

      var form = $(form);

      // validation
      var emailAdd = $("#emailAdd").val();
      var password = $("#password").val();

      if(emailAdd && password) {
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
	                    window.location = "exam/";
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