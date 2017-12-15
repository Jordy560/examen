<?php
/**
 * Created by PhpStorm.
 * User: JordyC
 * Date: 11-12-2017
 * Time: 11:30
 */
include "database.php";
?>

<div class="box1">
    <div class="box2">
        <h2>Contracten overzicht</h2>

        <div class="box3">
           <?php

                $res= mysqli_query($link,"select * from contract");

                    //namen van de overzicht
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>"; echo "Contract naam";      echo "</th>";
                    echo "<th>"; echo "Contract bestand";   echo "</th>";
                    echo "<th>"; echo "Leverancier";        echo "</th>";
                    echo "<th>"; echo "Datum toegevoegd";   echo "</th>";
                    echo "<th>"; echo "Verwijderen";        echo "</th>";
                    echo "<th>"; echo "Wijzigen";        echo "</th>";
                    echo "</tr>";

                // Hier wordt de data uit de database gehaald en in de overzicht geplaats.
                while($row=mysqli_fetch_array($res))
                {
                    echo "<tr>";
                    echo "<td>"; echo $row["contract_naam"];        echo "</td>";
                    echo "<td>"; ?> <a href="<?php echo $row["contract_bestand"]; ?>">Klik hier voor contract</a> <?php echo "</td>";
                    echo "<td>"; echo $row["contract_leverancier"]; echo "</td>";
                    echo "<td>"; echo $row["contract_uploaded"];    echo "</td>";
                    echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>">Verwijderen</a> <?php  echo "</td>";
                    echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>">Wijzig</a> <?php  echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";

            ?>

        </div>
    </div>
</div>

<a href="dashboard.php">Klik hier om terug te gaan</a>