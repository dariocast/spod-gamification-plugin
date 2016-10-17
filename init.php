<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 12/10/2016
 * Time: 13:29
 */
$preference = BOL_PreferenceService::getInstance()->findPreference('spodpr_components_url');
$spodpr_components_url = empty($preference) ? "http://deep.routetopa.eu/deep-components/" : $preference->defaultValue;
define("GAMIFICATION_COMPONENTS_URL", $spodpr_components_url);

OW::getRouter()->addRoute(new OW_Route('gamification.index', 'badge', "GAMIFICATION_CTRL_Badge", 'index'));

