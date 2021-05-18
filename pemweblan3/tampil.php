<html>

<head>
    <title>Tabel Hasil Register</title>
    <link rel='stylesheet' type='text/css' href='style.css' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-datepicker.min.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="bootstrap-validate.js"></script>
</head>

<body>

<?php
require('Form.php');
$cetak=new Form('','');
$cetak->cetakForm();
?>

</body>
</head>
</html>