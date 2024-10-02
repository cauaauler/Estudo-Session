<?php
session_start();
session_destroy();
header("location: /crud_login/index.php");