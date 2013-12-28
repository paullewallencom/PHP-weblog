<?php
session_start();
require("config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if(isset($_POST['submit'])) {
    $sql = "SELECT * FROM logins WHERE username = '" . $_POST['username'] .
           "' AND password = '" . $_POST['password'] . "';";
    $result = mysql_query($sql) or die(mysql_error());
    $numrows = mysql_num_rows($result);
    if($numrows == 1) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        $_SESSION['USERNAME'] = $row['username'];
        $_SESSION['USERID'] = $row['id'];
        header("Location: " . $config_basedir);
    } else {
        header("Location: " . $config_basedir . "/login.php?error=1");
        }
    } else {
        require("header.php");
        if(isset($_GET['error'])) {
            echo "Incorrect login, please try again!";
        }
}
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Login!"></td>
        </tr>
    </table>
</form>