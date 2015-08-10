<?php
/**
 * @author Armit
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * ���������� ���������� �������
 * Class Reaction
 * @package reaction_system
 */
abstract class Reaction implements ReactionCompatible
{

    /**
     * ��������� �������
     * @var []
     */
    private $envParams;

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $actions = $this->getActions();

        foreach($actions as $action) {
            try {

                if($action->checkNecessity()) {
                    $action->execute();
                    if($action->isHandled()) break;
                }

            } catch (\Exception $e) {
                /* ����� ����� ���� ����� ������ ErrorAction - ��� �������� Reaction */
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
        return isset($this->envParams[$key])? $this->envParams[$key]: $default;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        return $this->envParams;
    }

}