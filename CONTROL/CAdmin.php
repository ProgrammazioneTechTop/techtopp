<?php

class CAdmin
{
    static function homepage()
    {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null && $utente->getAdmin() == 1) {
            $pm = USingleton::getInstance('FPersistentManager');
            $foto_admin= $pm::load('FFotoUtente', array(['idUtente', '=', $utente->getId()]));
            $list = $pm::load('FUtente',array(['id', '!=', $utente->getId()]));
            if ($list != null) {
                if (is_array($list)) {
                    for ($i = 0; $i < sizeof($list); $i++) {
                        $foto_utente[$i] = $pm::load('FFotoUtente', array(['idUtente', '=', $list[$i]->getId()]));
                    }
                } else {
                    $foto_utente = $pm::load('FFotoUtente', array(['idUtente', '=', $list->getId()]));
                }
            }
            if(!isset($list)) $list = null;
            if(!isset($foto_utente)) $foto_utente = null;
            if(!isset($foto_admin)) $foto_admin = null;
            $view->homepage($utente, $list, $foto_utente,$foto_admin);
        } else {
            header('Location: /techtopp/');
        }

    }
    static function ricercaUtente(){
        $pm = USingleton::getInstance("FPersistentManager");
        
        $session = USingleton::getInstance("USession");
        if(CUtente::isLogged()){
            $utente = unserialize($session->readValue('utente'));
            $foto_admin= $pm::load('FFotoUtente', array(['idUtente', '=', $utente->getId()]));
        }
        $view = new VAdmin();

        $nome=VAdmin::getNome();

        //l'admin cerca un utente nel db
        if($nome != ""){

            $list = $pm->loadByParola($nome, "FUtente");

            if(isset($list)){

                if(is_array($list)){
                    foreach($list as $s){
                        $foto_utente[] = $pm::load('FFotoUtente', array(['idUtente', '=', $s->getId()])); 
                    }
                }elseif(!is_array($list)){
                    $foto_utente = $pm::load('FFotoUtente', array(['idUtente', '=', $list->getId()]));
                }

            }
            if(!isset($list)) $list = null;
            if(!isset($foto_utente)) $foto_utente = null;
            if(!isset($foto_admin)) $foto_admin = null;
            $view->homepage($utente, $list, $foto_utente,$foto_admin);
        }

        //l'admin non utilizza il filtro
        else{

            $list = $pm::load('FUtente',array(['id', '!=', $utente->getId()]));
            if ($list != null) {
                if (is_array($list)) {
                    for ($i = 0; $i < sizeof($list); $i++) {
                        $foto_utente[$i] = $pm::load('FFotoUtente', array(['idUtente', '=', $list[$i]->getId()]));
                    }
                } else {
                    $foto_utente = $pm::load('FFotoUtente', array(['idUtente', '=', $list->getId()]));
                }
            }
            if(!isset($list)) $list = null;
            if(!isset($foto_utente)) $foto_utente = null;
            if(!isset($foto_admin)) $foto_admin = null;
            $view->homepage($utente, $list, $foto_utente,$foto_admin);
        }

    } 
         /**
         * Metodo dedicato al ban degli utenti
         */
        static function bannaUtente($id){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');
    
            $utente_ban = $pm::load('FUtente', array(['id', '=', $id]));    
    
            if(CUtente::isLogged()){
                $utente = unserialize($session->readValue('utente'));
                }
                //controllo che l'utente sia esistente, e che non sia un admin
                if(isset($utente_ban)){
                    if($utente_ban->getAdmin() != 1){

                        $a = 1;
                        $pm::update('Stato', $a, 'id', $id, 'FUtente');
                        $utente_ban->setStato($a);
                        }
                        header("Location: /techtopp/Admin/homepage");
                    }
                }
         /**
         * Metodo dedicato allo sban degli utenti
         */
        static function sbannaUtente($id){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');
    
            $utente_sban = $pm::load('FUtente', array(['id', '=', $id]));    
    
            if(CUtente::isLogged()){
                $utente = unserialize($session->readValue('utente'));
                }
                //controllo che l'utente sia esistente, e che non sia un admin
                if(isset($utente_sban)){
                        $a = 0;
                        $pm::update('Stato', $a, 'id', $id, 'FUtente');
                        $utente_sban->setStato($a);
                        }
                        header("Location: /techtopp/Admin/homepage");
                    }
                }       