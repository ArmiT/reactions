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

use cncltd\reactions\Reaction;

class TaskChangeReaction extends Reaction
{
    private $task;

    protected $relevantAttributes = [
        'title',
        'description',
        'priority_id',
        'status_id',
        'performer_id',
    ];

    public function __construct($task, array $relevantAttributes = [])
    {
        $this->task = $task;
        if ($relevantAttributes) {
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
            new actions\MultipleChangesAction($this, $this->task, $this->relevantAttributes),
            new actions\NewAction($this, $this->task, $this->relevantAttributes),
            new actions\StatusChangedAction($this, $this->task, $this->relevantAttributes),
            new actions\AssignedToAction($this, $this->task, $this->relevantAttributes),
            new actions\UnassignedFromAction($this, $this->task, $this->relevantAttributes),
            /* На самом деле, массив формируется на основе настроек приложения. т.к. могут быть другие сендеры */
            new actions\SendSmsAction($this, $this->task, $this->relevantAttributes),
        ];
    }
}
