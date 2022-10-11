<?php

include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
?>
      <!----- MAIN CONTENT ----->

<style type="text/css">
    body {
  background: #0c1514;
  color: #fff;
}
h1 {
  color: #63c5bc;
}
.faded {
  color: #777;
}
#quiz-counter {
  color: #88449a;
}
.quiz-container {
    padding: 0.25em;
    max-width: 650px;
    margin: 1em auto;
}

.quiz-container a {
    text-decoration: none;
    color: #333;
}

#quiz-header,
#quiz-start-screen,
#quiz-results-screen,
#quiz-counter {
    text-align: center;
}

.question {
    font-size: 1.25em;
}

.answers {
    list-style: none;
    padding: 0;
}

.answers a {
    display: block;
    padding: 0.5em 1em;
    margin-bottom: 0.5em;
    background: #fff;
}

.answers a.correct {
    background: #090;
}
.answers a.incorrect {
    background: #c00;
}

.answers a.correct,
.answers a.incorrect {
    color: #fff;
}

#quiz-controls {
    background: #63c5bc;
    color: #111;
    padding: 0.25em 0.5em 0.5em;
    text-align: center;
}

#quiz-response {}
#quiz-results {
    font-size: 1.25em;
}

#quiz-buttons a,
.quiz-container .quiz-button {
    display: inline-block;
    padding: 0.5em 1em;
    background: #88449a;
    color: #fff;
}
#quiz-buttons a {
    background: #fff;
    color: #333;
}

/* Quiz State Overrides */

.quiz-results-state #quiz-controls {
    background: none;
    padding: 0;
}
.quiz-results-state #quiz-buttons a {
    background: #88449a;
    color: #fff;
}
</style>

      <div class="main-content">

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-3">
            <div class="card col">
              <div class="card-body">
                <div class="icon icon-warning">
                  <span class="material-icons" style="font-size: 40px;">cottage</span>
                </div>
                <h5 class="card-title">Welcome, User</h5>
                <h6 class="card-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a dui felis.</h6>
              </div>
            </div>
          </section>
          <section class="col-lg-12">
            <div class="card col" style="min-height: 485;">
              <div class="card-header card-header-text">
                <h4 class="card-title">activities</h4>
              </div>
              <div class="card-content">
                  <div id="quiz">
                    <div id="quiz-header">
                      <h1>jQuery Quiz Plugin</h1>
                      <p class="faded">A quiz about the plugin built by the plugin.</p>
                    </div>
                    <div id="quiz-start-screen">
                      <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>

        <button type="button" class="btn btn-outline-primary floating-timer">Primary</button>

        <style type="text/css">
          .floating-timer { position: fixed; top: 100px; right: 20px; }
        </style>
<?php

include 'includes/footer.php';
?>


<?php

include 'includes/scripts.php';
?>
<script src="../toggle_password/bootstrap-show-password.js"></script>
<script src="jquery.quiz-min.js"></script>
<script type="text/javascript">
  $('#quiz').quiz({
  resultsScreen: '#results-screen',
  counter: true,
  homeButton: '#custom-home',
  counterFormat: 'Question %current of %total',
  questions: [
    {
      'q': 'Is jQuery required for this plugin?',
      'options': [
        'Yes',
        'No'
      ],
      'correctIndex': 0,
      'correctResponse': 'Good job, that was obvious.',
      'incorrectResponse': 'Well, if you don\'t include it, your quiz won\'t work'
    },
    {
      'q': 'How do you use it?',
      'options': [
        'Include jQuery, that\'s it!',
        'Include jQuery and the plugin javascript.',
        'Include jQuery, the plugin javascript, the optional plugin css, required markup, and the javascript configuration.'
      ],
      'correctIndex': 2,
      'correctResponse': 'Correct! Sounds more complicated than it really is.',
      'incorrectResponse': 'Come on, it\'s not that easy!'
    },
    {
      'q': 'The plugin can be configured to require a perfect score.',
      'options': [
        'True',
        'False'
      ],
      'correctIndex': 0,
      'correctResponse': 'You\'re a genius! You just set allowIncorrect to true.',
      'incorrectResponse': 'Why you have no faith!? Just set allowIncorrect to true.'
    },
    {
      'q': 'How do you specify the questions and answers?',
      'options': [
        'MySQL database',
        'In the HTML',
        'In the javascript configuration'
      ],
      'correctIndex': 2,
      'correctResponse': 'Correct! Refer to the documentation for the structure.',
      'incorrectResponse': 'Wrong! Do it in the javascript configuration. You might need to read the documentation.'
    }
  ]
});
</script>
<script type="text/javascript">
var userTable;
$(document).ready(function() {
  $('#btn_generatePass').click(function (){
    $('#accountPassword').val(makeid(8));
  });

  // SET OF COLOR CLASSES FOR ACTIVITIES TIMELINE
  var classes        = new Array ('sl-primary', 'sl-danger', 'sl-success', 'sl-warning', '');
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
      "orderable": false, "targets": [4]
    }],
    "ajax": "",
    "lengthMenu": [ [10, 25, 50, 100, 200, 300, 400, 500], [10, 25, 50, 100, 200, 300, 400, 500] ],
    "language": {
      "emptyTable": "No user records found!"
    }
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
            url: '',
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
</script>
</body>
</html>