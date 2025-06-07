
<nav>
    <a class="<?php
    if ($pathParts['filename'] == "listings") {
        print 'activePage';
    }
    ?>" href="listings.php"> Manage My Listings </a>

    <a class="<?php
    if ($pathParts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php"> View Listings </a>


    <a class="<?php
    if ($pathParts['filename'] == "form") {
        print 'activePage';
    }
    ?>" href="form.php"> Create a listing </a>

    <a class="<?php
    if ($pathParts['filename'] == "about") {
        print 'activePage';
    }
    ?>" href="about.php"> About </a>

    <?php
    $netId = htmlentities($_SERVER['REMOTE_USER'], ENT_QUOTES, "UTF-8");
    $adminIds = array();
    $adminSql = 'SELECT pmkUsername FROM tblUser WHERE fldPrivilegeLevel = "admin"';
    $adminRecords = $thisDataBaseReader->select($adminSql);
    foreach ($adminRecords as $record){
        array_push($adminIds, $record['pmkUsername']);
    }
    if (in_array($netId, $adminIds)){
        print'<a class="';
        if ($pathParts['filename'] == "admin") {
            print 'activePage';
        }
        print('" href="admin.php">Admin View</a>');
    }
    ?>
</nav>