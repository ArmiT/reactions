<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class MultipleChangesAction sets "task updated" notification code
 * to the users' IDs.
 */
class MultipleChangesAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        $dirtyAttributes =
            $this->task->getDirtyAttributes($this->relevantAttributes);

        return \count($dirtyAttributes);
    }

    public function execute(): void
    {
        $this->reaction->set(
            $this->task->author_id,
            TaskChangeAction::NOTIFY_TASK_UPDATED
        );
        $this->reaction->set(
            $this->task->performer_id,
            TaskChangeAction::NOTIFY_TASK_UPDATED
        );
    }
}
