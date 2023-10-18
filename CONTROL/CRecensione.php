<?php

class CRecensione
{
                static function scriviRecensione($iddestinatario){

                    $pm = USingleton::getInstance('FPersistentManager');
                    $session = USingleton::getInstance('USession');
                    $view = new VRecensione();

                    if(CUtente::isLogged()){

                        $autore = unserialize($session->readValue('utente'));
                        $destinatario = $pm->load("FUtente", array(['id','=',$iddestinatario]));

                        if ($_SERVER['REQUEST_METHOD'] == "GET"){

                            $view->formNuovaRecensione($autore,$destinatario,null);
    
                        }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
    
                            $recensione = new ERecensione(null,VRecensione::getValutazione(), VRecensione::getMessaggio(),$autore->getId(),$iddestinatario);
                            $pm::insert($recensione);
                            header('Location: /techtopp/Utente/profilo?id=' . $iddestinatario);
                         }  
                    }else{
                        header('Location: /techtopp/Utente/login');
                    }
                }
        /**
         * Metodo dedicato all'eliminazione della recensione
         */
        static function eliminaRecensione($idrecensione){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');

            $recensione = $pm::load('FRecensione', array(['id', '=', $idrecensione]));
            if(CUtente::isLogged()){
                $utente = unserialize($session->readValue('utente'));
                if($utente->getId() == $recensione->getIDMittente()){
                        $pm::delete('id', $idrecensione, 'FRecensione');                
                        header("Location: /techtopp/Utente/profilo");
                    }
                    }else header('Location: /techtopp/Utente/login');
                }
            }