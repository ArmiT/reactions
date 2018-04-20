<?php

declare(strict_types=1);

/**
 * @author ArmiT
 * @date 10.08.2015
 * @project cncltd\reactions
 */

namespace cncltd\reactions;

/**
 * Используется для реализации действий реакции
 * Interface ActionCompatibility.
 */
interface ActionCompatible
{
    /**
     * Проверяет соблюдение условий окружения.
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
     * Если истинно, обработка цепочки прерывается.
     *
     * @return mixed
     */
    public function isHandled();
}
