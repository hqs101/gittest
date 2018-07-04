<?php
    $link = @mysqli_connect(
        'localhost',
        'root',
        '123456',
        'team',
        '3306');
    if(!$link){
        die("Connection mysql error:" . mysqli_error());
    }
