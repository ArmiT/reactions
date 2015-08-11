<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Class AssignToMeAction.
 *
 * @package cncltd\reactions\tasks\actions
 */
class StatusChangedAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        return $this->task->isAttributeChanged('status_id');
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->reaction->set(
            $this->task->author_id,
            TaskChangeAction::NOTIFY_STATUS_UPDATED
        );

        /*
            Вообще для проверки наличия перформера для отправки ему
            уведомления о смене статуса нужно создавать
            отдельный Action
         */
        if ($this->task->performer_id !== null) {
            $this->reaction->set(
                $this->task->performer_id,
                TaskChangeAction::NOTIFY_STATUS_UPDATED
            );
        }
    }
}
