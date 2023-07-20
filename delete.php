<?php

include __DIR__ . '/inc/header.php';
include __DIR__ . '/functions.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
  deleteUser($_GET['id']);
  header("location:index.php");
}
