<?php

declare(strict_types=1);

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
    public function checkNecessity(): bool;

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
