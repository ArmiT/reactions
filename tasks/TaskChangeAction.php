<?php

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 *
 * @package
 * @subpackage
 */

namespace cncltd\reactions\tasks;

use cncltd\reactions\ActionCompatible;
use cncltd\reactions\ReactionCompatible;

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

    public function __construct(
        ReactionCompatible $reaction,
        $task,
        $relevantAttributes
    ) {
        $this->reaction           = $reaction;
        $this->task               = $task;
        $this->relevantAttributes = $relevantAttributes;
    }

    /**
     * {@inheritdoc}
     */
    public function isHandled()
    {
        return $this->isHandled;
    }
}
