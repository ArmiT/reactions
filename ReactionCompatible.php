<?php

declare(strict_types=1);

namespace cncltd\reactions;

/**
 * Используется для реализации реакции
 * Interface ReactionCompatible.
 */
interface ReactionCompatible
{
    /**
     * Возвращает набор действий - фабричный метод.
     *
     * @return ActionCompatible[]
     */
    public function getActions(): array;

    /**
     * Выполнение реакции.
     */
    public function execute();

    /**
     * Устанавливает параметр реакции.
     */
    public function set($key, $value);

    /**
     * Возвращает параметр реакции или default.
     */
    public function get($key, $default);

    /**
     * Возвращает список параметров реакции.
     */
    public function getList(): array;

    /**
     * The envParams setter.
     *
     * @param array $envParams new envParams
     */
    public function setEnvParams(array $envParams);
}
