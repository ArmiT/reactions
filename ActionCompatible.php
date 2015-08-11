<?php

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * Используется для реализации действий реакции
 * Interface ActionCompatibility.
 *
 * @package reaction_system
 */
interface ActionCompatible
{
    /**
     * проверяет соблюдение условий окружения.
     *
     * @return bool
     */
    public function checkNecessity();

    /**
     * Выполняет действие.
     *
     * @return mixed
     */
    public function execute();

    /**
     * если истинно, обработка цепочки прерывается.
     *
     * @return mixed
     */
    public function isHandled();
}
