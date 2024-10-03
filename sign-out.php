<?php
include("session_include.php");
session_unset();
session_destroy();
header("location:index.php");
?>