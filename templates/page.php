<?php
function drawInitPage(string $title = 'Ejercicio php') : string{
	return 
	'<!DOCTYPE html>
	<html lang="es">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>'.$title.'</title>
			<link rel="stylesheet" href="../styles/styles.css">
	</head>
	<body>';
}

function drawEndPage() : string{
	return
	'</body>
	</html>';
}

function drawHeader(string $h1_text = 'Ejercicio.php') : string {
	return
	'<header class="header-page">
        <h1 class="title-page">'.$h1_text.'</h1>
  </header>';
}

function drawInitConsole(){
	return '<article class="console">';
}

function drawEndConsole(){
	return '</article>';
}

function initPage(string $title = 'Ejercicio php'){
	echo drawInitPage($title);
	echo drawHeader($title);
	echo drawInitConsole();
}

function endPage(){
	echo drawEndConsole();
	echo drawEndPage();
}

?>