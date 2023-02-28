<?php
require_once ('Test.php');
$test = new Test(10,5);
$test->setNombre1(8);
$test->setNombre2(22);
var_dump($test->getTotal());

/*require_once ('confConnect.php');
require_once ('./repository/PageRepository.php');
require_once ('userList.php');
require_once ('ManageSql.php');
$manageSql = new ManageSql();
$userRepository = new PageRepository($manageSql);
$login = 'testObj@testObj.fr';

$testObj = $userRepository->findLogin($login);
var_dump($testObj);*/


