<?php
    function GenerateInvoiceNumber(){
        $min = 1000;
        $max = 4500;
        $invoiceNum = random_int($min,$max);
    }
?>