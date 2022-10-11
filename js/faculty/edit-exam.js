$(document).ready(function() {

fetchQuestions();
retrieveQuestion();
retrieveExamDetails();

/**ADD QUESTIONS FORM WITH VALIDATION**/
$('#addQuestionForm').validate({
    rules: {
      question: {
        required: true
      },
      question_choice_A: {
        required: true
      },
      question_choice_B: {
        required: true
      },
      question_choice_C: {
        required: true
      },
      question_choice_D: {
        required: true
      },
      question_correct_Answer: {
        required: true,
      },
    },
    messages: {
      question: {
        required: "Please enter your question."
      },
      question_choice_A: {
        required: "Please enter answer for choice A"
      },
      question_choice_B: {
        required: "Please enter answer for choice B"
      },
      question_choice_C: {
        required: "Please enter answer for choice C"
      },
      question_choice_D: {
        required: "Please enter answer for choice D"
      },
      question_correct_Answer: {
        required: "Please enter correct answer"
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
      var question = $("#question").val();
      var question_choice_A = $("#question_choice_A").val();
      var question_choice_B = $("#question_choice_B").val();
      var question_choice_C = $("#question_choice_C").val();
      var question_choice_D = $("#question_choice_D").val();
      var question_correct_Answer = $("#question_correct_Answer").val();

      if(question && question_choice_A && question_choice_B && question_choice_C && question_choice_D && question_correct_Answer) {
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
                    fetchQuestions();// WILL AUTOMATIC REFRESH ONCE A DATA IS ADDED
                    $("#addQuestionForm")[0].reset()// WILL RESET THE FORM

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
});/**END OF ADD QUESTIONS FORM WITH VALIDATION**/


});// END OF DOCUMENT READY

document.onkeydown=function(event){
	if (event.keyCode==116) {
		event.preventDefault();
	}
}

function fetchQuestions()
{
  var fetchQuestions = "fetchQuestions";
  var exam_id = $('#showID').val();

  $.ajax({
      url : "../admin/controllers/fetchQuestions.php",
      method: "POST",
      data : {fetchQuestions:fetchQuestions, exam_id:exam_id},
      success:function(data) {
        $('.load-questions').html(data);
      } // success  
  }); // ajax submit    
}

function retrieveQuestion(id){

	if(id){
		//console.log(id); Activate this to test if id is being fetched

		$.ajax({
      url: '../admin/controllers/retrieveQuestion.php',
      type: 'POST',
      data: {question_id : id},
      dataType: 'json',
      success:function(response) {
        //EDIT PROFILE TAB
        $("#question_id").val(response.question_id);
        $("#update_question").html(response.question);
        $("#update_question_choice_A").val(response.question_choice1);
        $("#update_question_choice_B").val(response.question_choice2);
        $("#update_question_choice_C").val(response.question_choice3);
        $("#update_question_choice_D").val(response.question_choice4);
        $("#update_question_correct_Answer").val(response.question_answer);


        /**UPDATE QUESTIONS FORM WITH VALIDATION**/
				$('#updateQuestionForm').validate({
				    rules: {
				      update_question: {
				        required: true
				      },
				      update_question_choice_A: {
				        required: true
				      },
				      update_question_choice_B: {
				        required: true
				      },
				      update_question_choice_C: {
				        required: true
				      },
				      update_question_choice_D: {
				        required: true
				      },
				      update_question_correct_Answer: {
				        required: true,
				      },
				    },
				    messages: {
				      update_question: {
				        required: "Please enter your question."
				      },
				      update_question_choice_A: {
				        required: "Please enter answer for choice A"
				      },
				      update_question_choice_B: {
				        required: "Please enter answer for choice B"
				      },
				      update_question_choice_C: {
				        required: "Please enter answer for choice C"
				      },
				      update_question_choice_D: {
				        required: "Please enter answer for choice D"
				      },
				      update_question_correct_Answer: {
				        required: "Please enter correct answer"
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
				      var update_question = $("#update_question").val();
				      var update_question_choice_A = $("#update_question_choice_A").val();
				      var update_question_choice_B = $("#update_question_choice_B").val();
				      var update_question_choice_C = $("#update_question_choice_C").val();
				      var update_question_choice_D = $("#update_question_choice_D").val();
				      var update_question_correct_Answer = $("#update_question_correct_Answer").val();

				      if(update_question && update_question_choice_A && update_question_choice_B && update_question_choice_C && update_question_choice_D && update_question_correct_Answer) {
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
				                    fetchQuestions();// WILL AUTOMATIC REFRESH ONCE A DATA IS UPDATED
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
				});/**END OF UPDATE QUESTIONS FORM WITH VALIDATION**/


      }//END OF success
    });//END OF ajax
	}
}

function retrieveExamDetails(id = $('#showID').val()) {
	if (id) {
		//console.log(id);//Activate this to test if id is being fetched

		$.ajax({
      url: '../admin/controllers/retrieveExamDetails.php',
      type: 'POST',
      data: {exam_id : id},
      dataType: 'json',
      success:function(response) {
        //EDIT PROFILE TAB
        $("#exam_id").val(response.exam_id);
        $("#update_examTitle").val(response.exam_title);
        $("#update_examTimeLimit").val(response.exam_time_limit);
        $("#update_examDescription").html(response.exam_description);


        /**UPDATE EXAM DETAILS FORM WITH VALIDATION**/
				$('#updateExamDetailsForm').validate({
				    rules: {
				      update_examTitle: {
				        required: true
				      },
				      update_examTimeLimit: {
				        required: true
				      },
				      update_examDescription: {
				        required: false
				      },
				    },
				    messages: {
				      update_examTitle: {
				        required: "Please provide exam title."
				      },
				      update_examTimeLimit: {
				        required: "Please select a time limit."
				      },
				      update_examDescription: {
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
				      var update_examTitle = $("#update_examTitle").val();
				      var update_examTimeLimit = $("#update_examTimeLimit").val();
				      var update_examDescription = $("#update_examDescription").val();

				      if(update_examTitle && update_examTimeLimit && update_examDescription) {
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
				                    retrieveExamDetails();// WILL AUTOMATIC REFRESH ONCE A DATA IS UPDATED
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


      }//END OF success
    });//END OF ajax
	}
}

function removeQuestion(id = null) {
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
	        text: "Do you want to remove this question?",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonText: 'Yes, remove it!',
	        cancelButtonText: 'No, cancel!',
	        reverseButtons: true
	    }).then((result) => {
	        if (result.isConfirmed) {
	        $.ajax({        
	          url: '../admin/controllers/removeQuestion.php',
	          type: 'post',
	          data: {question_id : id},
	          dataType: 'json',
	          success:function(response) {
	            if(response.success == true) {
	              swalWithBootstrapButtons.fire(
	                  'Removed!',
	                  response.messages,
	                  'success'
	                );
	              // refresh the table
	              fetchQuestions();
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
	            'You cancelled deleting a question',
	            'error'
	          );
	        }
	      });//END OF THEN
	} else {
		alert('Error: Refresh the page again');
	}
}