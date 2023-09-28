<?php
// Assuming the user-side page is in a different directory
require('./admin/products.php');
?>
<?php include('./admin/db_connect.php');?>

<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
    <link rel="stylesheet"  href="./admin/assets/css/style.css">
    <link rel="stylesheet"  href="./css/style.css">
    <link rel="stylesheet"  href="./admin/assets/DataTables/datatables.css">
    <link rel="stylesheet"  href="./admin/assets/DataTables/datatables.min.css">
</head>
<body>

    <?php require('./admin/manage_product.php'); ?>

    <!-- Include the home.php page -->
   

    <!-- Rest of your HTML content -->

    <!-- Include the cool.js JavaScript file -->
    <script src="./admin/assets/js/jquery.datetimepicker.full.min.js"></script>
     <script src="./admin/assets/js/jquery-te-1.4.0.min.js"></script>
    <script src="./js/scripts.js"></script>
    <script src="./admin/assets/js/select2.min.js"></script>
    <script src="./admin/assets/js/DataTables/datatables.js"></script>
    <script src="./admin/assets/js/DataTables/datatables.min.js"></script>
</body>
</html>
