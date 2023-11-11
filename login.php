<?php
require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/FormSanitizer.php");
// TODO: inlclude FormSanitizer class

$account = new Account($con);

if(isset($_POST["submitButton"])) {

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome to DisneyMinus</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>
<body>

<div class="signInContainer">

    <div class="column">

        <div class="header">
            <img src="assets/images/logo.png" title="Logo" alt="Site logo" />
            <h3>Sign In</h3>
            <span>to continue to Netflux</span>
        </div>

        <form method="POST">
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" name="submitButton" value="SUBMIT">

        </form>

        <a href="register.php" class="signInMessage">Need an account? Sign up here!</a>

    </div>

</div>

</body>
</html>