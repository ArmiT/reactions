<?php

declare(strict_types=1);

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;
use SmsSender;

/**
 * Class SendSmsAction sends SMS messages to the users.
 */
class SendSmsAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        return (bool) \count(
            $this->reaction->getList()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        foreach ($this->reaction->getList() as $userId => $notificationCode) {
            $this->notify($userId, $notificationCode);
        }
    }

    /**
     * Notifies a user by SMS.
     *
     * @param int    $userId           the ID of the user to notify
     * @param string $notificationCode notification code
     */
    public function notify($userId, $notificationCode)
    {
        if (!$userId) {
            return;
        }

        SmsSender::send($userId, $notificationCode);
    }
}
