<?php

require "init.php";

session_destroy();
header("location: index.php");