<?php

session_start();


session_destroy();


header("Location: ../templates/loginform.php");
exit();
?>
