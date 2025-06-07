<?php
include 'top.php';

$dataIsGood = false;
$errorMessage = '';
$message = '';

$year = 0;
$make = '';
$model = '';
$description = '';
$wheelSize = '';
$askingImage = 0;
$date = '';
$email = '';
$image = '';
$county = '';
$netId = '';

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

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;
}

$year = (int) getData('selectYear');
$make = getData('txtMake');
$model = getData('txtModel');
$description = getData('txtDescription');
$wheelSize = getData('selectWheel');
$askingPrice = (int) getData('txtPrice');
$date = getData('txtDate');
$email = getData('txtEmail');
$netId = getData('txtNetId');
$email = filter_var($email,FILTER_SANITIZE_EMAIL);
$county = getData('selCounty');
$image = getData('txtImage');

print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;
$dataIsGood = true;

if($year == 0){
    $errorMessage .= '<p class="mistake">Please enter the bike\'s year</p>';
    $dataIsGood = false;
} elseif(!verifyAlphaNum($year)) {
    $errorMessage .= '<p class="mistake">The bike\'s year contains invalid characters, please just use numbers (i.e. 2024)</p>';
    $dataIsGood = false;
}

if($make == ''){
    $errorMessage .= '<p class="mistake">Please enter the bike\'s make</p>';
    $dataIsGood = false;
} elseif(!verifyAlphaNum($make)) {
    $errorMessage .= '<p class="mistake">The bike\'s make contains invalid characters</p>';
    $dataIsGood = false;
}

if($model == ''){
    $errorMessage .= '<p class="mistake">Please enter the bike\'s model</p>';
    $dataIsGood = false;
} elseif(!verifyAlphaNum($model)) {
    $errorMessage .= '<p class="mistake">The bike\'s model contains invalid characters</p>';
    $dataIsGood = false;
}

if($description == ''){
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
} elseif(!verifyAlphaNum($wheelSize)) {
    $errorMessage .= '<p class="mistake">The bike\'s wheel size contains invalid characters</p>';
    $dataIsGood = false;
}

if($askingPrice == 0){
    $errorMessage .= '<p class="mistake">Please enter the price\'s</p>';
    $dataIsGood = false;
} elseif(!verifyAlphaNum($askingPrice)) {
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

if($email == ''){
    $errorMessage .= '<p class="mistake">Type in your email address</p>';
    $dataIsGood = false;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage .= '<p class="mistake">Your email address contains invalid characters</p>';
    $dataIsGood = false;
}

if($netId == 0){
    $errorMessage .= '<p class="mistake">Please enter your UVM netID</p>';
    $dataIsGood = false;
} elseif(!verifyAlphaNum($netId)) {
    $errorMessage .= '<p class="mistake">Your netID contains invalid characters</p>';
    $dataIsGood = false;
}

if($image == '') {
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
if($dataIsGood){
    $sql = 'INSERT INTO tblBikeListing
    (fldYear, fldMake, fldModel, fldDescription, fldWheelSize, fldAskingPrice, fldListingDate, fldImg, fldLocation)';
    $sql .= ' VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $sql2 = 'INSERT IGNORE INTO tblUser (pmkUsername, fldPrivilegeLevel, fldEmail)'; // insert ignore will insert if not duplicate, otherwise discard
    $sql2 .= ' VALUES(?, ?, ?)'; // sql2 and data2 are for the user table

    $data = [$year, $make, $model, $description, $wheelSize, $askingPrice, date('Y-m-d'), $image, $county]; # source: https://www.sitepoint.com/php-get-current-date/
    $data2 = [$netId, "user", $email]; // 0 = non-admin

//    print $thisDataBaseReader->displaySQL($sql, $data);
//    print $thisDataBaseReader->displaySQL($sql2, $data2);


    $sql3 = "INSERT INTO tblUserListing (pfkUserName, pfkListingID)";
    $sql3 .= ' VALUES (?, ?)';

    //print $thisDataBaseWriter->displaySQL($sql3, [$netId,$lastId[0]['pmkListingID']]);

    try {
        $statement = $thisDataBaseWriter->insert($sql, $data);
        $statement2 = $thisDataBaseWriter->insert($sql2, $data2);

        $sql4 = 'SELECT pmkListingID FROM tblBikeListing ';
        $sql4 .= 'ORDER BY pmkListingID DESC ';
        $sql4 .= 'LIMIT 1;';

        print $thisDataBaseWriter->displaySQL($sql4, '');
        $lastId = $thisDataBaseWriter->select($sql4, '');
        var_dump($lastId);


        //INSERT INTO tblUserListing (pfkUserName, pfkListingID)
        //VALUES ('jlackey', 28)
        $sql3 = "INSERT INTO tblUserListing (pfkUserName, pfkListingID)";
        $sql3 .= ' VALUES (?, ?)';

        $data3 = [$netId, $lastId[0]['pmkListingID']];

        print $thisDataBaseWriter->displaySQL($sql3, $data3);
        $statement3 = $thisDataBaseWriter->insert($sql3, $data3);

        if ($statement AND $statement2){
            $message = '<h2>Thank you</h2>';
            $message .= '<p>Your listing was created</p>';
            $emailMessage = "Your " . $year . " " . $make . " " . "$model" . " was successfully listed on " . date('Y-m-d');
            mail($email, "Your " . $year . " " . $make . " " . "$model" . " was successfully listed!", "Thanks for using BikeList, here is the information you provided:\nDescription: $description\n Wheel size: $wheelSize Listing Image: $askingImage");
        } else {
            $message .= '<p>Listing was not posted</p>';
        }
    }
    catch (PDOException $e){
     print $e;
    }
}
?>
<main>
    <form action="#" method="POST">
        <fieldset class="pInfo">
            <legend>Bike info</legend>
            <p>
                <label for="txtMake">Make:</label>
                <input type="text" name="txtMake" id="txtMake" placeholder="i.e Specialized" value="<?php echo htmlspecialchars($make);?>" required>
            </p>

            <p>
                <label for="txtModel">Model:</label>
                <input type="text" name="txtModel" id="txtModel" placeholder="i.e Stumpjumper" value="<?php echo htmlspecialchars($model); ?>"required>
            </p>

            <p>
                <label for="selectYear">Year:</label>
                <select name="selectYear" id="selectYear" value="<?php echo htmlspecialchars($year); ?>">
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
                <select name="selectWheel" id="selectWheel">
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
                <textarea id="txtDescription" name="txtDescription" rows="5" cols="50"> <?php print $description?> </textarea>
            </p>

            <p>
                <label for="txtEmail">Email:</label>
                <input type="email" name="txtEmail" id="txtEmail" placeholder="name@domain.com" required value="<?php print $email?>">
            </p>

            <p>
                <label for="txtNetId">NetID: </label>
                <input name="txtNetId" id="txtNetId" required value = "<?php print $netId?>">
            </p>

            <p>
                <label for="txtPrice">Price (USD):</label>
                <input type="text" name="txtPrice" id="txtPrice" placeholder="i.e 1500" value="<?php echo htmlspecialchars($askingPrice);?>" required>
            </p>

            <p>
                <label for="txtImage">Image file extension:</label>
                <input type="text" name="txtImage" id="txtImage" placeholder="i.e stumpjumper.jpg" value="<?php print $image?>" required>
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
                <input type="submit">
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