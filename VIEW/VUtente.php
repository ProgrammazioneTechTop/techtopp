<?php

//require_once '../StartSmarty.php';


class VUtente
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    static function getEmail(){
        return $_POST['Email'];
    }
    static function getPassword(){
        return $_POST['Password'];
    }
    static function getNome(){
        return $_POST['Nome'];
    }
    static function getCognome(){
        return $_POST['Cognome'];
    }
    static function getNuovaPassword(){
        return $_POST['nuova_password'];
    }

    public function showFormLogin(){
        $this->smarty->display('./Smarty/libs/templates/login_form.tpl');
    }
    public function showFormRegistration(){
        $this->smarty->display('./Smarty/libs/templates/login_registration_form.tpl');
    }

    public function loginOk(){
        $this->smarty->display('.Smarty/libs/templates/index.tpl');
    }
    public function loginError($error){
        switch ($error){
            case 'bannato':
                $this->smarty->assign('banErrore', "banErrore");
                break;
            case 'errore':
                $this->smarty->assign('errore', "defaultErrore");
                break;
        }
        $this->smarty->display('./smarty/libs/templates/login_form.tpl');
    }

    public function registrationError($error){
        switch ($error){
            case 'emailEsistente':
                $this->smarty->assign('emailEsistente', "emailEsistente");
                break;
        }
        $this->smarty->display('.Smarty/libs/templates/login_registration_form.tpl');
    }

    public function profilo($prodotti,$prodotti_venduti, $utente, $foto, $foto_utente,$autori_prodotti, $idutente,$recensioni,$mittente,$utenteAutenticato){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('prodotti', $prodotti);
        $this->smarty->assign('prodotti_venduti', $prodotti_venduti);
        $this->smarty->assign('foto', $foto);
        $this->smarty->assign('foto_utente', $foto_utente);
        $this->smarty->assign('autori_prodotti',$autori_prodotti);
        $this->smarty->assign('idutente', $idutente);
        $this->smarty->assign('recensioni', $recensioni);
        $this->smarty->assign('mittente', $mittente);
        $this->smarty->assign('utenteAutenticato', $utenteAutenticato);

        $this->smarty->display('profile.tpl');
    }

    public function modificaProfilo($utente, $foto_utente, $error){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        switch ($error){
            case 'emailEsistente':
                $this->smarty->assign('emailEsistente', "emailEsistente");
                break;
            case 'dimensioniMax':
                $this->smarty->assign('dimensioniMax', "dimensioniMax");
                break;
            case 'tipoErrato':
                $this->smarty->assign('tipoErrato', "tipoErrato");
                break;
        }
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('foto_utente', $foto_utente);
        $this->smarty->display('edit-profile.tpl');
    }
    public function ModificaPassword($utente, $error){

        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        switch ($error){
            case 'passErrata':
                $this->smarty->assign('passErrata', "passErrata");
                break;
        }
        $this->smarty->assign('utente', $utente);
        $this->smarty->display('./smarty/libs/templates/mod_password.tpl');
    }
}