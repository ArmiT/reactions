<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system\tasks\actions;

use reaction_system\tasks\TaskChangeAction;

/**
 * Class NewAction.
 *
 * @package reaction_system\tasks\actions
 */
class NewAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        /*  */
        return $this->task->isNewRecord && $this->task->performer_id;
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
        $this->isHandled = true;
    }
}
