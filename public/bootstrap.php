<?php

if (!defined('BASE_URL_PATH')) {
    define('BASE_URL_PATH', '/');
}

require_once __DIR__ . '/src/functions.php';
require_once __DIR__ . '/lib/Psr4AutoloaderClass.php';
$loader = new Psr4AutoloaderClass;
$loader->register();
// Các lớp có không gian tên bắt đầu với CT275\Labs nằm ở src
$loader->addNamespace('CT275\Labs', __DIR__ .'/src');

try {
    $PDO = (new CT275\Labs\PDOFactory)->create([
    'dbhost' => 'localhost',
    'dbname' => 'ecommerce',
    'dbuser' => 'root',
    'dbpass' => ''
    ]);
    } catch (Exception $ex) {
    echo 'Không thể kết nối đến MySQL,
    kiểm tra lại username/password đến MySQL.<br>';
exit("<pre>${ex}</pre>");
}