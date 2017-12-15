<?php
/**
 * Created by PhpStorm.
 * User: JordyC
 * Date: 11-12-2017
 * Time: 12:29
 */
include "database.php"
?>

<?php
$id=$_GET["id"];
$res=mysqli_query($link,"select * from contract where id=$id");
while ($row=mysqli_fetch_array($res))
{
    //hier wordt de data aan een variable gekoppeld.
    $contract_naam=$row["contract_naam"];
    $contract_leverancier=$row["contract_leverancier"];
    $contract_bestand=$row["contract_bestand"];
}
?>
        <!--Hier wordt de informatie van de project weergegeven, de data wordt uit de database gehaald en
        met een echo statement weergegeven.-->
    <form name="form1" action="" method="post" enctype="multipart/form-data">
        <div class="grid_10">
            <div class="box round first">
                <h2>Wijzig contract</h2>
                <form class="block">
                    <table border="1">
                        <tr>
                            <td colspan="2" align="center">
                                <a href="<?php echo $contract_bestand ?>">Klik hier voor contract</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Contract naam</td>
                            <td><input type="text" name="naam" value="<?php echo $contract_naam; ?>"></td>
                        </tr>

                        <tr>
                            <td>Contract leverancier</td>
                            <td><input type="text" name="leverancier" value="<?php echo $contract_leverancier; ?>"></td>
                        </tr>

                        <tr>
                            <td>Contract bestand</td>
                            <td><input type="file" name="contract"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="Wijzigen"></td>
                        </tr>


                    </table>
                </form>
            </div>
        </div>
    <?php
    // Dit is de update functie
    if(isset($_POST["submit1"]))
    {
         $fnm=$_FILES["contract"]["name"];

         //Dit is de update statement als de contract niet veranderd is
         if($fnm=="")
         {
             mysqli_query($link,"update contract set contract_naam='$_POST[naam]',contract_leverancier='$_POST[leverancier]'where id=$id");
         }
         //Dit is de update statement als de contract wel veranderd is
         else
         {
             //random naam aan de afbeelding geven
             $v1=rand(1111,9999);
             $v2=rand(1111,9999);

             $v3=$v1.$v2;

             $v3=md5($v3);

             $fnm=$_FILES["contract"]["name"];
             $dst="./contracten/".$v3.$fnm;
             $dst1="contracten/".$v3.$fnm;
             move_uploaded_file($_FILES["contract"]["tmp_name"],$dst);

             mysqli_query($link,"update contract set contract_bestand='$dst1',contract_naam='$_POST[naam]',contract_leverancier='$_POST[leverancier]'where id=$id");
         }
        ?>
<script type="text/javascript">
window.location="display_contract.php"
</script>

    <?php
    }
    ?>
<?php
?>

