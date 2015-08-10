<?php
/**
 *
 * @author Артем
 * @date 10.08.2015
 * @project reaction_system
 * @package
 * @subpackage
 */

namespace reaction_system\tasks;


use reaction_system\Reaction;
use reaction_system\tasks\actions;

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

    public function __construct($task, $relevantAttributes = [])
    {
        $this->task = $task;
        $this->relevantAttributes = !count($relevantAttributes)?: $relevantAttributes;
    }

    /**
     * Для actions есть статус isHandled
     * Логично добавить actions stack для обработки событий:
     * beforeAction
     * afterAction
     * errorAction
     * Тогда цепочку обработки можно прерывать выполняя afterActions безусловно
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
