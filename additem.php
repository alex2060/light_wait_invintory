<?php





include("config.php");





$sql="SELECT * FROM `Inv_page_6` WHERE `id` LIKE '".$_GET["item_id"]."' AND `remov` LIKE 'NULL' AND `inserted` LIKE 'NULL' AND `user` LIKE 'NULL' AND `intoit` LIKE 'NULL'; ";
$result = $conn->query($sql);

$output="item not added item id take or no id entered";
if ($result->num_rows==0) {
    
    
        if ($_GET["name"]!="") {

            $bytes = openssl_random_pseudo_bytes(256);
            //making randome name
            $rando = base64_encode($bytes);

            $nameofkey= hash('sha256',$rando );

            $sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`, `removed_from`,`transationid`) VALUES ('".$_GET["item_id"]."', CURRENT_TIMESTAMP, '".$_GET["item_disc"]."', '".$_GET["name"]."', 'NULL', 'NULL', 'NULL','NULL','NULL','".$nameofkey."');";
            
            $result = $conn->query($sql);
            $output="item ".$_GET["item_id"]." entered"." ".$sql;
        }
        

}



?>

<form action="">
    <label for="login">id</label><br>
    <input type="uname" id="uname" name="item_id" class="button" value=""><br>

    <label for="login">disc</label><br>
    <input type="text" id="uname" name="item_disc" class="button" value=""><br>

    <label for="login">name</label><br>
    <input type="text" id="uname" name="name" class="button" value=""><br>

    <input type="submit" value="Submit" class="button"></br>
</form> 

<?php echo $output; ?>
