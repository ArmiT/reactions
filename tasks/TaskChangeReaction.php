<?php
/**
 *
 * @author јртем
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
     * ƒл€ actions есть статус isHAndled
     * Ћогично добавить actions stack дл€ обработки событий:
     * beforeAction
     * afterAction
     * errorAction
     * “огда цепочку обработки можно прерывать выполн€€ afterActions безусловно
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
            /* Ќа самом деле, массив формируетс€ на основе настроек приложени€. т.к. могут быть другие сендеры */
            new actions\SendSmsAction($this, $this->task, $this->relevantAttributes),
        ];
    }
}