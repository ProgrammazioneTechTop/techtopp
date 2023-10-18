<?php

/**
 * La classe CRicerca si occupa del caricamento dei prodotti in vendita nella homepage
 */
class CRicerca
{
    /**
     * Metodo utilizzato per il caricamento dei prodotti in vendita nella home che implementa
     * un sistema di refresh dei prodotti ad ogni caricamento della pagina
     * @return void
    */
    public static function blogHome(){
        $vSearch = new VRicerca();

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $prodotti_home =$pm::load('FProdotto',array(['ControlloAcquisto', '=', '0']),'',6);
        

    if(CUtente::isLogged()){
        $utente = unserialize($session->readValue('utente'));
        $prodotti = $pm::load('FProdotto', array(['ControlloAcquisto', '=', '0']),'',6);
    }else{
        $prodotti = $pm::load('FProdotto',array(['ControlloAcquisto', '=', '0']),'', 6);
    }
    
    if(isset($prodotti_home)){
        if(is_array($prodotti_home)){
            for($i=0; $i< sizeof($prodotti_home); $i++){
                $prodotti_home[$i] = $prodotti[$i];
                $prodotti_foto[$i]= $pm::load('FFotoProdotto', array(['idProdotto','=',$prodotti[$i]->getId()]));
                $venditore_pr[$i] = $pm::load('FUtente', array(['id', '=', $prodotti[$i]->getIDUtente()]));
                //print_r($prodotti_foto);
            }
            }elseif(!is_array($prodotti_home)){
                $prodotti_foto= $pm::load('FFotoProdotto', array(['idProdotto','=',$prodotti_home->getId()]));
                $venditore_pr = $pm::load('FUtente', array(['id', '=', $prodotti_home->getIDUtente()]));
            }
        }
        if(!isset($utente)) $utente = null;
        $vSearch->showHome($prodotti_home, $prodotti_foto ,$venditore_pr,$utente);
        }
        /**
         * Metodo per la visualizzazione della lista dei prodotti presenti nel database. In particolare, si
         * occupa, anche, della gestione del filtro categoria inserito dall'utente.
         */
        static function esploraProdotti(){
            $pm = USingleton::getInstance("FPersistentManager");
            
            $session = USingleton::getInstance("USession");
            if(CUtente::isLogged()){
                $utente = unserialize($session->readValue('utente'));
            }
            $view = new VRicerca();

            $id_categoria = VRicerca::getIdCategoria();
            $titolo=VRicerca::getTitolo();

            //l'utente utilizza il filtro categoria
            if($id_categoria != "" && $titolo == ""){

                //carico i prodotti associati al filtro
                $prodotti = $pm::load('FProdotto', array(['id_categ', '=', $id_categoria],['ControlloAcquisto', '=', '0']));
                $prodotti_foto = null;

                $categoria = $pm::load('FCategorie', array());

                //carico le foto associate ai prodotti trovati
                if(isset($prodotti)){

                    if(is_array($prodotti)){
                        foreach($prodotti as $s){
                            $prodotti_foto[] = $pm::load('FFotoProdotto', array(['idProdotto', '=', $s->getId()])); 
                        }
                    }elseif(!is_array($prodotti)){
                        $prodotti_foto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $prodotti->getId()]));
                    }
    
                }
                //ricarico la view con i nuovi risultati
                $view->mostraProdotti($prodotti, $prodotti_foto, $categoria);
            }
            //l'utente cerca un prodotto per titolo
            elseif($titolo != "" && $id_categoria== ""){

                $categoria = $pm::load('FCategorie', array());
                $prodotti = $pm->loadByParola($titolo, "FProdotto");

                if(isset($prodotti)){

                    if(is_array($prodotti)){
                        foreach($prodotti as $s){
                            $prodotti_foto[] = $pm::load('FFotoProdotto', array(['idProdotto', '=', $s->getId()])); 
                        }
                    }elseif(!is_array($prodotti)){
                        $prodotti_foto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $prodotti->getId()]));
                    }
    
                }
                if(!isset($prodotti)) $prodotti = null;
                if(!isset($prodotti_foto)) $prodotti_foto = null;
                $view->mostraProdotti($prodotti, $prodotti_foto, $categoria);
            }
            
            //l'utente non utilizza il filtro
            else{

                $prodotti = $pm::load('FProdotto', array(['ControlloAcquisto', '=', '0']));
                $prodotti_foto = null;

                $categoria = $pm::load('FCategorie', array());

                //carico le foto associate ai prodotti trovati
                if(isset($prodotti)){

                    if(is_array($prodotti)){
                        foreach($prodotti as $s){
                            $prodotti_foto[] = $pm::load('FFotoProdotto', array(['idProdotto', '=', $s->getId()])); 
                        }
                    }elseif(!is_array($prodotti)){
                        $prodotti_foto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $prodotti->getId()]));
                    }
    
                }

                //ricarico la view con i nuovi risultati
                $view->mostraProdotti($prodotti, $prodotti_foto, $categoria);
            }

        }        
    }
            
 
    

    

