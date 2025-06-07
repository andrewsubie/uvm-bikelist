<!-- connecting -->
<?php # need to fill in
define('DATABASE_NAME', 'ASUBACH_JLACKEY_cs2480_final');
include 'DataBase.php';
$thisDataBaseReader = new DataBase('asubach_reader',
DATABASE_NAME);
print'<!--connected to reader database-->';
$thisDataBaseWriter = new DataBase('asubach_writer',
DATABASE_NAME);
print'<!--connected to writer database-->';

?>

