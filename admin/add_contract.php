<?php
/**
 * Created by PhpStorm.
 * User: JordyC
 * Date: 11-12-2017
 * Time: 11:11
 */
include "database.php"
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Voeg project toe</h2>
        <div class="block">

            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <td>Contract naam</td>
                        <td><input type="text" name="pnm" value=""></td>
                    </tr>
                    <tr>
                        <td>Leverancier</td>
                        <td><input type="text" name="lev" value=""></td>
                    </tr>
                    <tr>
                        <td>Contract bestand</td>
                        <td><input type="file" name="bestand"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit1" value="Contract toevoegen"></td>
                    </tr>


                </table>


            </form>

            <?php
            // Hier wordt een random naam gegeven aan de bestandsnaam.
            if(isset($_POST["submit1"]))
            {
                $v1=rand(1111,9999);
                $v2=rand(1111,9999);

                $v3=$v1.$v2;

                $v3=md5($v3);


                $fnm=$_FILES["bestand"]["name"];
                $dst="./contracten/".$v3.$fnm;
                $dst1="contracten/".$v3.$fnm;
                move_uploaded_file($_FILES["bestand"]["tmp_name"],$dst);



                mysqli_query($link,"INSERT INTO contract_db.contract (contract_naam, contract_leverancier, contract_bestand) 
                                          VALUES('$_POST[pnm]','$_POST[lev]','$dst1')");


            }

            ?>


        </div>
    </div>
    <a href="dashboard.php">Klik hier om naar de dashboard te gaan</a>
    <br>
    <a href="display_contract.php">Klik hier om naar de contracten overzicht te gaan</a>