<?php






include("config.php");




$name=$_GET["name"];
#be sure to salt your hash
$check_key=strtolower( hash('sha256', $_GET["key"]   ) );



//CREATE TABLE `treelose_data`.`Inv_page_3` ( `id` TEXT NOT NULL , `time` TIMESTAMP NOT NULL , `disc` TEXT NOT NULL , `name` TEXT NOT NULL , `remov` TEXT NOT NULL , `inserted` TEXT NOT NULL , `user` TEXT NOT NULL ) ENGINE = MyISAM; 

//CREATE TABLE `Inv_page_5` ( `id` TEXT NOT NULL , `time` TIMESTAMP NOT NULL , `disc` TEXT NOT NULL , `name` TEXT NOT NULL , `into` TEXT NOT NULL ,`removed_from` TEXT NOT NULL ,`remov` TEXT NOT NULL , `inserted` TEXT NOT NULL , `user` TEXT NOT NULL ) ENGINE = MyISAM;



$sql = "SELECT * FROM `inv_uname` WHERE `uname` LIKE '".$name."' ORDER BY `hash` DESC";



$result = $conn->query($sql);
if ($result->num_rows==1) {

    	

    	$sql="UPDATE `inv_uname` SET `pass` = '".$check_key."' WHERE `uname` = '".$name."';";
        $result = $conn->query($sql);

    
}
else{

    $sql="INSERT INTO `inv_uname` (`uname`, `pass`, `time`) VALUES ('".$name."', '".$check_key."', CURRENT_TIMESTAMP);";
    $result = $conn->query($sql);
}




?>

<form action="">

    <label for="login">User Name</label><br>
    <input type="uname" id="itemid" name="name" class="button" value=""><br>

    <label for="login">Password</label><br>
    <input type="text" id="password" name="key" class="button" value=""><br>

    <input type="submit" value="Submit" class="button"></br>
</form> 

<?php echo $sql;?>;






