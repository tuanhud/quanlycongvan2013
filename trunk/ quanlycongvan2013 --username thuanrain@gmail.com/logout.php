<?php
session_start();
if (isset($_SESSION['login'])) {
	unset($_SESSION['login']); // Hủy sessionk
}

// trở về trang chủ
header('Location: index.php');
?>