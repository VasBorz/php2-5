<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>
	<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Читать текст</a> |
		<a href="index.php?c=page&act=edit">Редактировать текст</a> |
        <?php if (isset($_SESSION['user'])){
            echo '<a href="index.php?c=user&act=logout">Выйти</a>';
        }else{
            echo '<a href="index.php?c=user&act=auth">Логин</a>' . ' | ' .'<a href="index.php?c=user&act=reg">Регистрация</a>';
        }?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</body>
</html>
