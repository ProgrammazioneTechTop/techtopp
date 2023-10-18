<?php

 

class VRecensione

{
    private $smarty;
    public function __construct()
    {

        $this->smarty = StartSmarty::configuration();

    }
    static function getMessaggio(){
        return $_POST['messaggio'];
    }
    static function getValutazione(){
        return $_POST['valutazione'];
    }

    public function formNuovaRecensione($autore, $destinatario, $error){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('autore', $autore);
        $this->smarty->assign('destinatario', $destinatario);

        $this->smarty->display('./smarty/libs/templates/nuova_recensione.tpl');
    }
}