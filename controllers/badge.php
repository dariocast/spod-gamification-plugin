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

        GAMIFICATION_BOL_Service::getInstance()->addBadge('nuovo', 'ciao', '#00E676', $userId);

        $myBadges = GAMIFICATION_BOL_Service::getInstance()->findListByUserId($userId);

        $this->assign("myBadges",$myBadges);
        $this->assign('components_url', GAMIFICATION_COMPONENTS_URL);
    }
}