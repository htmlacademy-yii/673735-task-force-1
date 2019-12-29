<?php
namespace TaskForce\Components;

class Task
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELED = 'canceled';
    const STATUS_IN_WORK = 'in-work';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';

    const ACTION_CANCEL = 'cancel';
    const ACTION_RESPOND = 'respond';
    const ACTION_MARK_AS_DONE = 'mark-as-done';
    const ACTION_REFUSE = 'refuse';

    private $workerId;
    private $clientId;

    private $currentStatus = self::STATUS_NEW;
    private $currentAction = self::ACTION_RESPOND;

    private $statusTitles = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_DONE => 'Выполнено',
        self::STATUS_FAILED => 'Провалено'
    ];
    private $actionTitles = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_RESPOND => 'Откликнуться',
        self::ACTION_MARK_AS_DONE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться'
    ];
    private $workerActionsByStatus = [
        self::STATUS_NEW => array(self::ACTION_RESPOND),
        self::STATUS_CANCELED => null,
        self::STATUS_IN_WORK => array(self::ACTION_REFUSE),
        self::STATUS_DONE => null,
        self::STATUS_FAILED => null
    ];

    private $clientActionsByStatus = [
        self::STATUS_NEW => array(self::ACTION_CANCEL),
        self::STATUS_CANCELED => null,
        self::STATUS_IN_WORK => array(self::ACTION_MARK_AS_DONE),
        self::STATUS_DONE => null,
        self::STATUS_FAILED => null
    ];

    public function __construct($workerId, $clientId)
    {
        $this->workerId = $workerId;
        $this->clientId = $clientId;
    }

    public function getStatusTitle($status) {
        return $this->statusTitles[$status];
    }

    public function getActionTitle($action) {
        return $this->actionTitles[$action];
    }

    public function getCurrentStatus() {
        return $this->currentStatus;
    }

    public function getCurrentAction() {
        return $this->currentAction;
    }

    public function getAvailableActions($status, $isWorker) {
        return $isWorker ? $this->workerActionsByStatus[$status] : $this->clientActionsByStatus[$status];
    }
}
