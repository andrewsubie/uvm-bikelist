<p>
    CREATE TABLE `tblBikeListing` (
`pmkListingID` int NOT NULL,
`fldYear` int DEFAULT NULL,
`fldMake` varchar(50) DEFAULT NULL,
`fldModel` varchar(50) DEFAULT NULL,
`fldDescription` text,
`fldWheelSize` enum('26','27.5','29','650b','700c') DEFAULT NULL,
`fldAskingPrice` int DEFAULT NULL,
`fldListingDate` date DEFAULT NULL,
`fldImg` varchar(50) DEFAULT NULL,
`fldLocation` varchar(20) DEFAULT NULL
    )
</p>
<p>
    CREATE TABLE `tblCounties` (
    `pmkCountyID` int NOT NULL,
    `fldCountyName` varchar(50) DEFAULT NULL
    )
</p>
<p>
    CREATE TABLE `tblUser` (
    `pmkUsername` varchar(20) NOT NULL,
    `fldPrivilegeLevel` enum('user','admin') DEFAULT NULL,
    `fldEmail` varchar(30) DEFAULT NULL
    )
</p>
<p>
    CREATE TABLE `tblUserListing` (
    `pfkUserName` varchar(20) NOT NULL,
    `pfkListingID` int NOT NULL
    )
</p>