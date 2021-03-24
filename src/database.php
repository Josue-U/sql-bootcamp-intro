<?php

try {
    $db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306","root","root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    echo $e->getMessage();
    exit;
}