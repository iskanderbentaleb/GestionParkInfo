<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="../images/logo.svg">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>




    <!-- <link rel="stylesheet" href="./src/output.css"> -->

    
    <title><?= $title_page ?></title>
</head>
<body class="min-h-screen bg-gray-200" 

>

<?php 
// session_start();
require "includes/navbar.php";
?>

<?php
require "includes/alert.php";
?>


<?= $contant ?>




<script src="js/scriptalpine.js"></script>


</body>
</html>

