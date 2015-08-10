<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * Используется для реализации реакции
 * Interface ReactionCompatible.
 *
 * @package reaction_system
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
}
