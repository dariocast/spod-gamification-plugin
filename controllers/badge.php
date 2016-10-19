<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 15:01
 */
class GAMIFICATION_CTRL_Badge extends OW_ActionController {
    private $checker;

    public function index() {
        $this->setPageTitle(OW::getLanguage()->text('gamification','index_page_title'));
        $this->setPageHeading(OW::getLanguage()->text('gamification','index_page_heading'));

        $userId = OW::getUser()->getId();
        $this->checker = new GAMIFICATION_CLASS_PrivateRoomChecker();
        $this->checker->checkLinks($userId);
        $this->checker->checkDatalet($userId);
        $this->checker->checkText($userId);
        $myBadges = GAMIFICATION_BOL_Service::getInstance()->findListByUserId($userId);

        $this->assign("myBadges",$myBadges);
        $this->assign('components_url', GAMIFICATION_COMPONENTS_URL);
    }
}