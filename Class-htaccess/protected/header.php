<header>
    <h1>
        <?php
            if(basename($_SERVER['SCRIPT_FILENAME']) == "index.php")
                print 'VT Bike List';

            elseif(basename($_SERVER['SCRIPT_FILENAME']) == "form.php")
                print 'Create listing';

            elseif(basename($_SERVER['SCRIPT_FILENAME']) == "about.php")
                print 'Welcome to BikeList';

            elseif(basename($_SERVER['SCRIPT_FILENAME']) == "listings.php")
                print 'My Listings';

        ?>
    </h1>
</header>
