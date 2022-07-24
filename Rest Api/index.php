<?php
/**
 * @var $connect;
 **/

// CORS заголовки + JSON Представление
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credential: true');
header('Content-type: json/application');

// Подключение сторонних файлов
require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$url = $_GET['q'];
$params = explode('/',$url);

$type = $params[0]; //Сам метод
isset($params[1]) ? $id = $params[1]: "";

switch ($method) {
    case 'GET':
        if($type === 'posts') {
            if (isset($id)) {
                getPost($connect, $id);
            } else {
                getPosts($connect);
            }
        }
    break;
    case 'POST':
        if($type === 'posts') {
            addPost($connect, $_POST);
        }
    break;
    case 'PATCH':
        if($type === 'posts') {
            if (isset($id)) {
                $data = file_get_contents('php://input');
                $data = json_decode($data, true); // Преобразование Json массива в ассоциативный
                changePost($connect, $id, $data);
            }
        }
    break;
    case 'DELETE':
        if($type === 'posts') {
            if (isset($id)) {
                deletePost($connect, $id);
            }
        }
    break;
    }