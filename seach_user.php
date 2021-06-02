
<?php



include("config.php");


$sql="SELECT * FROM `Inv_page_6` WHERE `user` LIKE '".$_GET["item_id"]."'   ORDER BY `time` DESC;";
$result = $conn->query($sql);

$output="</br>id,disc,name,in,remov,inserted,user,removed_from,time</br>";
$rowmaker="id,disc,name,in,removed,inserted,user,removed_from,time <>";

 

if ($result->num_rows!=0) {
    while($row = $result->fetch_assoc() ) {
            $output=$output.$row["id"].",".$row["disc"].",".$row["name"].",".$row["intoit"].",".$row["remov"].",".$row["inserted"].",".$row["user"].",".$row["removed_from"].",".$row["time"]."</br>";
            $rowmaker=$rowmaker.$row["id"].",".$row["disc"].",".$row["name"].",".$row["intoit"].",".$row["remov"].",".$row["inserted"].",".$row["user"].",".$row["removed_from"].",".$row["time"]." <>";
        
            //$name=$row["name"];

    }
}



?>



      <style>
         table {
         border-collapse: collapse;
         border: 2px black solid;
         font: 12px sans-serif;
         }
         td {
         border: 1px black solid;
         padding: 5px;
         }
      </style>



<form action="">
    <label for="login">user</label><br>
    <input type="uname" id="uname" name="item_id" class="user" value=""><br>



    <input type="submit" value="Submit" class="button"></br>
</form> 

</br></br>
<?php echo $sql; ?>
</br></br></br></br></br>
<div id='container'></div>
</br></br></br></br></br>

<?php echo $output; ?>

<script type="text/javascript"charset="utf-8">
 var data = <?php echo "'".$rowmaker."'";?>;
 var lines = data.split("<>"),
 output = [],
 i;
 for (i = 0; i < lines.length; i++)
 output.push("<tr><td>"
 + lines[i].slice(0,-1).split(",").join("</td><td>")
 + "</td></tr>");
 output = "<table>" + output.join("") + "</table>";
 var div = document.getElementById('container');
 
 div.innerHTML = output;
</script>

