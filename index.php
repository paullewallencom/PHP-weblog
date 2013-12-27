<?php
require("header.php");

$sql = "SELECT entries.*, categories.cat FROM entries, categories
WHERE entries.cat_id = categories.id
ORDER BY dateposted DESC
LIMIT 1;";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

require("footer.php");
?>