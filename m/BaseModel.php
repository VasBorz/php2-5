<?php

abstract class BaseModel
{
    const HOST = 'localhost';
    const USER = 'root';
    const PWD = 'root';
    const DB = 'users';

    protected function connect(){
       $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB;
       $pdo = new PDO($dsn, self::USER, self::PWD);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}