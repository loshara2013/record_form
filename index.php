<?php
    # подключение к базе данных
    $mysql = new mysqli("localhost", "*****", "******", "***");
    
    # взятие данных из формы index.html
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    #проверка на заполненость полей формы
    if (trim($name) == '')
        echo "Вы не ввели имя пользователся";
    else if (strlen(trim($name)) <= 1)
        echo "Такого имени не существует";
    else if (trim($email) == '' || trim($pass) == '') 
        echo "Введите все данные";
    else {
        #кодирование для SQL запроса
        $name = "'".$name."'";
        $email = "'".$email."'";
        # хеширование пароля
        $pass = md5($pass);
        $pass = "'".$pass."'";
        
        #отправка в таблицу БД методом query
        $mysql->query("INSERT INTO users1 (name, password, email) VALUES ( $name, $pass, $email);");
    }

    header('Location: index.html');
    exit;