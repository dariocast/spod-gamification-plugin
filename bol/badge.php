<?php
/**
 * Created by PhpStorm.
 * User: darcas
 * Date: 13/10/2016
 * Time: 14:31
 */
class GAMIFICATION_BOL_Badge extends OW_Entity {
    /**
     * Nome del badge
     * @var string
     */
    public $nome;

    /**
     * Descrizione del badge
     * @var string
    */
    public $descrizione;

    /**
     * Colore del badge
     * @var string
     */
    public $colore;

    /**
     * user id dell'utente che possiede il badge
     * @var int
     */
    public $userId;
}