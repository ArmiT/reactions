<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system\tasks\actions;

/**
 * Class AssignToMeAction.
 *
 * @package reaction_system\tasks\actions
 */
class StatusChangedAction extends TaskChangeAction
{
    public function checkNecessity()
    {
        return $this->task->isAttributeChanged('status_id');
    }

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
