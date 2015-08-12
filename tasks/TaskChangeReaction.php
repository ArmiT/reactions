<?php

/**
 * @author Артем
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions\tasks;

use cncltd\reactions\Reaction;
use tasks\models\Task;

/**
 * Class TaskChangeReaction notifies the users about task changes.
 */
class TaskChangeReaction extends Reaction
{
    /**
     * @var Task The changed task.
     */
    private $task;

    /**
     * @var array Task attributes to check for dirtyness.
     */
    protected $relevantAttributes = [
        'title',
        'description',
        'priority_id',
        'status_id',
        'performer_id',
    ];

    /**
     * @param Task  $task               The changed task.
     * @param array $relevantAttributes Task attributes to check for dirtyness.
     */
    public function __construct(Task $task, array $relevantAttributes = null)
    {
        $this->task = $task;
        if ($relevantAttributes !== null) {
            $this->relevantAttributes = $relevantAttributes;
        }
    }

    /**
     * Для actions есть статус isHandled
     * Логично добавить actions stack для обработки событий:
     * beforeAction
     * afterAction
     * errorAction
     * Тогда цепочку обработки можно прерывать выполняя afterActions безусловно.
     *
     * @return array
     */
    public function getActions()
    {
        return [
            new actions\MultipleChangesAction(
                $this,
                $this->task,
                $this->relevantAttributes
            ),
            new actions\StatusChangedAction(
                $this,
                $this->task,
                $this->relevantAttributes
            ),
            new actions\ReassignedAction(
                $this,
                $this->task,
                $this->relevantAttributes
            ),
            new actions\NewAction(
                $this,
                $this->task,
                $this->relevantAttributes
            ),
            new actions\SendSmsAction(
                $this,
                $this->task,
                $this->relevantAttributes
            ),
        ];
    }
}
