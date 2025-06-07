<h1>ASUBACH_JLACKEY_cs2480_final</h1>

<div>
    <div>
        <h2>tblBikeListing</h2>

        <table class="pma-table print">
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Null</th>
                <th>Default</th>
                <th>Links to</th>
                <th>Comments</th>
            </tr>
            <tr>
                <td class="nowrap">
                    pmkListingID
                    <em>(Primary)</em>
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    int
                </td>
                <td>No</td>
                <td class="nowrap">

                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldYear
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    int
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldMake
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(50)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldModel
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(50)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldDescription
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    text
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldWheelSize
                </td>
                <td lang="en" dir="ltr">
                    enum(&#039;26&#039;, &#039;27.5&#039;, &#039;29&#039;, &#039;650b&#039;, &#039;700c&#039;)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldAskingPrice
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    int
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldListingDate
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    date
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldImg
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(50)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldLocation
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(20)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
            <table class="pma-table" id="table_index">
                <thead>
                <tr>
                    <th>Keyname</th>
                    <th>Type</th>
                    <th>Unique</th>
                    <th>Packed</th>
                    <th>Column</th>
                    <th>Cardinality</th>
                    <th>Collation</th>
                    <th>Null</th>
                    <th>Comment</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td rowspan="1">PRIMARY</td>
                    <td rowspan="1">BTREE</td>
                    <td rowspan="1">Yes</td>
                    <td rowspan="1">No</td>

                    <td>
                        pmkListingID
                    </td>
                    <td>28</td>
                    <td>A</td>
                    <td>No</td>

                    <td rowspan="1"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2>tblCounties</h2>

        <table class="pma-table print">
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Null</th>
                <th>Default</th>
                <th>Links to</th>
                <th>Comments</th>
            </tr>
            <tr>
                <td class="nowrap">
                    pmkCountyID
                    <em>(Primary)</em>
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    int
                </td>
                <td>No</td>
                <td class="nowrap">

                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldCountyName
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(50)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
            <table class="pma-table" id="table_index">
                <thead>
                <tr>
                    <th>Keyname</th>
                    <th>Type</th>
                    <th>Unique</th>
                    <th>Packed</th>
                    <th>Column</th>
                    <th>Cardinality</th>
                    <th>Collation</th>
                    <th>Null</th>
                    <th>Comment</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td rowspan="1">PRIMARY</td>
                    <td rowspan="1">BTREE</td>
                    <td rowspan="1">Yes</td>
                    <td rowspan="1">No</td>

                    <td>
                        pmkCountyID
                    </td>
                    <td>13</td>
                    <td>A</td>
                    <td>No</td>

                    <td rowspan="1"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2>tblUser</h2>

        <table class="pma-table print">
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Null</th>
                <th>Default</th>
                <th>Links to</th>
                <th>Comments</th>
            </tr>
            <tr>
                <td class="nowrap">
                    pmkUsername
                    <em>(Primary)</em>
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(20)
                </td>
                <td>No</td>
                <td class="nowrap">

                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldPrivilegeLevel
                </td>
                <td lang="en" dir="ltr">
                    enum(&#039;user&#039;, &#039;admin&#039;)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    fldEmail
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(30)
                </td>
                <td>Yes</td>
                <td class="nowrap">
                    <em>NULL</em>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
            <table class="pma-table" id="table_index">
                <thead>
                <tr>
                    <th>Keyname</th>
                    <th>Type</th>
                    <th>Unique</th>
                    <th>Packed</th>
                    <th>Column</th>
                    <th>Cardinality</th>
                    <th>Collation</th>
                    <th>Null</th>
                    <th>Comment</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td rowspan="1">PRIMARY</td>
                    <td rowspan="1">BTREE</td>
                    <td rowspan="1">Yes</td>
                    <td rowspan="1">No</td>

                    <td>
                        pmkUsername
                    </td>
                    <td>3</td>
                    <td>A</td>
                    <td>No</td>

                    <td rowspan="1"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <h2>tblUserListing</h2>

        <table class="pma-table print">
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Null</th>
                <th>Default</th>
                <th>Links to</th>
                <th>Comments</th>
            </tr>
            <tr>
                <td class="nowrap">
                    pfkUserName
                    <em>(Primary)</em>
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    varchar(20)
                </td>
                <td>No</td>
                <td class="nowrap">

                </td>
                <td>tblUser -&gt; pmkUsername</td>
                <td></td>
            </tr>
            <tr>
                <td class="nowrap">
                    pfkListingID
                    <em>(Primary)</em>
                </td>
                <td lang="en" dir="ltr" class="nowrap">
                    int
                </td>
                <td>No</td>
                <td class="nowrap">

                </td>
                <td>tblBikeListing -&gt; pmkListingID</td>
                <td></td>
            </tr>
        </table>

        <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
            <table class="pma-table" id="table_index">
                <thead>
                <tr>
                    <th>Keyname</th>
                    <th>Type</th>
                    <th>Unique</th>
                    <th>Packed</th>
                    <th>Column</th>
                    <th>Cardinality</th>
                    <th>Collation</th>
                    <th>Null</th>
                    <th>Comment</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td rowspan="2">PRIMARY</td>
                    <td rowspan="2">BTREE</td>
                    <td rowspan="2">Yes</td>
                    <td rowspan="2">No</td>

                    <td>
                        pfkUserName
                    </td>
                    <td>2</td>
                    <td>A</td>
                    <td>No</td>

                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <td>
                        pfkListingID
                    </td>
                    <td>15</td>
                    <td>A</td>
                    <td>No</td>

                </tr>
                <tr>
                    <td rowspan="1">pfkListingID</td>
                    <td rowspan="1">BTREE</td>
                    <td rowspan="1">No</td>
                    <td rowspan="1">No</td>

                    <td>
                        pfkListingID
                    </td>
                    <td>15</td>
                    <td>A</td>
                    <td>No</td>

                    <td rowspan="1"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>