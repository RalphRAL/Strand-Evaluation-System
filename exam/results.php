<?php
session_start();
//error_reporting(0);
// Include the main TCPDF library (search for installation path).
require_once '../database/db_config.php';
require_once('../TCPDF-main/tcpdf.php');

//STUDENT ID
$student_id = $_SESSION['student_id'];
// QUESTIONS TABLE AND EXAM TABLE IS JOINED
$examData = "SELECT * FROM questions 
            INNER JOIN exam_table
            ON questions.exam_id_fk = exam_table.exam_id
            WHERE exam_status = '1' 
            ORDER BY questions.question_id";
$eD_query = $connection->query($examData);
$numberofQuestions = $eD_query->num_rows; // GET NUMBER OF QUESTIONS PER EXAM
$show_examData = $eD_query->fetch_assoc();
$exam_id = $show_examData['exam_id'];// WE GET THE ID, SO WE CAN USE IT

$result = $connection->query("SELECT * FROM questions q INNER JOIN results r ON q.question_id = r.question_id_fk AND q.question_answer = r.result_answer WHERE r.exam_id_fk='$exam_id' AND r.student_id_fk = '$student_id'");
//EMPTY STRINGS DATE,SCORE AND STRAND RECOMMENDATION THIS WILL DISPLAY IF STUDENT GOT ZERO IN EXAM
$formatted_date = '';
$result_score = '';
$strand_reco = '';

$resultRow = $result->fetch_assoc();
if($count_correctAnswer = $result->num_rows < 1){
    //RESULT DATE
    $getDate = $connection->query("SELECT result_date FROM results WHERE student_id_fk = '$student_id'");
    $row_getDate = $getDate->fetch_assoc();
    $formatted_date =  date('F d, Y', strtotime($row_getDate['result_date']));
} else {
    $formatted_date =  date('F d, Y', strtotime($resultRow['result_date']));
}
//GET DATA FROM ABOVE $result
//SCORE CALCULATIONS
$score = $result->num_rows;
$ans = $score / $numberofQuestions * 100; // SCORE DIVIDE TOTAL NUMBER OF QUESTIONS THEN MULTIPLY TO 100 TO GET THE PERCENTAGE

//GET STUDENT DATA BASED ON CURRENT LOGGED ON STUDENT USER
$studentData = $connection->query("SELECT * FROM students WHERE student_id = '$student_id'");
$row = $studentData->fetch_assoc();
//STUDENT DETAILS
$fullname = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
$email_address = $row['email_address'];

//WE DO A CONDITION TO DISPLAY SCORE AND STRAND RECOMMENDATION BASE ON PERCENTAGE VALUE
if($ans >= 70){
    $result_score = number_format($ans,2).'%';
    $strand_reco = 'STEM/ABM';
}else if($ans < 70 && $ans != 0){
    $result_score = number_format($ans,2).'%';
    $strand_reco = 'HUMMS/TVL/ICT/HE/GAS';
}else {
    $result_score = '0%';
    $strand_reco = 'No Strand Recommendation';
}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = '../images/chslogo.jpg';
        $this->Image($image_file, 50, 10, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Ln(5);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(189, 3, 'Caloocan High School', 0, 1, 'C');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(189, 3, '10th Avenue, West Grace Park', 0 , 1, 'C');
        $this->Cell(189, 3, '1400 Caloocan, Philippines', 0 , 1, 'C');
        $this->Cell(189, 3, 'Phone: (02)361-0860', 0 , 1, 'C');
        $this->Cell(189, 3, 'Email: calhiseniorhs@gmail.com', 0 , 1, 'C');
        $this->SetFont('helvetica', 'B', 14);
        $this->Ln(5);
        $this->Cell(189, 20, 'Strand Evaluation Examination', 0 , 1, 'C');

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

/** set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');**/

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

$pdf->Ln(40);

// set some text to print
$txt = <<<EOD
TCPDF Example 003

Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->Cell(130 , 5, 'Name: ' .$fullname, 0, 0);
$pdf->Cell(59 , 5, 'Date: '.$formatted_date, 0, 1);
$pdf->Ln(5);
$pdf->Cell(130 , 5, 'E-mail Address: '.$email_address, 0, 0);
$pdf->Ln(30);
$pdf->SetFont('helvetica', '', 14);
$pdf->Cell(189, 5, 'Result Score', 0 , 1, 'C');
$pdf->SetFont('helvetica', 'B', 30);
$pdf->Cell(189, 5, $result_score, 0 , 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('helvetica', '', 14);
$pdf->Cell(189, 5, 'Strand Recommendation', 0 , 1, 'C');
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(189, 5, 'can be any of the following:', 0 , 1, 'C');
$pdf->SetFont('helvetica', 'B', 25);
$pdf->Cell(189, 5, $strand_reco, 0 , 1, 'C');

// set alpha to semi-transparency
$pdf->SetAlpha(0.3);
//$pdf->Image('../images/pass.jpg', 59, 85, 100, '', '', '', '', true, 72);
$pdf->SetAlpha(0.1);
$pdf->Image('../images/chslogo-grayscale.jpg', 59, 85, 100, '', '', '', '', true, 72);

// ---------------------------------------------------------
$pdf->SetAlpha(1);
//Close and output PDF document
$pdf->Output('chs-examresult.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
