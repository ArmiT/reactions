<?php
/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * »спользуетс€ дл€ реализации действий реации
 * Interface ActionCompatibility
 * @package reaction_system
 */
interface ActionCompatible
{
    /**
     * провер€ет соблюдение условий оружени€
     * @return bool
     */
    public function checkNecessity();

    /**
     * ¬ыполн€ет действие
     * @return mixed
     */
    public function execute();

    /**
     * если истинно, обработка цепочки прерываетс€
     * @return mixed
     */
    public function isHandled();

}