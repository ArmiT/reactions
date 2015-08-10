<?php
/**
 * @author ArmiT
 * @date 10.08.2015
 * @project reaction_system
 */

namespace reaction_system;

/**
 * ������������ ��� ���������� �������
 * Interface ReactionCompatible
 * @package reaction_system
 */
interface ReactionCompatible
{
    /**
     * ���������� ����� �������� - ��������� �����
     * @return ActionCompatible[]
     */
    public function getActions();

    /**
     * ���������� �������
     * @return mixed
     */
    public function execute();

    /**
     * ������������� �������� �������
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * ���������� �������� ������� ��� default
     * @param $key
     * @param $default
     * @return mixed
     */
    public function get($key, $default);

    /**
     * ���������� ������ ���������� �������
     * @return mixed
     */
    public function getList();

}