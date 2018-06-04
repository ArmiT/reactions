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
     */
    public function checkNecessity(): bool;

    /**
     * Выполняет действие.
     */
    public function execute();

    /**
     * Если истинно, обработка цепочки прерывается.
     */
    public function isHandled();
}
