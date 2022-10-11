var userTable;
$(document).ready(function() {
$('#btn_generatePass').click(function (){
	$('#accountPassword').val(makeid(8));
});

$('#generateUpdatePass').click(function (){
	$('#updatePassword').val(makeid(8));
});

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

userTable = $('#userTable').DataTable({
	columnDefs: [{
		"orderable": false, "targets": [5]
	}],
	"ajax": "controllers/userTable.php",
	"lengthMenu": [ [10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500] ],
	"language": {
		"emptyTable": "No user records found!"
	}
});

$('a.toggle-vis').on('click', function (e) {
	e.preventDefault();

	// Get the column API object
	var column = userTable.column($(this).attr('data-column'));

	// Toggle the visibility
	column.visible(!column.visible());
});

$('#bt_refresh').on('click', function () {
	userTable.ajax.reload(null, false);
});

/**ADD USER FORM WITH VALIDATION**/
$('#addUserForm').validate({
    rules: {
      accountUsername: {
        required: true
      },
      accountPassword: {
        required: true,
      },
      accountRole: {
        required: true
      },
    },
    messages: {
      accountUsername: {
        required: "Please provide Last name"
      },
      accountPassword: {
        required: "Please provide First name",
        minlength: "Password should be atleast 8 characters"
      },
      accountRole: {
        required: "Please select status"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.col-sm-10').append(error);
      element.closest('.input-group').append(error);
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
      var accountUsername = $("#accountUsername").val();
      var accountPassword = $("#accountPassword").val();
      var accountRole = $("#accountRole").val();

      if(accountUsername && accountPassword && accountRole) {
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
	                userTable.ajax.reload(null, false);
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

});//END OF DOCUMENT READY

document.onkeydown=function(event){
	if (event.keyCode==116) {
		event.preventDefault();
	}
}

function updateUser(id = null){

	if(id) {

		console.log('working');

		$.ajax({
			url: "controllers/fetchUserDetails.php",
			method: "POST",
			data: {user_id:id},
			dataType: 'json',
			success:function(data){

				$('#updateUsername').val(data.username);
				$('#updatePassword').val(data.password);
				$('#updateRole').val(data.role);

				$('#updateUserForm').validate({
				    rules: {
				      updateUsername: {
				        required: true
				      },
				      updatePassword: {
				        required: true,
				        minlength: 8
				      },
				      updateRole: {
				        required: true
				      },
				    },
				    messages: {
				      updateUsername: {
				        required: "Please provide a username"
				      },
				      updatePassword: {
				        required: "Please provide a password"
				      },
				      updateRole: {
				        required: "Please select a role"
				      },
				    },
				    errorElement: 'span',
				    errorPlacement: function (error, element) {
				      error.addClass('invalid-feedback');
				      element.closest('.col-sm-10').append(error);
				      element.closest('.input-group').append(error);
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
				      var username = $("#updateUsername").val();
				      var password = $("#updatePassword").val();
				      var role = $("#updateRole").val();

				      if(username && password && role) {
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
					              userTable.ajax.reload(null, false);
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
			}//END OF SUCCESS FUNCTION
		});//END OF FIRST AJAX
	} else {
		alert('Error: Refresh the page again');
	}
}

function removeUser(id = null) {
	if(id) {
		/*USE THIS LINE OF CODE FOR TESTING PURPOSE ONLY
		console.log("ID is readable");*/

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-md btn-danger',
				cancelButton: 'btn btn-secondary ml-3'
			},
			buttonsStyling: false
		});

		swalWithBootstrapButtons.fire({
	        title: 'Remove',
	        text: "Do you want to remove this user?",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonText: 'Yes, remove it!',
	        cancelButtonText: 'No, cancel!',
	        reverseButtons: false
	    }).then((result) => {
	        if (result.isConfirmed) {
	        $.ajax({        
	          url: 'controllers/removeUser.php',
	          type: 'post',
	          data: {user_id : id},
	          dataType: 'json',
	          success:function(response) {
	            if(response.success == true) {
	              swalWithBootstrapButtons.fire(
	                  'Removed!',
	                  response.messages,
	                  'success'
	                );
	              // refresh the table
	              userTable.ajax.reload(null, false);
	            } else {
	              swalWithBootstrapButtons.fire(
	                  'Error!',
	                  response.messages,
	                  'error'
	                );
	            }
	          }
	        });
	        } else if (
	          result.dismiss === Swal.DismissReason.cancel
	        ) {
	          swalWithBootstrapButtons.fire(
	            'Cancelled',
	            'You cancelled deleting a user',
	            'error'
	          );
	        }
	      });//END OF THEN
	} else {
		alert('Error: Refresh the page again');
	}
}