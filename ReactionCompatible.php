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
    public function getActions();

    /**
     * Выполнение реакции.
     *
     * @return mixed
     */
    public function execute();

    /**
     * Устанавливает параметр реакции.
     *
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function set($key, $value);

    /**
     * Возвращает параметр реакции или default.
     *
     * @param $key
     * @param $default
     *
     * @return mixed
     */
    public function get($key, $default);

    /**
     * Возвращает список параметров реакции.
     *
     * @return array
     */
    public function getList();

    /**
     * The envParams setter.
     *
     * @param array $envParams new envParams
     *
     * @return mixed
     */
    public function setEnvParams(array $envParams);
}
