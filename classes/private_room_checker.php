<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 19/10/2016
 * Time: 11:20
 */
class GAMIFICATION_CLASS_PrivateRoomChecker {

    public function __construct() {

    }

    public function checkLinks($userId) {
        $example = new OW_Example();
        $example->andFieldEqual('ownerId',$userId);
        $example->andFieldEqual('cardType','link');

        $list = SPODPR_BOL_PrivateRoomDao::getInstance()->findListByExample($example);
        if(count($list)>=1) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Primo Link", "Hai creato il primo link nel tuo spazio privato", "#7FFFD4", $userId);
        }
        if(count($list)>=10) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Dieci Link", "Hai creato dieci link nel tuo spazio privato", "#7FFFD4", $userId);
        }
        if(count($list)>=100) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Cento Link", "Hai creato cento link nel tuo spazio privato", "#7FFFD4", $userId);
        }
    }

    public function checkDatalet($userId) {
        $example = new OW_Example();
        $example->andFieldEqual('ownerId',$userId);
        $example->andFieldEqual('cardType','datalet');

        $list = SPODPR_BOL_PrivateRoomDao::getInstance()->findListByExample($example);
        if(count($list)>=1) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Prima Datalet", "Hai creato la prima datalet nel tuo spazio privato", "#FF00FF", $userId);
        }
        if(count($list)>=10) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Dieci Datalet", "Hai creato dieci datalet nel tuo spazio privato", "#FF00FF", $userId);
        }
        if(count($list)>=100) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Cento Datalet", "Hai creato cento datalet nel tuo spazio privato", "#FF00FF", $userId);
        }

        $idList = array();
        foreach($list as $privateRoom) {
            $card = json_decode($privateRoom->card);
            $idList[] = $card->{'dataletId'};
        }

        if($this->checkIfDataletHasFilters($idList)) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Datalet con filtri", "Hai creato la prima datalet nel tuo spazio privato usando i filtri sul dataset", "#FFA500", $userId);
        }


    }

    public function checkText($userId) {
        $example = new OW_Example();
        $example->andFieldEqual('ownerId',$userId);
        $example->andFieldEqual('cardType','text');

        $list = SPODPR_BOL_PrivateRoomDao::getInstance()->findListByExample($example);
        if(count($list)>=1) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Primo Testo", "Hai creato il primo testo nel tuo spazio privato", "#ADFF2F", $userId);
        }
        if(count($list)>=10) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Dieci Testo", "Hai creato dieci testi nel tuo spazio privato", "#ADFF2F", $userId);
        }
        if(count($list)>=100) {
            GAMIFICATION_BOL_Service::getInstance()->addBadge("Cento Testo", "Hai creato cento testi nel tuo spazio privato", "#ADFF2F", $userId);
        }
    }

    public function checkIfDataletHasFilters($idList) {
        $list = ODE_BOL_DataletDao::getInstance()->findByIdList($idList);
        foreach($list as $datalet) {
            $params = json_decode($datalet->params);
            if($params->{'filters'}!="") {
                return true;
            }
        }
        return false;
    }
}