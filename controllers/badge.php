<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 15:01
 */
class GAMIFICATION_CTRL_Badge extends OW_ActionController {
    public function index() {
        $this->setPageTitle("Badge");
        $this->setPageHeading("Tutti i tuoi badge");

        $userId = OW::getUser()->getId();
        if(GAMIFICATION_BOL_Service::getInstance()->getFlag()==false){
            if(SPODPR_BOL_PrivateRoomDao::getInstance()->findAll()) {
                GAMIFICATION_BOL_Service::getInstance()->addBadge('Creazione Privata','Hai creato un contenuto nella stanza privata' ,$userId);
                GAMIFICATION_BOL_Service::getInstance()->setFlag();
            }
        }

        $myBadges = GAMIFICATION_BOL_Service::getInstance()->findListByUserId($userId);

        $this->assign("myBadges",$myBadges);
        $this->assign('components_url', GAMIFICATION_COMPONENTS_URL);
    }
}