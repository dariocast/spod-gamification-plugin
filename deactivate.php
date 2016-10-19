<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 12/10/2016
 * Time: 13:05
 */
OW::getNavigation()->deleteMenuItem('gamification', 'top_menu_badge');
BOL_ComponentAdminService::getInstance()->deleteWidget('GAMIFICATION_CMP_Badge');
