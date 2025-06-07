<?php
include 'top.php';

$listingId = (isset($_GET['listingID'])) ? (int) htmlspecialchars($_GET['listingID']) : 0;

$sql = 'SELECT t.fldYear, t.fldMake, t.fldModel, t.fldDescription, t.fldWheelSize, t.fldAskingPrice, t.fldListingDate, t.fldImg, t.fldLocation, tblUserListing.pfkUserName, tblUserListing.pfkListingID, tblUser.fldEmail, tblUser.pmkUsername ';
$sql .= 'FROM tblBikeListing AS t ';
$sql .= 'JOIN tblUserListing ON t.pmkListingID = tblUserListing.pfkListingID ';
$sql .= 'JOIN tblUser on tblUserListing.pfkUserName = tblUser.pmkUsername ';
$sql .= 'WHERE tblUserListing.pfkListingID = ?;';

$data = array($listingId);
$listing = $thisDataBaseReader->select($sql,$data);
//print($thisDataBaseReader->displaySQL($sql, $data));
//var_dump($listing);

$dataIsGood = false;
$errorMessage = '';
$message = '';

$year = 0;
$make = '';
$model = '';
$description = '';
$wheelSize = '';
$askingPrice = 0;
$date = '';
$email = '';
$image = '';
$county = '';
$netId = '';

// get values for update
if($listingId > 0){
    $year = $listing[0]['fldYear'];
    $make = $listing[0]['fldMake'];;
    $model = $listing[0]['fldModel'];;
    $description = $listing[0]['fldDescription'];
    $wheelSize = $listing[0]['fldWheelSize'];
    $askingPrice = $listing[0]['fldAskingPrice'];
    $date = $listing[0]['fldListingDate'];
    $email = $listing[0]['fldEmail'];
    $image = $listing[0]['fldImg'];
    $county = $listing[0]['fldLocation'];
    $netId = $listing[0]['pmkUsername'];
} else {

}

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = '';
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    return (preg_match ("/^([[:alnum:]]|-|\.| |\?|!|\'|&|;|#)+$/", $testString)); # may need to change if error with alphanum for description
}

function verifyImage($url) {
    return (preg_match('/^[^\s]+\.(jpg|jpeg|png|gif|bmp)$/', $url)); # for file extension? source: https://www.tutorialspoint.com/how-to-validate-image-file-extension-using-regular-expression
}

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;

    if(isset($_POST['delete'])) {
        if($listingId > 3) { // hard coded to make sure table isn't dropped
            $sql = 'DELETE FROM tblBikeListing WHERE pmkListingID = ?';
            $data = [$listingId];

            $sql2 = 'DELETE FROM tblUserListing where pfkListingID = ?';

             try {
                 $statement2 = $thisDataBaseWriter->delete($sql2, $data);
                 $statement = $thisDataBaseWriter->delete($sql, $data);

                 //print $thisDataBaseWriter->displaySQL($sql2, $data);
                 //print $thisDataBaseWriter->displaySQL($sql, $data);


                 print 'statement 2: ' . $statement2;
                 print 'statement 1: ' . $statement;


                 if ($statement) {
                     $message = '<h2>Listing Deleted</h2>';
                     $message .= '<p>The listing has been successfully deleted.</p>';
                     mail($email, "Your " . $year . " " . $make . " " . "$model" . " was successfully deleted!", "Thanks for using BikeList, here is the information you provided:\nDescription: $description\n Wheel size: $wheelSize Listing Image: $image");

                 } else {
                     $errorMessage .= '<p class="mistake">Failed to delete the listing. Please try again.</p>';
                 }
             } catch (PDOException $e) {
                 // Handle any errors
                 $errorMessage .= '<p class="mistake">An error occurred while deleting the listing: ' . $e->getMessage() . '</p>';
             }
        }

    } else {


        $year = (int)getData('selectYear');
        $make = getData('txtMake');
        $model = getData('txtModel');
        $description = getData('txtDescription');
        $wheelSize = getData('selectWheel');
        $askingPrice = (int)getData('txtPrice');
        $date = getData('txtDate');
        $email = getData('txtEmail');
        $netId = getData('txtNetId');
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $county = getData('selCounty');
        $image = getData('txtImage');

        print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;
        $dataIsGood = true;

        if ($year == 0) {
            $errorMessage .= '<p class="mistake">Please enter the bike\'s year</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($year)) {
            $errorMessage .= '<p class="mistake">The bike\'s year contains invalid characters, please just use numbers (i.e. 2024)</p>';
            $dataIsGood = false;
        }

        if ($make == '') {
            $errorMessage .= '<p class="mistake">Please enter the bike\'s make</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($make)) {
            $errorMessage .= '<p class="mistake">The bike\'s make contains invalid characters</p>';
            $dataIsGood = false;
        }

        if ($model == '') {
            $errorMessage .= '<p class="mistake">Please enter the bike\'s model</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($model)) {
            $errorMessage .= '<p class="mistake">The bike\'s model contains invalid characters</p>';
            $dataIsGood = false;
        }

        if ($description == '') {
            $errorMessage .= '<p class="mistake">Please enter the bike\'s description</p>';
            $dataIsGood = false;
        } //elseif(!verifyAlphaNum($description)) {
//    $errorMessage .= '<p class="mistake">The bike\'s description contains invalid characters</p>';
//    $dataIsGood = false;
//}

        $validWheelSizes = ['26', '27.5', '29', '650b', '700c'];
        if (!in_array($wheelSize, $validWheelSizes)) {
            $errorMessage .= '<p class="mistake">Please select a valid wheel size</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($wheelSize)) {
            $errorMessage .= '<p class="mistake">The bike\'s wheel size contains invalid characters</p>';
            $dataIsGood = false;
        }

        if ($askingPrice == 0) {
            $errorMessage .= '<p class="mistake">Please enter the price\'s</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($askingPrice)) {
            $errorMessage .= '<p class="mistake">The bike\'s asking price contains invalid characters</p>';
            $dataIsGood = false;
        }

//if($date == ""){
//    $errorMessage .= '<p class="mistake">Please enter the listing\'s date</p>';
//    $dataIsGood = false;
//} elseif(!verifyAlphaNum($date)) {
//    $errorMessage .= '<p class="mistake">The listing\'s asking Image contains invalid characters, please just use numbers (i.e. 2024)</p>';
//    $dataIsGood = false;
//}

        if ($email == '') {
            $errorMessage .= '<p class="mistake">Type in your email address</p>';
            $dataIsGood = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessage .= '<p class="mistake">Your email address contains invalid characters</p>';
            $dataIsGood = false;
        }

        if ($netId == 0) {
            $errorMessage .= '<p class="mistake">Please enter your UVM netID</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($netId)) {
            $errorMessage .= '<p class="mistake">Your netID contains invalid characters</p>';
            $dataIsGood = false;
        }

        if ($image == '') {
            $errorMessage .= '<p class="mistake">Type in your image url</p>';
            $dataIsGood = false;
        }
//} elseif(!verifyImage($image)) {
//    $errorMessage .= '<p class="mistake">The listing\'s image url contains invalid characters</p>';
//    $dataIsGood = false;
//}

        $writeNext = '';

        print '<!-- Starting saving -->';
//print $dataIsGood;
        if ($dataIsGood) {
            $sql = 'UPDATE tblBikeListing SET ';
            $sql .= 'fldYear = ?, fldMake = ?, fldModel = ?, fldDescription = ?, fldWheelSize = ?, fldAskingPrice = ?, fldListingDate = ?, fldImg = ?, fldLocation = ? ';
            $sql .= 'WHERE pmkListingID = ?';

            $sql2 = 'INSERT IGNORE INTO tblUser (pmkUsername, fldPrivilegeLevel, fldEmail)'; // insert ignore will insert if not duplicate, otherwise discard
            $sql2 .= ' VALUES(?, ?, ?)'; // sql2 and data2 are for the user table

            $data = [$year, $make, $model, $description, $wheelSize, $askingPrice, date('Y-m-d'), $image, $county, $listingId]; # source: https://www.sitepoint.com/php-get-current-date/
            $data2 = [$netId, "user", $email]; // 0 = non-admin


            try {
                $statement = $thisDataBaseWriter->insert($sql, $data);
                //print $thisDataBaseReader->displaySQL($sql, $data);
                $statement2 = $thisDataBaseWriter->insert($sql2, $data2);

                if ($statement and $statement2) {
                    $message = '<h2>Thank you</h2>';
                    $message .= '<p>Your listing was updated</p>';
                    $emailMessage = "Your " . $year . " " . $make . " " . "$model" . " was successfully updated on " . date('Y-m-d');
                    mail($email, "Your " . $year . " " . $make . " " . "$model" . " was successfully updated!", "Thanks for using BikeList, here is the information you provided:\nDescription: $description\n Wheel size: $wheelSize Listing Image: $image");
                } else {
                    $message .= '<p>Listing was not updated</p>';
                }
            } catch (PDOException $e) {
                print $e;
            }
        }
    }
}
?>
<main>
    <form action="#" method="POST">
        <fieldset class="pInfo">
            <legend>Bike info</legend>
            <p>
                <label for="txtMake">Make:</label>
                <input type="text" name="txtMake" id="txtMake" placeholder="i.e Specialized" value="<?php  print $make?>" required>
            </p>

            <p>
                <label for="txtModel">Model:</label>
                <input type="text" name="txtModel" id="txtModel" placeholder="i.e Stumpjumper" value="<?php print $model ?>"required>
            </p>

            <p>
                <label for="selectYear">Year:</label>
                <select name="selectYear" id="selectYear" value="<?php print $year ?>">
                    <?php
                    for ($x = 2024; $x >= 2000; $x-- ){
                        print '<option value="' . $x . '">' . $x . '</option>';
                    }
                    ?>
                    <option value="0">Unknown</option>
                </select>
            </p>

            <p>
                <label for="selectWheel">Wheel size:</label>
                <select name="selectWheel" id="selectWheel" value="<?php print $wheelSize?>">
                    <?php
                    $wheelSize = ['29', '27.5','26', '650b', '700c'];
                    foreach($wheelSize as $size){
                        print '<option value="' . $size . '">' . $size . '</option>';
                    }
                    ?>
                    <option value="0">Other</option>
                </select>
            </p>


        </fieldset>

        <fieldset class="Listing info">
            <legend>Listing info</legend>
            <p>
                <label for="txtDescription"> Describe the bike. </label><br>
                <textarea id="txtDescription" name="txtDescription" rows="5" cols="50" > <?php print $description?> </textarea>
            </p>

            <p>
                <label for="txtEmail">Email:</label>
                <input type="email" name="txtEmail" id="txtEmail" placeholder="name@domain.com" required value="<?php print $email ?>">
            </p>

            <p>
                <label for="txtNetId">NetID: </label>
                <input name="txtNetId" id="txtNetId" value="<?php print $netId?>"required>
            </p>

            <p>
                <label for="txtPrice">Price (USD):</label>
                <input type="text" name="txtPrice" id="txtPrice" placeholder="i.e 1500" value="<?php print $askingPrice?>" required>
            </p>

            <p>
                <label for="txtImage">Image file extension:</label>
                <input type="text" name="txtImage" id="txtImage" placeholder="i.e stumpjumper.jpg" value ="<?php print $image ?> "required>
            </p>

            <p>
                <label for="selCounty">County: </label>
                <select name="selCounty" id="selCounty">
                    <?php
                    $sql = 'SELECT pmkCountyID, fldCountyName FROM tblCounties ORDER BY fldCountyName';
                    $records = $thisDataBaseReader->select($sql);
                    foreach ($records as $record) {
                        print '<option value="' . $record['fldCountyName'] . '">' . $record['fldCountyName'] . '</option>';
                    }
                    ?>
                </select>
            </p>
        </fieldset>

        <fieldset>
            <p>
                <input type="submit" name="submit" value="Update">
                <input type="submit" name="delete" value="Delete">
            </p>
        </fieldset>
    </form>

    <?php
    // Display errors only if form has been submitted
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        print $message;
        print $errorMessage;
        print "\n";
    }
    ?>
</main>
<?php
include 'footer.php';
?>
</body>
</html>
?>