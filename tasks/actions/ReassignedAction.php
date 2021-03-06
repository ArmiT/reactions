<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class ReassignedAction sets "task unassigned from you" notification code
 * to the old performer's ID and "task assigned to you" notification code
 * to the performer ID.
 */
class ReassignedAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        return $this->task->isAttributeChanged('performer_id');
    }

    public function execute(): void
    {
        $this->reaction->set(
            $this->task->getOldAttribute('performer_id'),
            TaskChangeAction::NOTIFY_UNASSIGNED_FROM_YOU
        );
        $this->reaction->set(
            $this->task->performer_id,
            TaskChangeAction::NOTIFY_ASSIGNED_TO_YOU
        );
    }
}
