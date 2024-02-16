<?php

 include("function.php");


session_start();
 $_SESSION['name'];
  $name = $_POST['coursename'];
  $info = $_POST['courseinfo'];
  $cost = $_POST['cost'];
  $min = 1000;
  $max = 4500;
  $invoiceNum = random_int($min,$max);
  /*
<head>
<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  
</head>

<script>
    
</script>

<body>
    <style>
        .container { 
            padding:100px;
        }
    </style>
    <div class="container">
        <p>Hello there, you have successfully placed an order for <?php echo '<bold>' . $name . '</bold>'?> and total amount to be paid is <?php echo '<bold>' . $cost . '</bold>'?>. <br> Please contact +263077777777777777 (Mr Mphamba) to make this payment  or use our EcocashUSD and send the verification to <b>info@cohs.education</b>, once that is done the course will be activated in your account</p>
        <br><br><br><br>
        <p>Invoice <b>No:</b> <?php echo $invoiceNum?></p>
        <br><br>
        <div class="buttons">
         <button class="btn btn-primary">
            Download As pdf
        </button>
        <div class="gap"></div>
        <button class="btn btn-primary">
            Go back to Dashboard
        </button>   
        </div>
        
        <style>
            .gap { 
                width:10px;
            }
            .buttons { 
                display:flex;
            }
        </style>
    </div>

</body>*/
?>
<?php
require('./fpdf/fpdf.php');
$_SESSION['name'];
$name = $_POST['coursename'];
$info = $_POST['courseinfo'];
$cost = $_POST['cost'];
$min = 1000;
$max = 4500;
$invoiceNum = random_int($min,$max);
$address = "TIN:0200310100 7140 NHARE STREET";

class PDF extends FPDF
{
// Page header
function Header()
{
    $min = 1000;
    $max = 4500;
    $invoiceNum = random_int($min,$max);
    // Logo
    $this->Image('./assets/logo.png',10,10,80);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Move to the right
    $this->Cell(40);
    $this->Cell(40);
    $this->Ln(20);
    $this->Cell(190,20, 'TIN:0200310100 7140',0,0,'L');
    $this->Cell(10);
    $this->Ln(6);
    $this->Cell(190,1, 'NHARE STREET,',0,2,'L');
    $this->Ln(6);
    $this->Cell(190,1, 'TARGET KOPJE, MASVINGO',0,0,'L');
    $this->Ln(4);
    $this->Cell(190,1, 'CELL:+263779984769',0,0,'L');    
    $this->Ln(4);
    $this->Cell(190,1, 'www.cohs.education',0,0,'L');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    $this->SetY(-60);
    $this->Cell(10);
    $this->Ln(6);
    $this->Cell(190,1, 'Payment Details,',0,0,'L');
    $this->Ln(4);
    $this->Cell(190,1, 'TARGET KOPJE, MASVINGO',0,0,'L');
    $this->Ln(4);
    $this->Cell(190,1, 'CELL:+263779984769',0,0,'L');    
    $this->Ln(4);
    $this->Cell(190,1, 'www.cohs.education',0,0,'L');
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $name);
$pdf->Cell(-50,10, $info ,500,0,'R');
$pdf->Cell(0,10, '$'.$cost,10,10,'R');
$pdf->Output();
?>