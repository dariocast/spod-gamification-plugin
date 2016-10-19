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
        $this->badgeDao = GAMIFICATION_BOL_BadgeDao::getInstance();
    }

    /**
     *
     * @param string $nome
     * @param string $userId
     * @return GAMIFICATION_BOL_Badge
     */
    public function addBadge( $nome, $descrizione, $colore, $userId )
    {
        if($this->findByName($nome) == null){
            $badge = new GAMIFICATION_BOL_Badge();
            $badge->nome = (string) $nome;
            $badge->descrizione = (string) $descrizione;
            $badge->colore = (string) $colore;
            $badge->userId = (int) $userId;

            return $this->badgeDao->save($badge);
        }
        else{
            return null;
        }
    }

    public function deleteBadge($id)
    {
        $this->badgeDao->deleteById((int) $id);
    }
    /**
     * Nomi dei badge di un utente
     * @return array
     */
    public function findListByUserId($userId)
    {
        $id = (int) $userId;
        $example = new OW_Example();
        $example->andFieldEqual('userId',$id);
        $example->setOrder("`colore` DESC");

        $badges = $this->badgeDao->findListByExample($example);
        return $badges;
    }

    protected function findByName($nome){
        $example = new OW_Example();
        $example->andFieldEqual('nome',$nome);
        return $this->badgeDao->findObjectByExample($example);
    }
}