<?php

/**
 * @author Armit
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * Конкретная реализация реакции
 * Class Reaction.
 *
 * @package reaction_system
 */
abstract class Reaction implements ReactionCompatible
{
    /**
     * Параметры реакции.
     *
     * @var array
     */
    private $envParams;

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $actions = $this->getActions();

        foreach ($actions as $action) {
            try {
                if ($action->checkNecessity()) {
                    $action->execute();
                    if ($action->isHandled()) {
                        break;
                    }
                }
            } catch (\Exception $e) {
                /* Здесь может быть вызов некого ErrorAction - как свойства Reaction */
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $this->envParams[$key] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $default)
    {
        return isset($this->envParams[$key])
            ? $this->envParams[$key]
            : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        return $this->envParams;
    }
}
