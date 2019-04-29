<?PHP
include "AvisC.php";
include "Avis.php";
$Avis1C=new AvisC();
$listeAvis=$Avis1C->afficherAviss();
$i1=0;
$i2=0;
$i3=0;
$i4=0;
$i5=0;
$a=0;
//var_dump($listeAviss->fetchAll());
?>

<?PHP
foreach($listeAvis as $row){
  $a++;
  if($row['note']==1)
  {
    $i1++;
  }
  elseif ($row['note']==2) {
    $i2++;
  }
  elseif ($row['note']==3) {
    $i3++;
  }
  elseif ($row['note']==4) {
    $i4++;
  }
  elseif ($row['note']==5) {
    $i5++;
  }
}
	?>
                    <tr>
                                    <td>5 Etoiles  <?php echo $i5; ?> vote(s)</td>
                                    
                    </tr>
                    <tr>
                                    <td>4 Etoiles  <?php echo $i4; ?> vote(s)</td>
                                    
                    </tr>
                    <tr>
                                    <td>3 Etoiles  <?php echo $i3; ?> vote(s)</td>
                                    
                    </tr>
                    <tr>
                                    <td>2 Etoiles  <?php echo $i2; ?> vote(s)</td>
                                    
                    </tr>
                    <tr>
                                    <td>1 Etoile  <?php echo $i1; ?> vote(s)</td>
                                    
                    </tr>
                    <tr>
                                    <td>Note globale : <?php $i=0; if($a!=0){$i=($i5*5+$i4*4+$i3*3+$i2*2+$i1)/$a;} echo $i; ?> votes</td>
                                    
                    </tr>
