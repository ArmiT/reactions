<?php

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 *
 * @package
 * @subpackage
 */

namespace cncltd\reactions\tasks\actions;

use cncltd\reactions\tasks\TaskChangeAction;

/**
 * Проверяет
 * Class AssignToMeAction.
 *
 * @package cncltd\reactions\tasks\actions
 */
class AssignedToAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        return (
            $this->task->isAttributeChanged('performer_id') &&
            $this->task->performer_id !== null
        );
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
