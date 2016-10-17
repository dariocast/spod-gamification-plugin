<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 14:31
 */
/**
 * Data Access Object for `gamification_badge` table.
 *
 * @package ow.plugin.gamification.bol
 * @since 1.0
 */
class GAMIFICATION_BOL_BadgeDao extends OW_BaseDao
{
    /**
     * Constructor
     */
    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * Singleton instance.
     *
     * @var GAMIFICATION_BOL_BadgeDao
     */
    private static $classInstance;

    /**
     * Returns an instance of class (singleton pattern implementation).
     * @return GAMIFICATION_BOL_BadgeDao
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     * @see OW_BaseDao::getDtoClassName()
     *
     */
    public function getDtoClassName()
    {
        return 'GAMIFICATION_BOL_Badge';
    }

    /**
     * @see OW_BaseDao::getTableName()
     *
     */
    public function getTableName()
    {
        return OW_DB_PREFIX . 'gamification_badge';
    }
}