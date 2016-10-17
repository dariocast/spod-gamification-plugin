<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 12/10/2016
 * Time: 13:05
 */
OW::getNavigation()->deleteMenuItem('gamification', 'bottom_menu_item');
BOL_ComponentAdminService::getInstance()->deleteWidget('GAMIFICATION_CMP_Badge');
