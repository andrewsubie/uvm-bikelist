<?php
    $phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
    $pathParts = pathinfo($phpSelf);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BikeList</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Andrew Subach, John Lackey">
        <link rel = "stylesheet" type = "text/css" href="css/custom.css?version=<?php print time(); ?>">
        <link rel = "stylesheet" type="text/css" href = "css/layout-desktop.css?version=<?php print time(); ?>">
        <link rel = "stylesheet" type="text/css" media = "(max-width: 820px)" href = "css/layout-tablet.css?version=<?php print time(); ?>">
        <link rel = "stylesheet" type="text/css" media = "(max-width: 430px)" href = "css/layout-phone.css?version=<?php print time(); ?>">
        <meta name="description" content="A website for Vermonter's to list and exchange bikes">
        <!--Head with meta elements and title-->
    </head>
    <body>
        <?php
            include 'database-connect.php';
            include 'nav.php';
            include 'header.php';
        ?>
        <main>
<?php
/**
print '<body class ="' .$pathParts['filename'] .'">';
include 'database-connect.php';
include 'header.php';
include 'nav.php';*/
?>