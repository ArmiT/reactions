<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class StatusChangedAction sets "task status updated" notification code
 * to the users' IDs.
 */
class StatusChangedAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        $dirtyAttributes = $this->task->getDirtyAttributes(
            $this->relevantAttributes
        );

        return count($dirtyAttributes) === 1 &&
            $this->task->isAttributeChanged('status_id');
    }

    public function execute(): void
    {
        $this->reaction->set(
            $this->task->author_id,
            TaskChangeAction::NOTIFY_STATUS_UPDATED
        );
        $this->reaction->set(
            $this->task->performer_id,
            TaskChangeAction::NOTIFY_STATUS_UPDATED
        );
    }
}
