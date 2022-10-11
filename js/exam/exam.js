$(document).ready(function() {

	/**$('#submitAnswerFrmBtn').click(function(){
		//var sample = $("#choiceAnswer");
		console.log(document.querySelector('input[name="choiceAnswer"]:checked').value);

		 const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-success',
			    cancelButton: 'btn btn-danger'
			  },
			  buttonsStyling: false
			});

		 swalWithBootstrapButtons.fire({
	        title: 'Success',
	        text: "Good job you've finished the examination",
	        icon: 'success',
	        confirmButtonText: 'Go see results',
	    });
	});**/

	/**ADD USER FORM WITH VALIDATION
	$('#ExamForm').validate({
	    rules: {
	      choiceAnswer: {
	        required: false
	      }
	    },
	    messages: {
	      choiceAnswer: {
	        required: "Please provide Last name"
	      }
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.col-md-4').append(error);
	      element.closest('.form-check').append(error);
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
	      var choiceAnswer = $("#choiceAnswer").val();

	      if(choiceAnswer) {
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
		                        allowOutsideClick: false,
		                        text: response.messages,
		                        icon: 'success',
		                        confirmButtonText: 'Okay',
		                    });
		                    //userTable.ajax.reload(null, false);
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
	});**/

	document.onkeydown=function(event){
	if (event.keyCode==116) {
			event.preventDefault();
		}
	}

});//END OF DOCUMENT READY

/**EXAMINATION TIMER 2
function startTimer(duration, display) {
  let timer = duration;
  const interval = setInterval(function() {
    let minutes = parseInt(timer / 60, 10)
    let seconds = parseInt(timer % 60, 10);
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    display.innerText = "Remaining Time:" + " "+ minutes + ":" + seconds;
    if (timer !== 0) {
      --timer;
    } else if (timer == 0) {
      $('#examAction').val("autoSubmit");

			if(examAction != ''){
				Swal.fire({
					title: 'Time Out',
					text: 'Your time is over, Please click OK',
					icon: 'warning',
					showCancelButton: false,
					allowOutsideClick: false,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'OK'
				}).then((result) => {
					if(result.value){
						/**$.post('controllers/checkAnswers.php', $(this).serialize(), function(data) {
							
						},'json');
						alert("working");
					}
				});
			}
      clearInterval(interval);
    }
  }, 1000);
}

window.onload = function() {
  var seconds = 1,
    display = document.querySelector('.timer-show');
  	startTimer(seconds, display);
};**/

$(document).on('submit', '#ExamForm', function(){

	var examAction = $('#examAction').val();

	if(examAction != ''){

		const swalWithBootstrapButtons = Swal.mixin({
		  customClass: {
		    confirmButton: 'btn btn-success mr-1',
		    cancelButton: 'btn btn-danger ml-1'
		  },
		  buttonsStyling: false
		});

		swalWithBootstrapButtons.fire({
			title: 'Time Out',
			text: 'Your time is over, Please click OK',
			icon: 'warning',
			showCancelButton: false,
			allowOutsideClick: false,
			confirmButtonText: 'OK'
		}).then((result) => {
			if(result.value){
				$.post('controllers/submitAnswers.php', $(this).serialize(), function(data) {

				const swalWithBootstrapButtons = Swal.mixin({
				  customClass: {
				    confirmButton: 'btn btn-success mr-1',
				    cancelButton: 'btn btn-danger ml-1'
				  },
				  buttonsStyling: false
				});

				if(data.success == true) {
        		swalWithBootstrapButtons.fire({
                title: 'Success',
                allowOutsideClick: false,
                text: data.messages,
                icon: 'success',
                confirmButtonText: 'Okay',
            });
            window.location.href = 'results.php';
        } else {
        		swalWithBootstrapButtons.fire({
                title: 'Error',
                text: data.messages,
                icon: 'error',
                confirmButtonText: 'Okay',
            });
        } 
					
				},'json');
			}
		});
	} else{

		const swalWithBootstrapButtons = Swal.mixin({
		  customClass: {
		    confirmButton: 'btn btn-success mr-1',
		    cancelButton: 'btn btn-danger ml-1'
		  },
		  buttonsStyling: false
		});

		swalWithBootstrapButtons.fire({
			title: 'Are you sure?',
			text: 'Do you want to submit your answer now?',
			icon: 'warning',
			showCancelButton: true,
			allowOutsideClick: false,
			confirmButtonText: 'Yes, Submit it.',
			cancelButtonText: 'No, cancel!',
		}).then((result) => {
			if(result.value){
				$.post('controllers/submitAnswers.php', $(this).serialize(), function(data) {

				const swalWithBootstrapButtons = Swal.mixin({
				  customClass: {
				    confirmButton: 'btn btn-success mr-1',
				    cancelButton: 'btn btn-danger ml-1'
				  },
				  buttonsStyling: false
				});

				if(data.success == true) {
        		swalWithBootstrapButtons.fire({
                title: 'Success',
                allowOutsideClick: false,
                text: data.messages,
                icon: 'success',
                confirmButtonText: 'Okay',
            });
            window.location.href = 'results.php';
        } else {
        		swalWithBootstrapButtons.fire({
                title: 'Error',
                text: data.messages,
                icon: 'error',
                confirmButtonText: 'Okay',
            });
        } 
					
				},'json');
			}
		});
	}

return false;
});

// EXAMINATION TIMER 1
/**
var mins
var secs;

function cd() {
  var timeExamLimit = $('#timeExamLimit').val();
  mins = 1 * m("" + timeExamLimit); // change minutes here
  secs = 0 + s(":01"); 
  redo();
}

function m(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(0, i));
}

function s(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
  var disp;
  if(mins <= 9) {
      disp = " 0";
  } else {
      disp = " ";
  }
  disp += mins + ":";
  if(secs <= 9) {
      disp += "0" + secs;
  } else {
      disp += secs;
  }
  return(disp);
}

function redo() {
  secs--;
  if(secs == -1) {
      secs = 59;
      mins--;
  }
  document.cd.disp.value = dis(mins,secs); 
  if((mins == 0) && (secs == 0)) {
    $('#examAction').val("autoSubmit");
    $('#ExamForm').submit();
  } else {
    cd = setTimeout("redo()",1000);
  }
}

function init() {
  cd();
  //THIS WILL DISABLE GOING BACK TO PREVIOUS PAGE
  window.history.pushState(null, "", window.location.href);
	window.onpopstate = function () {
	    window.history.pushState(null, "", window.location.href);
	};
}
window.onload = init;**/

//EXAMINATION TIMER 2
localStorage.clear(); //ACTIVATE THIS IF YOU WANT TO CLEAR THE STORAGE AND REDO THE TIMER ON PAGE REFRESH
window.onload = function() {

    if(typeof localStorage.getItem("min") !== 'undefined' && typeof localStorage.getItem("sec") !== 'undefined' && localStorage.getItem("min")!= null && localStorage.getItem("sec")!= null ){
        var min = localStorage.getItem("min");
        var sec = localStorage.getItem("sec");
    }
    else {
       console.log("c2");
       var min = "0"+$('#exam_time_limit').val();
       var sec = "0"+0;
    }
    var time;

    setInterval(function()
    {

        localStorage.setItem("min", min);
        localStorage.setItem("sec", sec);
        time="Remaining Time: "+ min +" : "+ sec;
        document.getElementById("demo").innerHTML = time ;
        if(sec == 00)
        {
            if(min !=0)
            {
                min--;
                sec=59;
                if(min < 10)
                {
                    min="0"+min;
                }
            }
        }
        else
        {
            sec--;
            if(sec < 10)
            {
                sec="0"+sec;

                //ONCE THE TIMER HIT ZERO, THE EXAM WILL AUTOMATICALLY SUBMIT ITSELF.
                if((sec == 00) && (min == 00)) {
							    $('#examAction').val("autoSubmit");
							    $('#ExamForm').submit();
							    //window.location.href = 'index.php';
							    localStorage.clear();
							  }
            }
        }
    },1000);
}