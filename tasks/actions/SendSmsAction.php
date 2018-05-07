<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;
use SmsSender;

/**
 * Class SendSmsAction sends SMS messages to the users.
 */
class SendSmsAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        return (bool) \count(
            $this->reaction->getList()
        );
    }

    public function execute(): void
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
    public function notify(int $userId, string $notificationCode): void
    {
        if (!$userId) {
            return;
        }

        SmsSender::send($userId, $notificationCode);
    }
}
