<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 17/10/2016
 * Time: 09:57
 */
class GAMIFICATION_CMP_Badge extends BASE_CLASS_Widget {
    private $userId;
    private $myBadges;
    private $checker;

    public function __construct(BASE_CLASS_WidgetParameter $paramObject)
    {
        parent::__construct();

        $this->userId =  $paramObject->additionalParamList['entityId'];
        $this->checker = new GAMIFICATION_CLASS_PrivateRoomChecker();
        $this->checker->checkLinks($this->userId);
        $this->checker->checkDatalet($this->userId);
        $this->checker->checkText($this->userId);
        $this->myBadges = GAMIFICATION_BOL_Service::getInstance()->findListByUserId($this->userId);

    }
    public static function getStandardSettingValueList() // If you redefine this method, you will be able to set default values for the standard widget settings.
    {
        return array(
            self::SETTING_TITLE => 'OW::getLanguage()->text(\'gamification\',\'widget_title\')',
            self::SETTING_SHOW_TITLE => true,
            self::SETTING_ICON => self::ICON_FLAG
        );

    }

    public function onBeforeRender()
    {
        $this->assign('components_url', GAMIFICATION_COMPONENTS_URL);
        $this->assign('myBadges',$this->myBadges);
    }
}