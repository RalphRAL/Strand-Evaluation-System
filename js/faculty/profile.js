$(document).ready(function() {


fetchUserDetails();


function fetchUserDetails()
{
	var fetchUserDetails = "fetchUserDetails"
	var user_id = $('#user_id').val();

	$.ajax({
		url: "../admin/controllers/fetchUserDetails.php",
		method: "POST",
		data: {fetchUserDetails:fetchUserDetails, user_id:user_id},
		dataType: 'json',
		success:function(data){

			$('#username').val(data.username);
			$('#password').val(data.password);

			if (data.role == 'teacher') {
				$('#userRole').val("Teacher");
			}

			if (data.user_status == 'Active') {
				$('.userStatus').html('Active').addClass('badge badge-success');
			} else {
				$('.userStatus').html('Deactivated').addClass('badge badge-danger');
			}

				/**UPDATE EXAM DETAILS FORM WITH VALIDATION**/
				$('#updateProfileForm').validate({
				    rules: {
				      username: {
				        required: true
				      },
				      password: {
				        required: true
				      },
				    },
				    messages: {
				      username: {
				        required: "Please provide a username."
				      },
				      password: {
				        required: "Please select a password."
				      },
				    },
				    errorElement: 'span',
				    errorPlacement: function (error, element) {
				      error.addClass('invalid-feedback');
				      element.closest('.form-group').append(error);
				    },
				    highlight: function (element, errorClass, validClass) {
				      $(element).addClass('is-invalid');
				    },
				    unhighlight: function (element, errorClass, validClass) {
				      $(element).removeClass('is-invalid');
				    },
				    submitHandler: function(form){

				      var form = $(form);

				      // validation
				      var username = $("#username").val();
				      var password = $("#password").val();

				      if(username && password) {
				          //Submit the form to server
				          $.ajax({
				              url : form.attr('action'),
				              type : form.attr('method'),
				              data : form.serialize(),
				              dataType : 'json',
				              success:function(response) {

				              	const swalWithBootstrapButtons = Swal.mixin({
								  customClass: {
								    confirmButton: 'btn btn-success',
								    cancelButton: 'btn btn-danger'
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
				                    fetchUserDetails();// WILL AUTOMATIC REFRESH ONCE A DATA IS UPDATED
				                } else {
			                		swalWithBootstrapButtons.fire({
				                        title: 'Error Occured!',
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
				});/**END OF UPDATE EXAM DETAILS FORM WITH VALIDATION**/
		}
	});
}

});