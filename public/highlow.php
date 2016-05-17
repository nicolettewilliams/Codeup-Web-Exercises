<?php
session_start();

if (!isset($_POST["guess"])) {
     $_SESSION["count"] = 0; //Initialize count
     $message = "Guessing Game!";
     $_POST["numtobeguessed"] = rand(0,100);
     echo $_POST["numtobeguessed"];
} else if ($_POST["guess"] > $_POST["numtobeguessed"]) { //greater than
    $message = $_POST["guess"]." is too high. Try a lower number.";
    $_SESSION["count"]++; //Declare the variable $count to increment by 1.

} else if ($_POST["guess"] < $_POST["numtobeguessed"]) { //less than
    $message = $_POST["guess"]." is too low. Try a bigger number!";
    $_SESSION["count"]++; //Declare the variable $count to increment by 1.

} else { // must be equivalent
    $_SESSION["count"]++;
    $message = "You got the answer right in ".$_SESSION["count"]." tries!"; 
    unset($_SESSION["count"]);
        //Include the $count variable to the $message to show the user how many tries to took him.
}
?>
<html>

    <head>
        <title>Guessing Game</title>
    </head>
    <body>
    <h1><?php echo $message; ?></h1>
        <form action="" method="POST">
            <input type="text" name="guess" placeholder="GUESS"></p>
            <input type="hidden" name="numtobeguessed" 
                   value="<?php echo $_POST["numtobeguessed"]; ?>" ></p>
    <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>