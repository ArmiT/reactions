<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class MultipleChangesAction sets "task updated" notification code
 * to the users' IDs.
 */
class MultipleChangesAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        $dirtyAttributes =
            $this->task->getDirtyAttributes($this->relevantAttributes);

        return \count($dirtyAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
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
