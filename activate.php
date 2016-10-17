<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 12/10/2016
 * Time: 13:05
 */
OW::getNavigation()->addMenuItem(OW_Navigation::BOTTOM, 'gamification.index', 'gamification', 'bottom_menu_item', OW_Navigation::VISIBLE_FOR_ALL);
$widgetService = BOL_ComponentAdminService::getInstance();

$widget = $widgetService->addWidget('GAMIFICATION_CMP_Badge', true);
$widgetPlace = $widgetService->addWidgetToPlace($widget, BOL_ComponentService::PLACE_PROFILE);
$widgetService->addWidgetToPosition($widgetPlace, BOL_ComponentService::SECTION_LEFT, 1);