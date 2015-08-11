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
class UnassignedFromAction extends TaskChangeAction
{
    /**
     * {@inheritdoc}
     */
    public function checkNecessity()
    {
        return (
            $this->task->isAttributeChanged('performer_id') &&
            $this->task->getOldAttribute('performer_id') !== null
        );
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->reaction->set(
            $this->task->getOldAttribute('performer_id'),
            TaskChangeAction::NOTIFY_UNASSIGNED_FROM_YOU
        );
    }
}
