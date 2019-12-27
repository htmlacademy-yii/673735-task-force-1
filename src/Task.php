<?php
namespace taskforce;

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

    private $current_status = self::STATUS_NEW;
    private $current_action = self::ACTION_RESPOND;

    private $status_titles = array(
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_DONE => 'Выполнено',
        self::STATUS_FAILED => 'Провалено'
    );
    private $action_titles = array(
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_RESPOND => 'Откликнуться',
        self::ACTION_MARK_AS_DONE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться'
    );
    private $worker_actions_by_status = array(
        self::STATUS_NEW => array(self::ACTION_RESPOND),
        self::STATUS_CANCELED => null,
        self::STATUS_IN_WORK => array(self::ACTION_REFUSE),
        self::STATUS_DONE => null,
        self::STATUS_FAILED => null
    );

    private $client_actions_by_status = array(
        self::STATUS_NEW => array(self::ACTION_CANCEL),
        self::STATUS_CANCELED => null,
        self::STATUS_IN_WORK => array(self::ACTION_MARK_AS_DONE),
        self::STATUS_DONE => null,
        self::STATUS_FAILED => null
    );

    public function __construct($workerId, $clientId)
    {
        $this->workerId = $workerId;
        $this->clientId = $clientId;
    }

    public function getStatusTitle($status) {
        return $this->status_titles[$status];
    }

    public function getActionTitle($action) {
        return $this->action_titles[$action];
    }

    public function getCurrentStatus() {
        return $this->current_status;
    }

    public function getCurrentAction() {
        return $this->current_action;
    }

    public function getAvailableActions($status, $isWorker) {
        if ($isWorker) {
            return $this->worker_actions_by_status[$status];
        } else {
            return $this->client_actions_by_status[$status];
        }
    }
}
