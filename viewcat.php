<?php
require("config.php");
session_start();
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if(isset($_GET['id']) == TRUE) {
    if(is_numeric($_GET['id']) == FALSE) {
        $error = 1;
    }
    if($error == 1) {
        header("Location: " . $config_basedir . "/viewcat.php");
    } else {
        $validcat = $_GET['id'];
    }
} else {
    $validcat = 0;
}

$sql = "SELECT * FROM categories;";

$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_assoc($result)) {
    if($validcat == $row['id']) {
        echo "<strong>" . $row['cat'] . "</strong><br />";
        $entriessql = "SELECT * FROM entries WHERE cat_id = " . $validcat .
                     " ORDER BY dateposted DESC;";
        $entriesres = mysql_query($entriessql);
        $numrows_entries = mysql_num_rows($entriesres);
        echo "<ul>";
    if($numrows_entries == 0) {
        echo "<li>No entries!</li>";
    } else {
        while($entriesrow = mysql_fetch_assoc($entriesres)) {
            echo "<li>" . date("D jS F Y g.iA", strtotime($entriesrow
            ['dateposted'])) .
            " - <a href='viewentry.php?id=" . $entriesrow['id'] . "'>" .
            $entriesrow['subject'] ."</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "<a href='viewcat.php?id=" . $row['id'] . "'>" . $row['cat'] .
         "</a><br />";
    }
}
require("footer.php");
?>