<?php

/**
 *
 * @author �����
 * @date 10.08.2015
 * @project reaction_system
 * @package
 * @subpackage
 */

namespace reaction_system\tasks\actions;

/**
 * ���������
 * Class AssignToMeAction
 * @package reaction_system\tasks\actions
 */
class UnassignedFromAction extends TaskChangeAction
{

    public function checkNecessity()
    {
        $oldPerformer = $this->task->getOldAttribute('performer_id');
        $newPerformer = $this->performer_id;

        return (
            $this->task->isAttributeChanged('performer_id') &
            $oldPerformer !== NULL &
            $oldPerformer !== $newPerformer
        );

    }

    public function execute()
    {
        $this->reaction->set($this->task->getOldAttribute('performer_id'), TaskChangeAction::NOTIFY_UNASSIGNED_FROM_YOU);
    }

}