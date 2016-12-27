<?php

declare(strict_types=1);

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks;

use cncltd\reactions\ActionCompatible;
use cncltd\reactions\ReactionCompatible;
use tasks\models\Task;

/**
 * Abstract class TaskChangeAction.
 */
abstract class TaskChangeAction implements ActionCompatible
{
    /**
     * The "task assigned to you" notification code.
     */
    const NOTIFY_ASSIGNED_TO_YOU = 0x01;

    /**
     * The "task unassigned from you" notification code.
     */
    const NOTIFY_UNASSIGNED_FROM_YOU = 0x02;

    /**
     * The "task updated" notification code.
     */
    const NOTIFY_TASK_UPDATED = 0x03;

    /**
     * The "task status updated" notification code.
     */
    const NOTIFY_STATUS_UPDATED = 0x04;

    /**
     * @var ReactionCompatible Current reaction.
     */
    protected $reaction;

    /**
     * @var Task The changed task.
     */
    protected $task;

    /**
     * @var array Task attributes to check for dirtyness.
     */
    protected $relevantAttributes;

    /**
     * @var bool Value indicating whether the action is handled.
     */
    protected $isHandled = false;

    /**
     * @param ReactionCompatible $reaction           Reaction to act upon.
     * @param Task               $task               The changed task.
     * @param array              $relevantAttributes Task attributes
     *                                               to check for dirtyness.
     */
    public function __construct(
        ReactionCompatible $reaction,
        Task $task,
        array $relevantAttributes
    ) {
        $this->reaction = $reaction;
        $this->task = $task;
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
