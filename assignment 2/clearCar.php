<html>


<?php
session_start();

$id = $_GET["id"];

if (isset($_SESSION['cart'])){
    unset($_SESSION['cart'][$id]);
}


header("Location: cart.php");
?>
<script language="JavaScript">
    function comfirm(){
        if（window.alert("Do you really want to clear all the products?")）{
            return true;
        }
    else{
            return false;
        }
    }
</script>
</html>
