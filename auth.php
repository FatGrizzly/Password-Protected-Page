<?php
session_start();
/* Detect if the $_SESSION variable has already been set 
(meaning the user has already entered the password during the session) */
if (isset($_SESSION["authed"]) || $_SESSION["authed"] === true) {
    header("location:/protected-page");
    exit(307);
}

$password = "TBMPRODUCTIONS"; // This is where your password goes

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Run code when form is submitted
    if ($_POST["password"] == $password) {
        $_SESSION["authed"] = true; // Set variable to access on protected page
        header("location:/protected-page"); // Redirect to protected page
        exit(307); // Stop all other scripts
    } else {
        $err = "The password you entered was inncorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <title> Enter Password - TBM Productions </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Concert+One|Boogaloo">
    </head>
    <body>
        <!-- Viedo Background -->
        <video autoplay muted loop id="bgvideo">
            <source src="/library/site/assets/videos/lines.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <!-- Form with full screen fallback & opacity -->
        <div class="background">
            <form method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                <div class="labels">
                    <h1> Password Protected Page </h1>
                    <h3 style="font-family: arial;"> Please enter the Password to access the Protected Page. </h3>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Enter Password"/>
                    <input type="submit" value="Enter"/><br>
                    <p style="color: red;"><?php echo $err; ?></p>
                </div>
            </form>
        </div>
    </body>
</html>
