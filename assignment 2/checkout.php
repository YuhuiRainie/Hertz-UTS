<?php
session_start();

$total = 0;
$rentalDays = $_REQUEST["rentDay"];
$index = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $_SESSION["cart"][$key]["rentDay"] = $rentalDays[$index];
    $total += $rentalDays[$index++] * $value["PricePerDay"];
}
$_SESSION["total"]=$total;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTS Renting car system</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <h2 style="color: white">Yuhui Liu's Renting car system</h2>
    </ul>

</nav>

<div class="container">
    <h2>Check Out</h2>
    <p>Please fill in your personal information</p>
    <form name="form1" id="form1" method="post" action="sendEmail.php" onsubmit='return validate()'>
        <div class="form-group">
            <label for="usr">Name<span style="color:red">*</span>:</label>
            <input type="text" class="form-control" id="usr" name="username">
        </div>

        <div class="form-group">
            <label for="pwd">Email<span style="color:red">*</span>:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Address Line1<span style="color:red">*</span>:</label>
            <input type="text" class="form-control" id="address1" name="address1">
        </div>
        <div class="form-group">
            <label for="pwd">Address Line2:</label>
            <input type="text" class="form-control" id="address2" name="address2">
        </div>
        <div class="form-group">
            <label for="pwd">City<span style="color:red">*</span>:</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="form-group">
            <label for="pwd">State<span style="color:red">*</span>:</label>
            <select id="state">
                <option value="NSW">NSW</option>
                <option value="Victory">Victory</option>
                <option value="Queensland">Queensland</option>
                <option value="Northern Territor">Northern Territory</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Post Code<span style="color:red">*</span>:</label>
            <input type="text" class="form-control" id="post" name="post">
        </div>
        <div>
        <label for="pwd">Payment Type<span style="color:red">*</span>:</label>
            <select id="paymentType">
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="AliPay">AliPay</option>
                <option value="AmericanExpress">AmericanExpress</option>
            </select>
        </div>
        <h1>The total money is <?php echo $total;?></h1>
        <div align="right">

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>






    </form>
</div>
<hr>
<footer>
    <p align="middle">&copy; 2019 YUHUI LIU</p>
</footer>


</body>
</html>
<script type="text/javascript">
    function validate()
    {
        var name = document.querySelector("#usr").value.toString();
        var email = document.querySelector("#email").value.toString();
        var suburb = document.querySelector("#address1").value.toString();
        var state = document.querySelector("#state").value.toString();
        var post = document.querySelector("#post").value.toString();
        var payment = document.querySelector("#paymentType").value.toString();

        if(name.length != 0 && post.length != 0 && state.length != 0 && payment.length != 0 && suburb.length !=0 && email.length != 0){
            var email_pattern = /^[a-zA-Z0-9\._\-]+@[a-zA-Z-\.]+\.(com|net|org|gov|edu)(\.(au|us|hk\cn))?$/;
            if (!email_pattern.test(email)) {
                alert("Email address is not Valid!");
                return false;
            }
        }
        else{
            alert("All textfilds with astrisk must be filled!");
            return false;
        }

        alert("Dear customer: order complete!");
        return true;
    }
</script>