<?php

/**
 * @author Артем
 * @date 10.08.2015
 * @project reaction_system
 *
 * @package
 * @subpackage
 */

namespace reaction_system\tasks\actions;

use reaction_system\tasks\TaskChangeAction;

/**
 * Проверяет
 * Class AssignToMeAction.
 *
 * @package reaction_system\tasks\actions
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
