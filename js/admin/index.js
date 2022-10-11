var userTable;
$(document).ready(function() {

	CountAllUsers();
	CountAllStudents();
	CountAllTakers();

	$('#btn_generatePass').click(function (){
		$('#accountPassword').val(makeid(8));
	});

	// SET OF COLOR CLASSES FOR ACTIVITIES TIMELINE
  var classes        = new Array ('sl-primary', 'sl-danger', 'sl-success', 'sl-warning');
  // CALCULATE LENGTH ONCE, AS THIS WILL NEVER CHANGE
  var length        = classes.length;

  // SELECT SPECIFIC CLASS
  var links        = $('.sl-item');
  
  // LOOP THROUGH ALL .sl-item CLASS AND APPLY COLOR RANDOMLY
  $.each( links, function(key, value) {
      // GET RANDOM VALUE AND CLASS NAME FROM ARRAY AND ADD IT USING THE addClass FUNCTION
      console.log ("IN");
      $(value).addClass( classes[ Math.floor ( Math.random() * length ) ] );
  });

	function makeid(length) {
	    var result           = '';
	    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
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

	$('#userTable tbody').on('click', 'tr', function () {
      var data = userTable.row(this).data();
      console.log(data);
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
});

document.onkeydown=function(event){
	if (event.keyCode==116) {
		event.preventDefault();
	}
}

function CountAllUsers()
  {
    var CountAllUsers = "CountAllUsers";
    $.ajax({
        url : "controllers/CountAll.php",
        method: "POST",
        data : {CountAllUsers:CountAllUsers},
        success:function(data) {
          $('.load-NumberofUsers').html(data);
        } // success  
    }); // ajax submit  
  }

function CountAllStudents()
  {
    var CountAllStudents = "CountAllStudents";
    $.ajax({
        url : "controllers/CountAll.php",
        method: "POST",
        data : {CountAllStudents:CountAllStudents},
        success:function(data) {
          $('.load-NumberofStudents').html(data);
        } // success  
    }); // ajax submit  
  }

function CountAllTakers()
  {
    var CountAllTakers = "CountAllTakers";
    $.ajax({
        url : "controllers/CountAll.php",
        method: "POST",
        data : {CountAllTakers:CountAllTakers},
        success:function(data) {
          $('.load-NumberofTakers').html(data);
        } // success  
    }); // ajax submit  
  }

function removeUser(id = null) {
	if(id) {
		/*USE THIS LINE OF CODE FOR TESTING PURPOSE ONLY
		console.log("ID is readable");*/

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-md btn-danger',
				cancelButton: 'btn btn-secondary mr-3'
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
	        reverseButtons: true
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
	                  'danger'
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