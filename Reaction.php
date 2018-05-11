<?php

declare(strict_types=1);

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

    public function execute(): void
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

    public function set($key, $value): void
    {
        $this->envParams[$key] = $value;
    }

    public function get($key, $default)
    {
        return $this->envParams[$key] ?? $default;
    }

    public function getList()
    {
        return $this->envParams;
    }

    public function setEnvParams(array $envParams): void
    {
        $this->envParams = $envParams;
    }
}
