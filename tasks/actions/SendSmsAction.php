<?php

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 *
 * @package
 * @subpackage
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Проверяет
 * Class AssignToMeAction.
 *
 * @package cncltd\reactions\tasks\actions
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
        foreach ($this->reaction->getList() as $userId => $notificationName) {
            $this->notify($userId, $notificationName);
        }
    }

    public function notify($userId, $notificationName)
    {
        /* some code for sending */
    }
}
