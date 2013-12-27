<?php
require("header.php");

$sql = "SELECT entries.*, categories.cat FROM entries, categories
        WHERE entries.cat_id = categories.id
        ORDER BY dateposted DESC
        LIMIT 1;";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
echo "<h2><a href='viewentry.php?id=" . $row['id']
        . "'>" . $row['subject'] .
        "</a></h2><br />";
echo "<i>In <a href='viewcat.php?id=" . $row['cat_id']
        ."'>" . $row['cat'] .
        "</a> - Posted on " . date("D jS F Y g.iA",
                strtotime($row['dateposted'])) .
        "</i>";
echo "<p>";
echo nl2br($row['body']);
echo "</p>";

require("footer.php");
?>