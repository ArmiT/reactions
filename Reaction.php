<?php

declare(strict_types=1);

/**
 * @author Armit
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions;

/**
 * Конкретная реализация реакции
 * Class Reaction.
 */
abstract class Reaction implements ReactionCompatible
{
    /**
     * Параметры реакции.
     *
     * @var array
     */
    private $envParams = [];

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $actions = $this->getActions();

        foreach ($actions as $action) {
            if ($action->checkNecessity()) {
                $action->execute();
                if ($action->isHandled()) {
                    break;
                }
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

    /**
     * {@inheritdoc}
     */
    public function setEnvParams(array $envParams)
    {
        $this->envParams = $envParams;
    }
}
