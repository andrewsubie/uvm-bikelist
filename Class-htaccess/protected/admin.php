<?php
include 'top.php';
function getData($field)
{
    if (!isset($_POST[$field])) {
        $data = '';
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }

    return $data;
}

$selection = '';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $selection = getData('selCounty');
}

//print $selection;
?>
<div class = "userSelect">
<h2>Admin View</h2>
</div>
<?php
$sql = 'SELECT pmkListingID, fldYear, fldMake, fldModel, fldDescription, fldWheelSize, fldAskingPrice, fldListingDate, fldImg FROM tblBikeListing';
$records = $thisDataBaseReader->select($sql);
foreach ($records as $record){
//    print '<section><p><strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong><br>';
    print '<section>';
    print '<p><a href="update.php?listingID=' . $record['pmkListingID'] . '">' . '<strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong></a></p>';
    print 'Description: ' . $record['fldDescription'] . '<br>';
    print 'Wheel Size: ' . $record['fldWheelSize'] . '<br>';
    print 'Asking Price: $' . $record['fldAskingPrice'] . ' USD <br>';
    print 'Listed on: ' . $record['fldListingDate'] . '<br>';
    print '<img src="images/'. $record['fldImg']. '" alt="'. $record['fldImg'] .'" width="200" height="200"></p></section>';
}
?>
