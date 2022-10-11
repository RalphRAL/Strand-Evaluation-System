$(document).ready(function() {


fetchStudentDetails();


function fetchStudentDetails()
{
	var fetchStudentDetails = "fetchStudentDetails";
	var student_id = $('#student_id').val();

	$.ajax({
		url: "controllers/fetchStudentDetails.php",
		method: "POST",
		data: {fetchStudentDetails:fetchStudentDetails, student_id:student_id},
		dataType: 'json',
		success:function(data){

			$('#firstName').val(data.first_name);
			$('#middleName').val(data.middle_name);
			$('#lastName').val(data.last_name);
			$('#mobileNum').val(data.mobile_number);
			$('#emailAdd').val(data.email_address);
			$('#password').val(data.student_password);

			if (data.student_status == 'Active') {
				$('.student_status').html('Active').addClass('badge badge-success');
			} else {
				$('.student_status').html('Inactive').addClass('badge badge-danger');
			}

				/**UPDATE EXAM DETAILS FORM WITH VALIDATION**/
				$('#updateProfileForm').validate({
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
				    },
				    messages: {
				      firstName: {
				        required: "Please provide your first name."
				      },
				      middleName: {
				        required: "Please provide your middle name."
				      },
				      lastName: {
				        required: "Please provide your last name."
				      },
				      mobileNum: {
				        required: "Please provide your mobile number."
				      },
				      emailAdd: {
				        required: "Please provide your e-mail address."
				      },
				      password: {
				        required: "Please provide a password."
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
				      var firstName = $("#firstName").val();
				      var middleName = $("#middleName").val();
				      var lastName = $("#lastName").val();
				      var mobileNum = $("#mobileNum").val();
				      var emailAdd = $("#emailAdd").val();
				      var password = $("#password").val();

				      if(firstName && middleName && lastName && mobileNum && emailAdd && password) {
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
				                    fetchStudentDetails();// WILL AUTOMATIC REFRESH ONCE A DATA IS UPDATED
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