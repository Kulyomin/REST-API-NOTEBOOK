<?php

// Получения всех постов
function getPosts($connect) {
    $posts = mysqli_query($connect , 'SELECT * FROM `notebook` ');
    $postsList = []; // Массив со всеми постами
    // Возвращаем каждый пост в виде оссоциативного массива и помещаем его ранее созданный массив
    while($post = mysqli_fetch_assoc($posts)) {
        $postsList[] = $post;
    }
    echo json_encode($postsList);
}

// Получение поста по id
function getPost($connect, $id) {
    $post = mysqli_query($connect , "SELECT * FROM `notebook` WHERE `id` = '$id' ");

    if(mysqli_num_rows($post) === 0) {
        http_response_code(404);// Возвращаем код ошибки в случае отсутствия поста
        $res = [
            "status" => false,
            "message" => "Post not found"
        ];
        echo json_encode($res);
    } else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}

// Добавление поста
function addPost($connect, $data) {
    $name = $data['name'];
    $surname = $data['surname'];
    $mdname = $data['mdname'];
    $company = $data['company'];
    $email = $data['email'];
    $number = $data['number'];
    $date = $data['date'];

    mysqli_query($connect, "INSERT INTO `notebook` (`id`, `name`, `surname`, `mdname`, `company`, `email`,
        `number`, `date`) VALUES (NULL, '$name', '$surname', '$mdname', '$company', '$email', '$number', '$date') ");

    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];
    echo json_encode($res);
}

// Изменение поста
function changePost($connect, $id, $data) {
    $name = $data['name'];
    $surname = $data['surname'];
    mysqli_query($connect, "UPDATE `notebook` SET `name` = '$name',`surname` = '$surname' WHERE `notebook`.`id` = '$id' ");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "Post is updated"
    ];
    echo json_encode($res);
}

// Удаление поста
function deletePost($connect, $id) {
    mysqli_query($connect, "DELETE FROM `notebook` WHERE `notebook`.`id` = '$id' ");
    http_response_code(410);
    $res = [
        "status" => true,
        "message" => "Post is deleted"
    ];
    echo json_encode($res);
}