<?php
require("config.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title><?php echo $config_blogname; ?></title>
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
</head>
<body>
<div id="header">
    <h1><?php echo $config_blogname; ?></h1>
    [<a href="index.php">home</a>]
</div>
<div id="main">