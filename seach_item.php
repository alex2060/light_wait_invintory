
<?php


include("config.php");





$sql="SELECT * FROM `Inv_page_6` WHERE `name` LIKE '".$_GET["item_id"]."'   ORDER BY `time` DESC;";
$result = $conn->query($sql);

$output="id,disc,name,in,remov,inserted,user,removed_from,time</br>";

 

if ($result->num_rows!=0) {
    while($row = $result->fetch_assoc() ) {
            $output=$output.$row["id"].",".$row["disc"].",".$row["name"].",".$row["intoit"].",".$row["remov"].",".$row["inserted"].",".$row["user"].",".$row["removed_from"].",".$row["time"]."</br>";
            //$name=$row["name"];

    }
}



?>







<form action="">
    <label for="login">name</label><br>
    <input type="uname" id="uname" name="item_id" class="user" value=""><br>



    <input type="submit" value="Submit" class="button"></br>
</form> 
<?php echo $sql; ?>
</br></br></br></br></br>

<?php echo $output; ?>
