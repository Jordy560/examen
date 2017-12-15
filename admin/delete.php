<?php
/**
 * Created by PhpStorm.
 * User: JordyC
 * Date: 11-12-2017
 * Time: 12:16
 */
//database link
include "database.php";

//De id van de contraten overzicht wordt meegegeven en gekoppeld aan de variable id.
$id=$_GET["id"];

//Dit zorgt er voor dat de afbeelding ook wordt verwijderd
$res=mysqli_query($link, "select * from contract where id=$id");
while($row=mysqli_fetch_array($res))
{
    $img=$row["contract_bestand"];
}

unlink($img);

// dit is de delete query, de variable id wordt meegeven als id.
mysqli_query($link,"delete from contract where id=$id");
?>
<script type="text/javascript">
window.location="display_contract.php"
</script>