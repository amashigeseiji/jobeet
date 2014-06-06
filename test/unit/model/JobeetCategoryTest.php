<?php
include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(1);
$t->comment('this test is always passes');
$t->ok('hoge');
