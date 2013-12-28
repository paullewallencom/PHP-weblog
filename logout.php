<?php
session_destroy();
require("config.php");
header("Location: " . $config_basedir);
?>