

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
<input type="submit" name="submit" value="Start Game">
    </form><br><br>


    <?php



if(isset($_POST['submit']))
{

    $tiles_to_be_clean =array(7,12,14,18,21,24,25,28,34,38,40,43,45,49,52,55,59,62); // array having all the tiles to be clear

    // initialing all variable
$battery_capacity =1000;
$movement_count =1;
$intial_points =0;
$points_gain=0;
$points_lost=0;
$message ='';




while($battery_capacity>=$movement_count) 
{

$number_of_tiles = rand(1,64); // generating all the Tiles

$movement_count++;
$points_lost+=10;

if(in_array($number_of_tiles,$tiles_to_be_clean) ==true) // checking if the tile number generated is found in the array 
{

unset($tiles_to_be_clean[array_search($number_of_tiles,$tiles_to_be_clean)]); // if Tile number is found I am removing the Tile number in the array
$points_gain+=250;
if(count($tiles_to_be_clean) == 0 && ($movement_count<1000)) // checking if all the 18 tiles have been clean
{

    $message ='You have Won the Game';  // Display this message if the games is completed successfully
    break;
}
else
{
    $message = "Sorry You did not win the Game Try Again Next Time"; // Display this message if the games is not completed 
}

}

}


//echo "number of movement $movement_count<br>";
echo "Number of point Gain =  $points_gain<br>";
echo "Number of point Lost =  $points_lost<br>";
echo "Number of Movement before cleaning all Tiles  =  $movement_count<br>";
echo  "$message";
}


?>
</body>
</html>