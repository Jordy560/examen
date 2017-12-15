<?php
/**
 * Created by PhpStorm.
 * User: JordyC
 * Date: 11-12-2017
 * Time: 11:30
 */
include "admin/database.php";
?>
<!DOCTYPE html>
<html>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-toggler-icon" href="index.php"></a>

        </div>
        <div class="mx-auto" style="width: 200px;">
            <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>

                </div>
            </div>
        </form>
    </div>
</nav>

        <?php
        include "header.php"
        ?>
<div class="box1">
    <div class="table-responsive">
        <h2>Contracten overzicht</h2>

        <div class="table-hover">
            <?php

            $res= mysqli_query($link,"select * from contract");

            //namen van de overzicht
            echo "<table class='table''>";
            echo "<tr>";
            echo "<th>"; echo "Contract naam";      echo "</th>";
            echo "<th>"; echo "Contract bestand";   echo "</th>";
            echo "<th>"; echo "Leverancier";        echo "</th>";
            echo "<th>"; echo "Datum toegevoegd";   echo "</th>";
            echo "</tr>";

            // Hier wordt de data uit de database gehaald en in de overzicht geplaats.
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row["contract_naam"];        echo "</td>";
                echo "<td>"; ?> <a href="admin/<?php echo $row["contract_bestand"]; ?>">Klik hier voor contract</a> <?php echo "</td>";
                echo "<td>"; echo $row["contract_leverancier"]; echo "</td>";
                echo "<td>"; echo $row["contract_uploaded"];    echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            ?>

        </div>
    </div>
</div>



        <a href='#'>Klik hier om terug te gaan</a>

</html>
