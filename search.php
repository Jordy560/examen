<?php

include "index.php";
$output = '';

//zoek functie
if(isset ($_POST['search'])) {
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq );

    $query = $query = mysql_query("SELECT * FROM contract WHERE contract_leverancier LIKE '%searchq%' OR contract_naam LIKE '%searchq%'") or die ("Niet gevonden");
    $count = mysql_num_rows($query);
    if ($count == 0) {
        $output = 'er zijn geen zoekresultaten';
    } else {
        while($row = mysqli_fetch_array($query)) {
            $lname = $row['contract_leverancier'];
            $cname = $row['contract_naam'];
            $id = $row['id'];

            $output .= '<div>'.$lname.''.$cname.'</div>';

        }



    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>

<form action="search.php" method="post">
    <input type="text" name="search" placeholder="Zoeken naar contracten">
    <input type="submit" value=">>" />
</form>

<?php print ("$output");?>

</body>
</html>