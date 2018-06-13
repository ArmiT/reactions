<?php

declare(strict_types=1);

namespace cncltd\reactions\tasks;

use cncltd\reactions\Reaction;
use tasks\models\Task;

/**
 * Class TaskChangeReaction notifies the users about task changes.
 */
class TaskChangeReaction extends Reaction
{
    /**
     * @var array task attributes to check for dirtyness
     */
    protected $relevantAttributes = [
        'title',
        'description',
        'priority_id',
        'status_id',
        'performer_id',
    ];

    /**
     * @var Task the changed task
     */
    private $task;

    /**
     * @param Task  $task               the changed task
     * @param array $relevantAttributes task attributes to check for dirtyness
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
     */
    public function getActions(): array
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
