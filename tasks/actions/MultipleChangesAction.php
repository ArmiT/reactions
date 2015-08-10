<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system\tasks\actions;

/**
 * Class MultipleChangesAction
 * @package reaction_system\tasks\actions
 */
class MultipleChangesAction extends TaskChangeAction
{

    public function checkNecessity()
    {
        return ($this->task->getDirtyAttributes($this->relevantAttributes) > 1);
    }

    public function execute()
    {
        $this->reaction->set($this->task->author_id, TaskChangeAction::NOTIFY_TASK_UPDATED);
        if($this->task->performer_id !== null)
            $this->reaction->set($this->task->performer_id, TaskChangeAction::NOTIFY_TASK_UPDATED);
    }

}