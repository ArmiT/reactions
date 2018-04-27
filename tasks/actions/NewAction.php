<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class NewAction sets "task assigned to you" notification code
 * to the performer ID.
 */
class NewAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        return $this->task->isNewRecord && $this->task->performer_id;
    }

    public function execute(): void
    {
        $this->reaction->set(
            $this->task->performer_id,
            TaskChangeAction::NOTIFY_ASSIGNED_TO_YOU
        );
    }
}
