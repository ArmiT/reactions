<?php
/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * ������������ ��� ���������� �������� ������
 * Interface ActionCompatibility
 * @package reaction_system
 */
interface ActionCompatible
{
    /**
     * ��������� ���������� ������� ��������
     * @return bool
     */
    public function checkNecessity();

    /**
     * ��������� ��������
     * @return mixed
     */
    public function execute();

    /**
     * ���� �������, ��������� ������� �����������
     * @return mixed
     */
    public function isHandled();

}