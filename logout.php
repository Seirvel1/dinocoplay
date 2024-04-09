<?php
session_start();
session_destroy(); // Закрытие сессии

// Перенаправление на главную страницу (или другую страницу)
header("Location: index.php");
exit();
?>
