<?php





include("config.php");


$id=$_GET["id"];


$sqllonger="";
$uname=$_GET["uname"];

$password=$_GET["pass"];




	//$sql="INSERT INTO `Inv_page_3` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `into`, `removed_from` ,`transationid`) VALUES ('".$_GET["item_id"]."', CURRENT_TIMESTAMP, '".$_GET["item_disc"]."', '".$_GET["name"]."', 'NULL', 'NULL', 'NULL');";
	//CREATE TABLE `Inv_page_6` ( `id` TEXT NOT NULL , `time` TIMESTAMP NOT NULL , `disc` TEXT NOT NULL , `name` TEXT NOT NULL , `remov` TEXT NOT NULL , `inserted` TEXT NOT NULL , `user` TEXT NOT NULL , `into` TEXT NOT NULL , `removed_from` TEXT NOT NULL , `transationid` TEXT NOT NULL , UNIQUE (`transationid`(256))) ENGINE = MyISAM; 

	//$sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`,`removed_from`) VALUES ('".$id."', CURRENT_TIMESTAMP, '".$_GET["disc"]."', '".$name."', '".$_GET["remove"]."', 'NULL', '".$uname."','NULL','NULL');";
				
	$inuser="start";
	$sql="SELECT * FROM `Inv_page_6` WHERE `id` LIKE '".$id."' AND `remov` LIKE 'NULL' AND `inserted` LIKE 'NULL' AND `user` LIKE 'NULL' AND `intoit` LIKE 'NULL' AND `removed_from` LIKE 'NULL'; ";
	$result = $conn->query($sql);
	$name="item not found".$sql;
	if ($result->num_rows==1) {
		
		while($row = $result->fetch_assoc() ) {
			$dic=$row["disc"];
			$name=$row["name"];

	    }

	    		

	    $sql = "SELECT * FROM `inv_uname` WHERE `uname` LIKE '".$uname."' AND `pass` LIKE '".strtolower( hash('sha256',$password))."';";
	    $inuser="this".$sql;
		$result = $conn->query($sql);

		if ($result->num_rows!=0) {
			$inuser="wein".$sql;
			if ($_GET["remove"]!="") {

				$bytes = openssl_random_pseudo_bytes(256);
				//making randome name
				$rando = base64_encode($bytes);

				$nameofkey= hash('sha256',$rando );

				$sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`,`removed_from`, `transationid`) VALUES ('".$id."', CURRENT_TIMESTAMP, '".$_GET["disc"]."', '".$name."', '".$_GET["remove"]."', 'NULL', '".$uname."','NULL','NULL','".$nameofkey."');";
				$result = $conn->query($sql);
				$sqllonger=$sqllonger.$sql."</br>";



				$sql="SELECT * FROM `Inv_page_6` WHERE `id` LIKE '".$_GET["remove"]."' AND `remov` LIKE 'NULL' AND `inserted` LIKE 'NULL' AND `user` LIKE 'NULL' AND `intoit` LIKE 'NULL' AND `removed_from` LIKE 'NULL';  ";
				$result = $conn->query($sql);

				$newname="noitem";
				if ($result->num_rows==1) {
					
					while($row = $result->fetch_assoc() ) {
						$newname=$row["name"];

				    }
				}

				$bytes = openssl_random_pseudo_bytes(256);
				//making randome name
				$rando = base64_encode($bytes);

				$nameofkey= hash('sha256',$rando );



				$sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`,`removed_from`, `transationid`) VALUES ('".$_GET["remove"]."', CURRENT_TIMESTAMP, '".$_GET["disc"]."', '".$newname."', 'NULL', 'NULL', '".$uname."','NULL','".$id."','".$nameofkey."');";
				
				$result = $conn->query($sql);
				$sqllonger=$sqllonger.$sql."</br>";




			}






			if ($_GET["insert"]!="") {


			$sql="SELECT * FROM `Inv_page_6` WHERE `id` LIKE '".$_GET["insert"]."' AND `remov` LIKE 'NULL' AND `inserted` LIKE 'NULL' AND `user` LIKE 'NULL' AND `intoit` LIKE 'NULL' AND `removed_from` LIKE 'NULL'; ";
				$result = $conn->query($sql);

				$newname="noitem";
				if ($result->num_rows==1) {
					
					while($row = $result->fetch_assoc() ) {
						$newname=$row["name"];

				    }
				}


				$bytes = openssl_random_pseudo_bytes(256);
				//making randome name
				$rando = base64_encode($bytes);

				$nameofkey= hash('sha256',$rando );

				$sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`,`removed_from`,`transationid`) VALUES ('".$_GET["insert"]."', CURRENT_TIMESTAMP, '".$_GET["disc"]."', '".$newname."', 'NULL', 'NULL', '".$uname."','".$id."','NULL','".$nameofkey."');";
				
				$result = $conn->query($sql);
				$sqllonger=$sqllonger.$sql."</br>";

				$bytes = openssl_random_pseudo_bytes(256);
				//making randome name
				$rando = base64_encode($bytes);

				$nameofkey= hash('sha256',$rando );

				$sql="INSERT INTO `Inv_page_6` (`id`, `time`, `disc`, `name`, `remov`, `inserted`, `user`, `intoit`,`removed_from`,`transationid`) VALUES ('".$id."', CURRENT_TIMESTAMP, '".$_GET["disc"]."', '".$name."', 'NULL', '".$_GET["insert"]."', '".$uname."','NULL','NULL','".$nameofkey."');";
				$result = $conn->query($sql);
				$sqllonger=$sqllonger.$sql."</br>";






			}









		}


	}


	
	else{

		$dic="removed";
	}










	$output="";


	$sql="SELECT * FROM `Inv_page_6` WHERE `id` LIKE '".$id."'   ORDER BY `time` DESC;";
	$result = $conn->query($sql);

	$output="id,disc,name,in,remov,inserted,user,removed_from,time</br>";

	 

	if ($result->num_rows!=0) {
		while($row = $result->fetch_assoc() ) {
				$output=$output.$row["id"].",".$row["disc"].",".$row["name"].",".$row["intoit"].",".$row["remov"].",".$row["inserted"].",".$row["user"].",".$row["removed_from"].",".$row["time"]."</br>";
				//$name=$row["name"];

		}
	}

   












?>

id :<?php echo $id; ?></br></br>

item name <?php echo $name; ?></br>

item dic <?php echo $dic; ?></br>




</br>
</br>
</br>

<form action="">
    <label for="login">id</label><br>
    <label for="login">itemid</label><br>
    <?php echo "<input type=\"uname\" id=\"uname\" name=\"id\" class=\"button\" value=\"".$id."\" >";?><br>
    <label for="login">uname</label><br>
    <?php echo "<input type=\"uname\" id=\"uname\" name=\"uname\" class=\"button\" value=\"".$uname."\" >";?><br>
    <label for="login">password</label><br>
    <?php echo "<input type=\"uname\" id=\"uname\" name=\"pass\" class=\"button\" value=\"".$password."\" >";?><br>
    <label for="login">remove</label><br>
    <input type="text" id="password" name="remove" class="button" value=""><br>
    <label for="login">insert</label><br>
    <input type="text" id="password" name="insert" class="button" value=""><br>
    <label for="login">disc</label><br>
    <input type="text" id="password" name="disc" class="button" value=""><br>






    <input type="submit" value="Submit" class="button"></br>

</br>
</br>
<?php echo $sqllonger; ?>

</form>
</br></br></br></br></br> 
<?php echo $inuser;?>
</br></br></br></br></br>

<?php echo $output; ?>


