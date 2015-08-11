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
class AssignedToAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        return (
            $this->task->isAttributeChanged('performer_id') &&
            $this->task->performer_id !== null
        );
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->reaction->set(
            $this->task->performer_id,
            TaskChangeAction::NOTIFY_ASSIGNED_TO_YOU
        );
    }
}
