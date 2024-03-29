<?php

// require '../classes/User.class.php';

session_start();

require '../src/models/connection.php';

$availableRoutes = [
	'homepage', 'view_article', 'modification_articles'
];

$route = 'homepage';
if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutes)) {
	$route = $_GET['page'];
}

require  ('../src/views/layout.php');