



<form action="">
    <label for="login">itemid</label><br>
    <input type="uname" id="itemid" name="item_id" class="user" value=""><br>



    <input type="submit" value="Submit" class="button"></br>
</form> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<!-- (B) GENERATE QR CODE HERE -->

url=
<?php echo "http://alexhaussmann.com/adhaussmann/inventory/item_page.php?id=".$_GET["item_id"].""; ?>
</br>
</br>
<div id="qrcode"></div>

<!-- (C) CREATE QR CODE ON PAGE LOAD 
item2
-->
<script>
	window.addEventListener("load", function(){
	  var qrc = new QRCode(document.getElementById("qrcode"), <?php echo "\"http://alexhaussmann.com/adhaussmann/inventory/item_page.php?id=".$_GET["item_id"]."\""; ?> );
	});

</script>





