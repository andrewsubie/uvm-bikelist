<?php
include 'top.php';

$netId = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8");
//print $netId;
//$netId = 'jlackey';

$sql = 'SELECT tblBikeListing.fldYear, tblBikeListing.fldMake, tblBikeListing.fldModel, tblBikeListing.fldDescription, tblBikeListing.fldWheelSize, tblBikeListing.fldAskingPrice, tblBikeListing.fldListingDate, tblBikeListing.fldImg, tblBikeListing.fldLocation, tblUserListing.pfkUserName, tblUserListing.pfkListingID ';
$sql .= 'FROM tblBikeListing ';
$sql .= 'LEFT JOIN tblUserListing ON tblBikeListing.pmkListingID = tblUserListing.pfkListingID ';
$sql .= 'WHERE tblUserListing.pfkUserName = ?';

$records = $thisDataBaseReader->select($sql, [$netId]);

foreach ($records as $record){
//    print '<section><p><strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong><br>';
    print '<section>';
    print '<p><a href="update.php?listingID=' . $record['pfkListingID'] . '">' . '<strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong></a></p>';
    print 'Description: ' . $record['fldDescription'] . '<br>';
    print 'Wheel Size: ' . $record['fldWheelSize'] . '<br>';
    print 'Asking Price: $' . $record['fldAskingPrice'] . ' USD <br>';
    print 'Listed on: ' . $record['fldListingDate'] . '<br>';
    print '<img src="images/'. $record['fldImg']. '" alt="'. $record['fldImg'] .'" width="200" height="200"></p></section>';
}
?>