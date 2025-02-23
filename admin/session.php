<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/na/admin/index.php');
    exit();
}
?>