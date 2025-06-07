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

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = '';
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

$errorMessage = '';
$emailBody = '';
$email = '';
$dataIsGood = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailBody = getData('txtMessage');
    $email = getData('txtEmail');

    if ($email == '') {
        $errorMessage .= '<p class="mistake">Type in your email address</p>';
        $dataIsGood = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage .= '<p class="mistake">Your email address contains invalid characters</p>';
        $dataIsGood = false;
    }

    if ($emailBody == '') {
        $errorMessage .= '<p class="mistake">Please enter the bike\'s description</p>';
        $dataIsGood = false;
    }
    $header = ' from: ' . $email;
    if ($dataIsGood) {
        mail($listing[0]['fldEmail'], 'New message', $emailBody . $header);
    } else {
        print $errorMessage;
    }

}

?>
<body>
    <?php
    if(is_array($listing)){
        print '<h2>' . $listing[0]['fldYear'] . ' ' . $listing[0]['fldMake'] . ' ' . $listing[0]['fldModel'] . '</h2>';

        print '<figure class="bike">';
        print '<img alt ="' . $listing[0]['fldYear'] . ' ' . $listing[0]['fldMake'] . ' ' . $listing[0]['fldModel'] . '"' . ' src="images/' . $listing[0]['fldImg'] . '" width="630">';
        print '<figcaption>' .  $listing[0]['fldYear'] . ' ' . $listing[0]['fldMake'] . ' ' . $listing[0]['fldModel'] . '</figcaption>';
        print '</figure>' . PHP_EOL;

        print '<section>';
        print '<h3>Listed on: </h3>';
        print $listing[0]['fldListingDate'];
        print '</section>';

        print '<section>';
        print '<h3>Description</h3><br>';
        print $listing[0]['fldDescription'];
        print '</section>';

        print '<section>';
        print '<h3>Wheel size</h3><br>';
        print $listing[0]['fldWheelSize'];
        print '</section>';

        print '<section>';
        print '<h3>Asking price (USD): $' . $listing[0]['fldAskingPrice'] . '</h3>';
        print '</section>';
    }
    ?>

    <form method="post">
    <section>
        <p>
            <label for="txtMessage"> Get in touch </label><br>
            <textarea id="txtMessage" name="txtMessage" rows="5" cols="50"> </textarea>
        </p>
        <P>
            <label for="txtEmail">Email: </label>
            <input type="email" name="txtEmail" id="txtEmail" placeholder="name@domain.com" required>
        </P>

        <fieldset>
            <p>
                <input type="submit">
            </p>
        </fieldset>
    </section>
    </form>

</body>
