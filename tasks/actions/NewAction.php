<?php

declare(strict_types=1);

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class NewAction sets "task assigned to you" notification code
 * to the performer ID.
 */
class NewAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
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
    }
}
