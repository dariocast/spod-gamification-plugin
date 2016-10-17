<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 12/10/2016
 * Time: 13:29
 */
OW::getRouter()->addRoute(new OW_Route('gamification.index', 'badge', "GAMIFICATION_CTRL_Badge", 'index'));

$preference = BOL_PreferenceService::getInstance()->findPreference('gamification_components_url');
$gamification_components_url = empty($preference) ? "http://deep.routetopa.eu/COMPONENTS/" : $preference->defaultValue;
define("GAMIFICATION_COMPONENTS_URL", $gamification_components_url);
