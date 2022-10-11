var studentTable;
$(document).ready(function() {

$('#btn_generatePass').click(function (){
	$('#stud_pass').val(makeid(8));
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

studentTable = $('#studentTable').DataTable({
	columnDefs: [{
		"orderable": false, "targets": [2,6]
	}],
	"ajax": "controllers/studentTable.php",
	"lengthMenu": [ [10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500] ],
	"language": {
		"emptyTable": "No student records found!"
	}
});

$('a.toggle-vis').on('click', function (e) {
	e.preventDefault();

	// Get the column API object
	var column = studentTable.column($(this).attr('data-column'));

	// Toggle the visibility
	column.visible(!column.visible());
});


$('#bt_refresh').on('click', function () {
	studentTable.ajax.reload(null, false);
});

/**ADD USER FORM WITH VALIDATION**/
$('#addStudentForm').validate({
    rules: {
      stud_fn: {
        required: true
      },
      stud_mn: {
        required: true
      },
      stud_ln: {
        required: true
      },
      stud_mobileNum: {
        required: true,
        number: true,
        maxlength: 11,
        minlength: 11
      },
      stud_emailAdd: {
        required: true,
        email: true
      },
      stud_pass: {
        required: true,
        minlength: 8
      },
    },
    messages: {
      stud_fn: {
        required: "Please provide First name"
      },
      stud_mn: {
        required: "Please provide Middle name"
      },
      stud_ln: {
        required: "Please provide Last name"
      },
      stud_mobileNum: {
        required: "Please provide Mobile number",
        maxlength: "Should be 11 digits",
    	minlength: "Should be 11 digits"
      },
      stud_emailAdd: {
        required: "Please provide E-mail address",
        email: "Please provide valid E-mail address"
      },
      stud_pass: {
        required: "Please provide a password",
        minlength: "Password should be atleast 8 characters"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.col-sm-8').append(error);
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
      var stud_fn = $("#stud_fn").val();
      var stud_mn = $("#stud_mn").val();
      var stud_ln = $("#stud_ln").val();
      var stud_mobileNum = $("#stud_mobileNum").val();
      var stud_emailAdd = $("#stud_emailAdd").val();
      var stud_pass = $("#stud_pass").val();

      if(stud_fn && stud_mn && stud_ln && stud_mobileNum && stud_emailAdd && stud_pass) {
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
                    studentTable.ajax.reload(null, false);
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

function removeStudent(id = null) {
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
        text: "Do you want to remove this student?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, remove it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({        
          url: 'controllers/removeStudent.php',
          type: 'post',
          data: {student_id : id},
          dataType: 'json',
          success:function(response) {
            if(response.success == true) {
              swalWithBootstrapButtons.fire(
                  'Removed!',
                  response.messages,
                  'success'
                );
              // refresh the table
              studentTable.ajax.reload(null, false);
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
            'You cancelled deleting a student',
            'error'
          );
        }
      });//END OF THEN
} else {
	alert('Error: Refresh the page again');
}
}