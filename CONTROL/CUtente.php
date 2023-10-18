<?php

class CUtente
{

 static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) {
                $view = new VUtente();
                $view->loginOk();
            } else {
                $view = new VUtente();
                $view->showFormLogin();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST")
            static::verifica();
    }
    static function verifica()
    {
        $view = new VUtente();;
        $pm = USingleton::getInstance('FPersistentManager');
        $utente = $pm->loadLogin(VUtente::getEmail(),md5(VUtente::getPassword()));
        //var_dump($utente);
        if ($utente != null) {
            if ($utente->getStato() == 0) {
                if (USession::sessionStatus() == PHP_SESSION_NONE) {
                    $session = USingleton::getInstance('USession');
                    $savableData = serialize($utente);
                    $privilegio = $utente->getAdmin();
                    $session->setValue('Admin', $privilegio);
                    $session->setValue('utente', $savableData);
                    if ($privilegio == 0) { //accesso utente
                        header('Location: /techtopp/');
                    } else { //accesso admin
                        header('Location: /techtopp/Admin/homepage');
                    }
                }
            } else {
                $view->loginError('bannato');
            }
        } else {
            $view->loginError('errore');
        }
    }
    static function isLogged()
    {
        $check = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (USession::sessionStatus() == PHP_SESSION_NONE) {
                USingleton::getInstance('USession');
            }
        }
        if (isset($_SESSION['utente'])) {
            $check = true;
        }
        return $check;
    }
    static function registrazione()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $view = new VUtente();
            if (self::isLogged()) {
                $view->loginOk();
            }
            else {
				$view = new VUtente();
				$view->showFormRegistration();
			}
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::verify_registration();
        }
    }

    static function logout()
    {
        $session = USingleton::getInstance('USession');
        $session->unsetSession();
        $session->destroySession();
        setcookie('PHPSESSID', '');
        header('Location: /techtopp/');
    }

    static function verify_registration()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $verify_email = $pm::exist('Email', VUtente::getEmail(), 'FUtente');
        //$regexEmail = preg_match("/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,3})$/", VUtente::getEmail());
        //$regexPassword = preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*]{8,}$/", VUtente::getPassword());
        $view = new VUtente();
        if ($verify_email) {
            $view->registrationError("emailEsistente");
        }else{
            $nome_utente = VUtente::getNome();
            $cognome_utente = VUtente::getCognome();
            $utente = new EUtente($nome_utente, $cognome_utente,$id,md5(VUtente::getPassword()),0, VUtente::getEmail(), 0);
            $pm::insert($utente);
            header('Location: /techtopp/Utente/login');
        }
    }

    static function profilo($idutente=null){
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        $utenteAutenticato = unserialize($session->readValue('utente'));
        if($idutente== null){
            $utente = unserialize($session->readValue('utente'));
        } else $utente = $pm::load('FUtente', array(['id', '=', $idutente]));
        if (CUtente::isLogged() || $utente!=null){
            $foto_utente = $pm::load('FFotoUtente', array(['idUtente', '=', $utente->getId()]));
            $prodotto = $pm::load('FProdotto', array(['ControlloAcquisto', '=', '0'],['IDUtente', '=', $utente->getId()]));
            $prodotti_venduti = $pm::load('FProdotto', array(['ControlloAcquisto', '=', '1'],['IDUtente', '=', $utente->getId()]));
            $recensioni = $pm::load('FRecensione', array(['IDDestinatario', '=', $utente->getId()]));
            if ($prodotto != null) {
                if (is_array($prodotto)) {
                    for ($i = 0; $i < sizeof($prodotto); $i++) {
                        $foto[$i] = $pm::load('FFotoProdotto', array(['idProdotto', '=', $prodotto[$i]->getId()]));
                        $autori_prodotti[$i] = $pm::load('FUtente', array(['id', '=', $prodotto[$i]->getIDUtente()]));
                    }
                } else {
                    $foto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $prodotto->getId()]));
                    $autori_prodotti = $pm::load('FUtente', array(['id', '=', $prodotto->getIDUtente()]));
                }
            }
            if ($recensioni != null){
                if(is_array($recensioni)){
                    for($i = 0; $i < sizeof($recensioni); $i++) {
                        $mittente[$i] = $pm::load('FUtente', array(['id', '=', $recensioni[$i]->getIDMittente()]));
                    }
                } else {
                    $mittente= $pm::load('FUtente', array(['id', '=', $recensioni->getIDMittente()]));
                }
                
            }
            if(!isset($utenteAutenticato)) $utenteAutenticato = null;
            if(!isset($mittente)) $mittente = null;
            if(!isset($recensioni)) $recensioni = null;
            if(!isset($prodotto)) $prodotto = null;
            if(!isset($prodotti_venduti)) $prodotti_venduti = null;
            if(!isset($foto_utente)) $foto_utente = null;
            if(!isset($foto)) $foto = null;
            if(!isset($autori_prodotti)) $autori_prodotti=null;
            $view->profilo($prodotto,$prodotti_venduti, $utente, $foto, $foto_utente, $autori_prodotti, $idutente,$recensioni,$mittente,$utenteAutenticato);
        } else {
            header('Location: /techtopp/Utente/login');
        }
    }

/*
    static function cancellaRecensione($id)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $recensione = $pm::load('FRecensione', array(['id', '=', $id]));
            if ($recensione != null && $recensione->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FRecensione');
                header("Location: /techtopp/Ricette/InfoRicetta/{$recensione->getId_ricetta()}");
            }
            else{ header("Location: /chefskiss/Forum/esploraLeRicette");}
        } else {
            header("Location: /chefskiss/Forum/esploraLeRicette");
        }
    }
*/

static function modificaProfilo(){

    $pm = USingleton::getInstance("FPersistentManager");
    $session = USingleton::getInstance("USession");

    $view = new VUtente();

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        
        if (CUtente::isLogged()) {

            $utente = unserialize($session->readValue('utente'));
            $foto_utente = $pm->load("FFotoUtente", array(['idUtente', '=', $utente->getId()]));
            if(!isset($foto_utente)){$foto_utente = null;}
            $view->modificaProfilo($utente,$foto_utente,null);
        } 
        else header('Location: /techtopp/Utente/login');
        
    
    }
    elseif ($_SERVER['REQUEST_METHOD'] == "POST"){

        $utente = unserialize($session->readValue('utente')); //vecchi valori degli attributi di utente
        $foto_utente = $pm->load("FFotoUtente", array(['idUtente', '=', $utente->getId()]));
        $Nome = VUtente::getNome();//nuovo nome utente inserito dall utente
        $Cognome = VUtente::getCognome(); //nuovo cognome inserito dall utente

            if ($Nome != $utente->getNome()) {
                    $pm::update('Nome', $Nome, 'id', $utente->getId(), "FUtente");
                    $utente->setNome($Nome);
                }
            if ($Cognome != $utente->getCognome()) {
                $pm::update('Cognome', $Cognome, 'id', $utente->getId(), "FUtente");
                $utente->setCognome($Cognome);
            }

            if(isset($_FILES['file'])){ //controllo se è stata aggiornata la foto
                $nome_file = 'file';
                $foto_utente = static::upload($utente, "modificaUtente",$nome_file);
                switch ($img) {
                    case "dimensioniMax":
                        $view->modificaProfilo($utente, $img, "dimensioniMax");
                        break;
                    case "conclusione":
                        $session->destroyValue('utente'); //cancello il vecchio utente dalla sessione
                        $session->setValue('utente', serialize($utente)); //metto il nuovo utente nella sessione
                        header("Location: /techtopp/Utente/profilo");   
                    case "tipoErrato":
                        $view->modificaProfilo($utente, $img, "tipoErrato");
                        break;
                }
            }
            $session->destroyValue('utente'); //cancello il vecchio utente dalla sessione
            $session->setValue('utente', serialize($utente)); //metto il nuovo utente nella sessione
            header("Location: /techtopp/Utente/profilo");
        }
    }

        /** 
         * Metodo per la gestione dell'upload dei file, utilizzato per cambiare la propria immagine di profilo
         * @param utente di cui va gestita la foto
         * @param funz, stringa che indica il tipo di gestione da effettuare
         * @param nome_file, nome del file
         * @return String $ris
        */

         static function upload($utente, $funz, $nome_file){

            $pm = new FPersistentManager();
		    $ris = null;
		    $nome = '';

            $max_size = 1000000; //1 MB
            $result = is_uploaded_file($_FILES[$nome_file]['tmp_name']); //booleano che indica se il file è stato uploadato
            $size = $_FILES[$nome_file]['size'];
            $type = $_FILES[$nome_file]['type'];
                if($size>$max_size){ //se il file supera determinate dimensioni lancio un errore
                    $ris = "dimensioniMax";
                }
                elseif ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg') {

                    $nome = $_FILES[$nome_file]['name']; //nome del file

                    $contenuto = file_get_contents($_FILES[$nome_file]['tmp_name']); //contenuto del file
                    $contenuto = addslashes($contenuto); //per evitare l'interpretazione errata di caratteri come ' 
                                                     //e dunque anche problemi di injection;
                    $fotoPrecendente = $pm::load('FFotoUtente', array(['idUtente', '=', $utente->getId()]));
                    if($fotoPrecendente != null){
                        $pm::delete("idUtente",$utente->getId(),"FFotoUtente");}
                    $foto_utente = new EFotoUtente($id, $nome, $size, $type, $contenuto,$utente->getId());                       
                    $pm::insertMedia($foto_utente, $nome_file);
                    $ris ="conclusione";
                }
                else{ //caso in cui il file non è un immagine del formato indicato
                    $ris = "tipoErrato";
                }
                return $ris;
            }
        static function modificaPassword(){
            $pm = USingleton::getInstance("FPersistentManager");
            $session = USingleton::getInstance("USession");
            $utente = unserialize($session->readValue('utente'));
            $view = new VUtente();
    
                if ($_SERVER['REQUEST_METHOD'] == "GET") {
                    if (CUtente::isLogged()) {    
                    $view->ModificaPassword($utente, null);    
                    } 
                    else header('Location: /techtopp/Utente/login');
                
                }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){    
                    $oldPassword = md5(VUtente::getPassword());
                    if($oldPassword == $utente->getPassword()){  
                        $newPassword = md5(VUtente::getNuovaPassword());
                        $utente->setPassword($newPassword); 
                        $pm::update('Password', $utente->getPassword(), 'id', $utente->getId(), "FUtente");

                        $session->destroyValue('utente'); //cancello il vecchio utente dalla sessione
                        $session->setValue('utente', serialize($utente)); //metto il nuovo utente nella sessione
                        header("Location: /techtopp/Utente/profilo");
                        }else{
                        $view->ModificaPassword($utente, "passErrata");
                    }
                    }
            }
        }       
