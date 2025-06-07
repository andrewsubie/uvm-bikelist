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
<h2>Active Listings</h2>
<form action="#"
      method="POST">
    <p>Select a county to view active listings in <br /> Select 'View All' to view all active listings. </p>
    <p>
        <label for="selCounty">County: </label>
        <select name="selCounty" id="selCounty">
            <?php
            $sql = 'SELECT fldCountyName FROM tblCounties ORDER BY fldCountyName';
            $records = $thisDataBaseReader->select($sql);
            foreach ($records as $record) {
                print '<option value="' . $record['fldCountyName'] . '">' . $record['fldCountyName'] . '</option>';
            }
            ?>
            <option value ="all">View All</option>
        </select>
    </p>
    <p>
        <input type = "submit" id = "submit" tabindex="900" value ="Submit">
    </p>
</form>
</div>
<?php
if ($selection != "all") {
$sql = 'SELECT pmkListingID, fldYear, fldMake, fldModel, fldDescription, fldWheelSize, fldAskingPrice, fldListingDate, fldImg FROM tblBikeListing WHERE fldLocation = "' . $selection .'"';}

else {
$sql = 'SELECT pmkListingID, fldYear, fldMake, fldModel, fldDescription, fldWheelSize, fldAskingPrice, fldListingDate, fldImg FROM tblBikeListing';}
$records = $thisDataBaseReader->select($sql);
foreach ($records as $record){
//    print '<section><p><strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong><br>';
    print '<section>';
    print '<p><a href="listing.php?listingID=' . $record['pmkListingID'] . '">' . '<strong>' . $record['fldYear'] . ' ' . $record['fldMake'] . ' ' . $record['fldModel'] . '</strong></a></p>';
    print 'Description: ' . $record['fldDescription'] . '<br>';
    print 'Wheel Size: ' . $record['fldWheelSize'] . '<br>';
    print 'Asking Price: $' . $record['fldAskingPrice'] . ' USD <br>';
    print 'Listed on: ' . $record['fldListingDate'] . '<br>';
    print '<img src="images/'. $record['fldImg']. '" alt="'. $record['fldImg'] .'" width="200" height="200"></p></section>';
}
?>

</main>
</body>
<?php
include 'footer.php';
?>
</html>
