<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 14:31
 */
class GAMIFICATION_BOL_Badge extends OW_Entity {
    /*
     * Nome del badge
     */
    public $nome;

    /*
     * user id dell'utente che possiede il badge
     */
    public $userId;

    /*
     * Immagine associata al badge
     */
    public $image;
}