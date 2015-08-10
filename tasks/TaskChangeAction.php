<?php
/**
 *
 * @author Артем
 * @date 10.08.2015
 * @project reaction_system
 * @package
 * @subpackage
 */

namespace reaction_system\tasks\actions;


use reaction_system\ActionCompatible;
use reaction_system\ReactionCompatible;

abstract class TaskChangeAction implements ActionCompatible
{

    const NOTIFY_ASSIGNED_TO_YOU = 0x01;

    const NOTIFY_UNASSIGNED_FROM_YOU = 0x02;

    const NOTIFY_TASK_UPDATED = 0x03;

    const NOTIFY_STATUS_UPDATED = 0x04;

    protected $reaction;

    protected $task;

    protected $relevantAttributes;

    protected $isHandled = false;

    public function __construct(ReactionCompatible $reaction, $task, $relevantAttributes)
    {
        $this->reaction = $reaction;
        $this->task = $task;
        $this->relevantAttributes = $relevantAttributes;
    }

    public function isHandled()
    {
        return $this->isHandled;
    }

}