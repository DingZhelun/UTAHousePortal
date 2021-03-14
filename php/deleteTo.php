<?php
session_start();
if(isset($_SESSION['to']))
{
    unset($_SESSION['to']);
}
?>