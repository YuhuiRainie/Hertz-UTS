<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<head>
    <title>UTS Car Renting</title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <h2 style="color: white">Yuhui Liu's Renting car system</h2>
    </ul>
    <div style="position: absolute;right: 10px;top: 5px;">
        <ul class="nav navbar-nav navbar-right hidden-sm" >
            <form action="car_main_page.html">

                <input type="submit"class="btn btn-light"value="Back">
            </form>
        </ul>
    </div>
</nav>


<div class="cartDetails">
    <div class="container">
        <div class="col-sm-12" id="cartDetails">
            <div class="head">
                <p></p>
                <h1>Shopping Car</h1>
                <p></p>
               <form action='checkout.php' target='_blank' onsubmit='return quantity_validation()'>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Car</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rent days</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                              <?php
                                    session_start();
                                    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
			                                echo "<tr><th>the car is empty please add one item in first!</th>></tr>>";
			                                echo  "<script language='JavaScript'>alert('the car is empty please add one item in first!');</script>";
//                                            header("Location: car_main_page.html");
		                             }
                                    else{
//
                                        $totalMony = 0;
                                        foreach ($_SESSION['cart'] as $key=>$value){

                                            $content =  '<tr>' .
                                                '<td>'.$value['id'].'</td>'.
                                                '<td>'.'<img src="'.$value[Model].'.jpg" width = "65px" height="65px">'.'</td>'.
                                                '<td>'.$value['Brand']."-".$value['Model']."-".$value['Year'].'</td>'.
                                                '<td>'.$value['PricePerDay'].'</td>'.
                                                '<td>'.'<input name="rentDay[]"  id="rentDay" type="text" value="'.$value["rentDay"].'">'.'</td>'.
                                                '<td>'.'<a href="clearCar.php?id='.$value['id'].'">'.Delete.'</a>'.'</td>'.
                                                '</tr>';
                                            echo $content;

                                        }
                                    }


                              ?>


                        </tbody>
                    </table>
                   <input type="submit"  id = "checkOutButton" class = "btn btn-danger" value="check out">
               </form>
            </div>
        </div>
    </div>
</div>
</body>

<hr>
<footer>
    <p align="middle">&copy; 2019 YUHUI LIU</p>
</footer>

</html>

<script language="JavaScript">
    function quantity_validation() {
        var rentDay = parseInt(document.querySelector("#rentDay").value);


        if(rentDay < 0 || rentDay == 0 || isNaN(rentDay)){
            alert("please input a valid number");
            return false;
        }
        return true;
    }

</script>
