<!DOCTYPE html>
<html lang="en">
<head>
    <title>CS2480A Spring 2024</title>

    <meta name="author" content="Andrew Subach">
    <meta name="description" content="CS2480A Sitemap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* basic CSS */
        body {
            margin: auto;
            padding: 3%;
            width: 90%;
            display: grid;
        }

        figure {
            border: thin solid darkslategray;
            border-radius: 3%;
            padding: 3%;
            text-align: center;
        }

        figcaption {
            color: #839e99;
            font-style: italic;
            text-align: center;
        }

        img {
            border-radius: 3%;
            max-width: 100%
        }

        /* Setting up a grid layout for the sitemap page */
        body>h1 {
            grid-column: 1/2;
            grid-row: 1;

        }

        body>h2 {
            grid-column: 1/2;
            grid-row: 2;

        }

        body>p {
            grid-column: 1/2;
            grid-row: 3;
        }

        figure {
            border: thin solid darkslategray;
            border-radius: 3%;
            padding: 3%;
            text-align: center;
            grid-column: 2 / 2;
            grid-row: 1 / span 3;
        }

        .header {
            grid-area: header;
            grid-column: 1 / 3;
            padding: .5%;
            margin: .5%;
        }

        .lab-layout {
            border-bottom: thin dashed navy;
            display: inline-grid;
            grid-template-columns: 25% 25% 50%;
            grid-template-areas: "header header header"
                "public-files supporting-files grader-notes";
            padding: .5%;
            margin: .5%;
            grid-column: 1 / span 2;
        }

        .public-files {
            grid-area: public-files;
            padding: .5%;
            margin: .5%;
        }

        .supporting-files {
            grid-area: supporting-files;
            padding: .5%;
            margin: .5%;
        }

        .grader-notes {
            grid-area: grader-notes;
            padding: .5%;
            margin: .5%;
        }
    </style>

</head>
<body>
<figure>
    <img alt="Andrew Subach 2023" src="live-lab4/images/andrew-subach.jpg">
    <figcaption>Riding my bike on the Cauesway!.</figcaption>
</figure>

<h1>CS 2480-<em>A</em> Spring 2024 </h1>
<h2>Andrew Subach - Site map</h2>
<p><a href="ADMIN/code-viewer.php">My Admin Folder</a></p>
<!--     ###########################################  -->
<section class="lab-layout">
    <h2 class="header">Final Project</h2>
    <section class="public-files">
        <h3>Public Files</h3>
        <p><a href="final-asubach-jlackey/Class-htaccess/protected/index.php">Home Page</a></p>
        <p><a href="final-asubach-jlackey/Class-htaccess/protected/about.php">About Page</a></p>
        <p><a href="final-asubach-jlackey/Class-htaccess/protected/form.php">Add Listing Page</a></p>
        <p><a href="final-asubach-jlackey/Class-htaccess/protected/listings.php">Edit/Delete Listings Page</a></p>
    </section>

    <section class="supporting-files">
        <h3>Supporting files</h3>
        <p><a href="https://github.com/cs-2480/Final-Project-asubach-jlackey">GitHub Repo</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/dd.php">Data Dictionary</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/schema.php">Schema</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/sql.php">SQL Insert Statements</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/images/wireframe.jpg">Wireframe</a></p>
        <h3>CSS</h3>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/css/custom.css">CSS Custom</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/css/layout-desktop.css">CSS Desktop</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/css/layout-tablet.css">CSS Tablet</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/css/layout-phone.css">CSS Phone</a></p>
        <h3>Includes</h3>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/footer.php">Footer</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/header.php">Header</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/nav.php">Nav</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/top.php">Top</a></p>
        <h3>Auxiliary Pages</h3>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/listing_admin.php">Admin Listing Zoom Page</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/listing.php">Listing Zoom Page</a></p>
        <p><a href = "final-asubach-jlackey/Class-htaccess/protected/update.php">Update/Delete Page</a></p>
    </section>

    <section class="grader-notes">
        <h3>Notes to grader</h3>
    </section>
</section>

<!--     ###########################################  -->
<section class="lab-layout">
    <h2 class="header">Lab Five</h2>
    <section class="public-files">
        <h3>Public Files</h3>
        <p><a href="live-lab5/Class-htaccess/protected/index.php">Home Page</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/form.php">Form</a></p>
        <p><a href="live-lab5/Class-htaccess/protected/student.php">Student Report Page</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/teacher.php">Instructor Report Page</a></p>
    </section>

    <section class="supporting-files">
        <h3>Supporting files</h3>
        <p><a href="https://github.com/cs-2480/Lab5-Andrew-Subach">GitHub Repo</a></p>
        <p><a href="live-lab5/Class-htaccess/protected/wireframe.JPG">Wireframe</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/schema.php">Schema</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/dd.php">Data Dictionary</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/erd.php">ERD</a></p>
        <h3>CSS</h3>
        <p><a href = "live-lab5/Class-htaccess/protected/custom.css">CSS Custom</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/layout-desktop.css">CSS Desktop</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/layout-tablet.css">CSS Tablet</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/layout-phone.css">CSS Phone</a></p>
        <h3>Includes</h3>
        <p><a href = "live-lab5/Class-htaccess/protected/footer.php">Footer</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/header.php">Header</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/nav.php">Nav</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/top.php">Top</a></p>
        <p><a href = "live-lab5/Class-htaccess/protected/sql.php">SQL</a></p>
    </section>

    <section class="grader-notes">
        <h3>Notes to grader</h3>
    </section>
</section>
<!--     ###########################################  -->
<section class="lab-layout">
    <h2 class="header">Lab Four</h2>
    <section class="public-files">
        <h3>Public Files</h3>
        <p><a href="live-lab4/index.php">Home Page</a></p>
        <p><a href = "live-lab4/form.php">Form</a></p>
        <p><a href="live-lab4/student.php">Student Report Page</a></p>
        <p><a href = "live-lab4/teacher.php">Instructor Report Page</a></p>
    </section>

    <section class="supporting-files">
        <h3>Supporting files</h3>
        <p><a href="https://github.com/cs-2480/Lab4-Andrew-Subach">GitHub Repo</a></p>
        <p><a href="wireframe.JPG">Wireframe</a></p>
        <p><a href = "live-lab4/schema.php">Schema</a></p>
        <p><a href = "live-lab4/dd.php">Data Dictionary</a></p>
        <p><a href = "live-lab4/erd.php">ERD</a></p>
        <h3>CSS</h3>
        <p><a href = "live-lab4/css/custom.css">CSS Custom</a></p>
        <p><a href = "live-lab4/css/layout-desktop.css">CSS Desktop</a></p>
        <p><a href = "live-lab4/css/layout-tablet.css">CSS Tablet</a></p>
        <p><a href = "live-lab4/css/layout-phone.css">CSS Phone</a></p>
        <h3>Includes</h3>
        <p><a href = "live-lab4/footer.php">Footer</a></p>
        <p><a href = "live-lab4/header.php">Header</a></p>
        <p><a href = "live-lab4/nav.php">Nav</a></p>
        <p><a href = "live-lab4/top.php">Top</a></p>
        <p><a href = "live-lab4/sql.php">SQL</a></p>
    </section>

    <section class="grader-notes">
        <h3>Notes to grader</h3>
        <p>Updated all files and sitemap.php 2/27/24. Ready for regrade.</p>
    </section>
</section>
<!--     ###########################################  -->

<!--     ###########################################  -->
<section class="lab-layout">
    <h2 class="header">Lab Three</h2>
    <section class="public-files">
        <h3>Public Files</h3>
        <p><a href="live-lab3/index.php">Home Page</a></p>
        <p><a href = "live-lab3/form.php">Form</a></p>
    </section>

    <section class="supporting-files">
        <h3>Supporting files</h3>
        <p><a href="https://github.com/cs-2480/Lab3-Andrew-Subach">GitHub Repo</a></p>
        <p><a href="wireframe.JPG">Wireframe</a></p>
        <p><a href = "live-lab3/dd.php">Data Dictionary</a></p>
        <p><a href = "live-lab3/erd.php">ERD</a></p>
        <h3>CSS</h3>
        <p><a href = "live-lab3/css/custom.css">CSS Custom</a></p>
        <p><a href = "live-lab3/css/layout-desktop.css">CSS Desktop</a></p>
        <p><a href = "live-lab3/css/layout-tablet.css">CSS Tablet</a></p>
        <p><a href = "live-lab3/css/layout-phone.css">CSS Phone</a></p>
        <h3>Includes</h3>
        <p><a href = "live-lab3/footer.php">Footer</a></p>
        <p><a href = "live-lab3/header.php">Header</a></p>
        <p><a href = "live-lab3/nav.php">Nav</a></p>
        <p><a href = "live-lab3/top.php">Top</a></p>
        <p><a href = "live-lab3/sql.php">SQL</a></p>
    </section>

    <section class="grader-notes">
        <h3>Notes to grader</h3>
        <p></p>
    </section>
</section>
<!--     ###########################################  -->

<!--     ###########################################  -->
<section class="lab-layout">
    <h2 class="header">Lab Two</h2>
    <section class="public-files">
        <h3>Public Files</h3>
        <p><a href="live-lab2/index.php">Home Page</a></p>
        <p><a href = "live-lab2/form.php">Form</a></p>
    </section>

    <section class="supporting-files">
        <h3>Supporting files</h3>
        <p><a href="https://github.com/cs-2480/Lab4-Andrew-Subach">GitHub Repo</a></p>
        <p><a href="wireframe.JPG">Wireframe</a></p>
        <h3>CSS</h3>
        <p><a href = "live-lab2/css/custom.css">CSS Custom</a></p>
        <p><a href = "live-lab2/css/layout-desktop.css">CSS Desktop</a></p>
        <p><a href = "live-lab2/css/layout-tablet.css">CSS Tablet</a></p>
        <p><a href = "live-lab2/css/layout-phone.css">CSS Phone</a></p>
        <h3>Includes</h3>
        <p><a href = "live-lab2/footer.php">Footer</a></p>
        <p><a href = "live-lab2/header.php">Header</a></p>
        <p><a href = "live-lab2/nav.php">Nav</a></p>
        <p><a href = "live-lab2/top.php">Top</a></p>
        <p><a href = "live-lab2/sql.php">SQL</a></p>
    </section>

    <section class="grader-notes">
        <h3>Notes to grader</h3>
        <p></p>
    </section>
</section>
<!--     ###########################################  -->
</body>
</html>