<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 14:32
 */
class GAMIFICATION_BOL_Service
{
    /**
     * Class instance
     *
     * @var GAMIFICATION_BOL_Service
     */
    private static $classInstance;

    /**
     * Returns class instance
     *
     * @return GAMIFICATION_BOL_Service
     */
    public static function getInstance()
    {
        if ( null === self::$classInstance )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     *
     * @var GAMIFICATION_BOL_BadgeDao
     */
    private $badgeDao;

    private function __construct()
    {
        $this->recordDao = GAMIFICATION_BOL_BadgeDao::getInstance();
    }

    /**
     *
     * @param string $nome
     * @param string $userId
     * @return GAMIFICATION_BOL_Badge
     */
    public function addBadge( $nome, $userId )
    {
        $badge = new GAMIFICATION_BOL_Badge();
        $badge->nome = $nome;
        $badge->userId = $userId;

        return $this->badgeDao->save($badge);
    }

    public function deleteBadge($id)
    {
        $this->badgeDao->deleteById($id);
    }
    /**
     * Nomi dei badge di un utente
     * @return array
     */
    public function findListByUserId($userId)
    {
        $id = (int) $userId;
        $badges = $this->badgeDao->findAll();
        $nomi = array();
        foreach ($badges as $badge) {
            if($badge->userId === $id)
                $nomi[] = $badge->nome;
        }
        return $nomi;
    }
}