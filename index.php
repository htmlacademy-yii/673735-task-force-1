<?php
use taskforce\Task;

require_once 'vendor/autoload.php';

$task = new Task(0, 0);

$test1 = assert($task->getCurrentStatus() == Task::STATUS_NEW, 'new');
$test2 = assert($task->getStatusTitle($task->getCurrentStatus()) == 'Новое');
$test3 = assert($task->getCurrentAction() == Task::ACTION_RESPOND, 'respond');
$test4 = assert($task->getActionTitle($task->getCurrentAction()) == 'Откликнуться');
$test5 = assert($task->getAvailableActions($task->getCurrentStatus(), true) == array(Task::ACTION_RESPOND));
$test6 = assert($task->getAvailableActions($task->getCurrentStatus(), false) == array(Task::ACTION_CANCEL));

var_dump($test1);
var_dump($test2);
var_dump($test3);
var_dump($test4);
var_dump($test5);
var_dump($test6);
