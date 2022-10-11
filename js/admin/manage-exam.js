var examTable;
$(document).ready(function() {

examTable = $('#examTable').DataTable({
	columnDefs: [{
		"orderable": false, "targets": [4]
	}],
	"ajax": "controllers/examTable.php",
	"lengthMenu": [ [10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500] ],
	"language": {
		"emptyTable": "No exam records found!"
	}
});

$('a.toggle-vis').on('click', function (e) {
  e.preventDefault();

  // Get the column API object
  var column = examTable.column($(this).attr('data-column'));

  // Toggle the visibility
  column.visible(!column.visible());
});

$('#bt_refresh').on('click', function () {
	examTable.ajax.reload(null, false);
});

/**ADD USER FORM WITH VALIDATION**/
$('#addExamForm').validate({
    rules: {
      examTitle: {
        required: true
      },
      examTimeLimit: {
        required: true,
      },
      examDescription: {
        required: false,
      },
    },
    messages: {
      examTitle: {
        required: "Please provide exam title."
      },
      examTimeLimit: {
        required: "Please select a time limit."
      },
      examDescription: {
        required: "Please provide a description."
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
      var examTitle = $("#examTitle").val();
      var examTimeLimit = $("#examTimeLimit").val();
      var examDescription = $("#examDescription").val();

      if(examTitle && examTimeLimit && examDescription) {
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
	                    examTable.ajax.reload(null, false);
                  } else {
                  		swalWithBootstrapButtons.fire({
	                        title: 'Oops..',
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

function toggle_examStatus(id = null) {
	if(id) {
		/*USE THIS LINE OF CODE FOR TESTING PURPOSE ONLY
		console.log("ID is readable");*/

		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-md btn-primary',
				cancelButton: 'btn btn-secondary ml-3'
			},
			buttonsStyling: false
		});

		swalWithBootstrapButtons.fire({
	        title: 'Activate exam?',
	        text: "This will make the current selection Active",
	        icon: 'info',
	        showCancelButton: true,
	        confirmButtonText: 'Yes, activate it!',
	        cancelButtonText: 'No, cancel!',
	        reverseButtons: false
	    }).then((result) => {
	        if (result.isConfirmed) {
		        $.ajax({        
		          url: 'controllers/toggle_examStatus.php',
		          type: 'post',
		          data: {exam_id : id},
		          dataType: 'json',
		          success:function(response) {
		            if(response.success == true) {
		            	Swal.fire({
									  position: 'top-end',
									  icon: 'success',
									  title: response.messages,
									  showConfirmButton: false,
									  timer: 1500
									});
		              // refresh the table
		              examTable.ajax.reload(null, false);
		            }else {
		              swalWithBootstrapButtons.fire(
	                  'Oops..',
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
		            'You cancelled your action',
		            'error'
		          );
		          // refresh the table
		          examTable.ajax.reload(null, false);
	        	}
	      });//END OF THEN
	} else {
		alert('Error: Refresh the page again');
	}
}

function removeExam(id = null) {
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
	        text: "Do you want to remove this exam?",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonText: 'Yes, remove it!',
	        cancelButtonText: 'No, cancel!',
	        reverseButtons: false
	    }).then((result) => {
	        if (result.isConfirmed) {
		        $.ajax({        
		          url: 'controllers/removeExam.php',
		          type: 'post',
		          data: {exam_id : id},
		          dataType: 'json',
		          success:function(response) {
		            if(response.success == true) {
		              swalWithBootstrapButtons.fire(
		                  'Removed!',
		                  response.messages,
		                  'success'
		                );
		              // refresh the table
		              examTable.ajax.reload(null, false);
		            } else {
		              swalWithBootstrapButtons.fire(
		                  'Oops..',
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
		            'You cancelled deleting an exam',
		            'error'
		          );
	        	}
	      });//END OF THEN
	} else {
		alert('Error: Refresh the page again');
	}
}