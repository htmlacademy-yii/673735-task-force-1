<?php
use TaskForce\components\Task;

require_once 'vendor/autoload.php';

$task = new Task(0, 0);

$test1 = assert($task->getCurrentStatus() === Task::STATUS_NEW, 'Task status doesn\'t match');
$test2 = assert($task->getStatusTitle($task->getCurrentStatus()) === 'Новое', 'Task status title doesn\'t match');
$test3 = assert($task->getCurrentAction() === Task::ACTION_RESPOND, 'Task action doesn\'t match');
$test4 = assert($task->getActionTitle($task->getCurrentAction()) === 'Откликнуться', 'Task action title doesn\'t match');
$test5 = assert($task->getAvailableActions($task->getCurrentStatus(), true) === [Task::ACTION_RESPOND], 'Task available actions for worker don\'t match');
$test6 = assert($task->getAvailableActions($task->getCurrentStatus(), false) === [Task::ACTION_CANCEL], 'Task available actions for client don\'t match');
