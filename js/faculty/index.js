$(document).ready(function() {

	CountAllExams();
	CountAllStudents();
	CountAllTakers();
	ExamTakersTable();

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

});//END OF DOCUMENT READY

function ExamTakersTable()
{
  var ExamTakersTable = "ExamTakersTable";

  $.ajax({
      url : "controllers/exam_takers_table.php",
      method: "POST",
      data : {ExamTakersTable:ExamTakersTable},
      success:function(data) {
        $('.load-examTakersTable').html(data);
      } // success  
  }); // ajax submit    
}

function CountAllExams()
{
  var CountAllExams = "CountAllExams";
  $.ajax({
      url : "../admin/controllers/CountAll.php",
      method: "POST",
      data : {CountAllExams:CountAllExams},
      success:function(data) {
        $('.load-NumberofExams').html(data);
      } // success  
  }); // ajax submit  
}

function CountAllStudents()
{
  var CountAllStudents = "CountAllStudents";
  $.ajax({
      url : "../admin/controllers/CountAll.php",
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
      url : "../admin/controllers/CountAll.php",
      method: "POST",
      data : {CountAllTakers:CountAllTakers},
      success:function(data) {
        $('.load-NumberofTakers').html(data);
      } // success  
  }); // ajax submit  
}