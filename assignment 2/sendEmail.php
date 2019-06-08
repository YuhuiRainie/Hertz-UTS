<?php
$message = "Dear customer,\n Thanks for renting cars from Hertz-UTS, There are the order details:\n";
session_start();
$total_price = 0;
$number = 0;

 $message .= '<table class="table">'.
                        '<thead class="thead-light">'.
                        '<tr>'.
                            '<th scope="col">Car</th>'.
                            '<th scope="col">Miles</th>'.
                            '<th scope="col">Fuel Type</th>'.
                            '<th scope="col">Seat</th>'.
                            '<th scope="col">Price</th>'.
                            '<th scope="col">Rent days</th>'.

                        '</tr>'.
                        '</thead>'.
                        '<tbody>';


                                    if(isset($_SESSION['cart']) ){

                                        $totalMony = 0;
                                        foreach ($_SESSION['cart'] as $key=>$value){

                                            $message .=  '<tr>' .
                                                '<td>'.$value['Brand']."-".$value['Model']."-".$value['Year'].'</td>'.
                                                '<td>'.$value['Mileage'].'</td>'.
                                                '<td>'.$value['FuelType'].'</td>'.
                                                '<td>'.$value['Seats'].'</td>'.

                                                '<td>'.$value['PricePerDay'].'</td>'.
                                                '<td>'.$value["rentDay"].'</td>'.
                                                '<td>'.$value['PricePerDay'] * $value["rentDay"] .'</td>'.
                                                '</tr>';

                                        }
		                             }

//






$message .=  '</tbody>';
$message .=   '</table>';
$message .= 'Hope you can be happy with the car'.
    'Thanks! Yuhui Liu';
$email_address=$_REQUEST["email"];
$name=$_REQUEST["name"];
$to = $email_address;
$subject = "Thanks for renting cars in Yuhui's Renting car company";



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
session_destroy();
?>