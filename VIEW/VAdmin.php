<?php

    class VAdmin{

        private $smarty;
    
        public function __construct() {
            $this->smarty = StartSmarty::configuration();
        }
        static function getNome(){
            $value = "";
            if (!empty($_POST['nome']))
                $value = $_POST['nome'];
            return $value;
        }
    function homepage($utente, $list, $foto_utente,$foto_admin){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

            $this->smarty->assign('utente', $utente);
            $this->smarty->assign('list', $list);
            $this->smarty->assign('foto_utente', $foto_utente);
            $this->smarty->assign('foto_admin', $foto_admin);
    
            $this->smarty->display('admin.tpl');
        }
    }