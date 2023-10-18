<?php

class CProdotti
{
    static function nuovoProdotto(){

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $view = new VProdotti();

        if(CUtente::isLogged()){

            $autore = unserialize($session->readValue('utente'));
            $categoria = $pm::load('FCategorie', array());

            if ($_SERVER['REQUEST_METHOD'] == "GET"){

                $view->formNuovoProdotto($autore, $categoria, null);

            }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
                $prodotto = new EProdotto($id,VProdotti::getTitolo(), VProdotti::getDescrizione(), VProdotti::getPrezzo(),$autore->getId(),null,0,VProdotti::getIdCateg());
                $pm::insert($prodotto);
                //gestione della foto caricata associata al prodotto
                if ($prodotto != null) {
                    if (isset($_FILES['file'])) {
                        $nome_file = 'file';
                        $img = static::upload($prodotto->getId(), "nuovoProdotto", $nome_file);
                        switch($img){
                            case "dimensioniMax":
                                $view->formNuovoProdotto($autore, $tipologia, "dimensioniMax");
                                break;
                            case "conclusione":
                                header('Location: /techtopp/Prodotti/infoProdotto?id=' . $prodotto->getId());
                            case "tipoErrato":
                                $view->formNuovoProdotto($autore, $tipologia, "tipoErrato");
                                break;
                        }
                    }
                }  
             } 

        }else{
            header('Location: /techtopp/Utente/login');
        }
    }

    /**
     * Metodo per la gestione della foto caricata associata al prodotto
     * @param id del prodotto di cui gestire la foto
     * @param funz, stringa che indica se il prodotto è nuovo oppure sta subendo una modifica
     * @param nome_file, nome del file
     */
    static function upload($id_prodotto, $funz, $nome_file){
        $pm = new FPersistentManager();
        $ris = null;
        $nome = '';

        $max_size = 1000000; //1MB
        $result = is_uploaded_file($_FILES[$nome_file]['tmp_name']); //booleano che indica se il file è stato uploadato

        if (!$result) { //se l'utente non carica l'immagine, lancio l'errore
            $ris = "conclusione";
        }else{
            $size = $_FILES[$nome_file]['size'];
            $type = $_FILES[$nome_file]['type'];

            if($size>$max_size){ //se il file supera determinate dimensioni lancio un errore
                $ris = "dimensioniMax";
            }
            elseif ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg') {

                $nome = $_FILES[$nome_file]['name']; //nome del file

                $contenuto = file_get_contents($_FILES[$nome_file]['tmp_name']); //contenuto del file
                $contenuto = addslashes($contenuto); //per evitare l'interpretazione errata di caratteri come ' 
                                                     //e dunque anche problemi di injection
                if($funz == "nuovoProdotto"){

                    $fotoProdotto = new EFotoProdotto($id, $nome, $size, $type, $contenuto, $id_prodotto);                               
                    $pm->insertMedia($fotoProdotto, $nome_file);

                    $ris = "conclusione";

                }elseif($funz == "modificaProdotto"){

                    //cancello la vecchia foto (se presente) e carico la nuova.
                    $fotoPrecendente = $pm::load('FFotoProdotto', array(['idProdotto','=',$id]));
                    if($fotoPrecendente != null){
                        $pm::delete("idProdotto",$id,"FFotoProdotto");
                        }
                    $foto_prodotto = new EFotoProdotto($id, $nome, $size, $type, $contenuto, $id_prodotto);                               
                    $pm::insertMedia($foto_prodotto, $nome_file);

                    $ris = "conclusione";

                }
            }
            else{ //caso in cui il file non è un immagine del formato indicato
                $ris = "tipoErrato";
            }
        }
        return $ris;               
    }
           /**
         * Metodo che permette la visualizzazione delle informazioni specifiche di un prodotto
         * @param id da visualizzare
         */
        static function infoProdotto(int $id){

            $view = new VProdotti();

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');

            //informazioni sull'utente visitatore, utile nella view per verificare se il visitatore del sito è lo stesso che lo fornisce
            $utente = unserialize($session->readValue('utente'));
            //informazioni sul prodotto
            $prodotto = $pm::load('FProdotto', array(['id', '=', $id]));

            if(isset($prodotto)){
                $foto_prodotto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $id]));
                $categoria = $pm::load('FCategorie', array(['id_categ', '=', $prodotto->getIdCateg()]));

                //informazioni sull'autore dell'annuncio del prodotto
                $autore = $pm::load('FUtente', array(['id', '=', $prodotto->getIDUtente()]));
                $foto_autore = $pm::load('FFotoUtente', array(['id', '=', $autore->getId()]));

                
                if(!isset($foto_prodotto)) $foto_prodotto = null;
                if(!isset($foto_utente)) $foto_utente = null;
                if(!isset($foto_autore)) $foto_autore = null;
                $view->mostraInfo($prodotto, $foto_prodotto, $categoria, $autore, $foto_autore, $utente);
            
            }else header('Location: /techtopp');
        }
        /**
         * Metodo per la modifica di un prodotto esistente
         * @param id
         */
        static function modificaProdotto($id){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');

            $prodotto = $pm::load('FProdotto', array(['id', '=', $id]));
            $categoriaOld = $pm::load('FCategorie', array(['id_categ','=', $prodotto->getIdCateg()]));
            $categoria = $pm::load('FCategorie', array());
            $foto_prodotto = $pm::load('FFotoProdotto', array(['idProdotto','=',$id]));

            $view = new VProdotti();

            if ($_SERVER['REQUEST_METHOD'] == "GET") {

                if(CUtente::isLogged()){

                    $utente = unserialize($session->readValue('utente'));

                    if($utente->getId() == $prodotto->getIDUtente()){

                        $view->formModificaProdotto($prodotto, $foto_prodotto, $categoria, $categoriaOld, null);
                    }else  
                        header('Location: /techtopp/Prodotti/infoProdotto?id=' . $id);

                }else{
                    header('Location: /techtopp/Utente/login');
                }
                
            }elseif($_SERVER['REQUEST_METHOD'] == "POST"){

                $titolo = VProdotti::getTitolo();
                $descrizione = VProdotti::getDescrizione();
                $categoria = VProdotti::getIdCateg();
                $prezzo = VProdotti::getPrezzo();

                if($titolo != $prodotto->getTitolo()){
                    $pm::update('titolo', $titolo, 'id', $id, 'FProdotto');
                    $prodotto->setTitolo($titolo);
                }

                if($descrizione != $prodotto->getDescrizione()){
                    $pm::update('Descrizione', $descrizione, 'id', $id, 'FProdotto');
                    $prodotto->setDescrizione($descrizione);
                }

                if($prezzo != $prodotto->getPrezzo()){
                    $pm::update('prezzo', $prezzo, 'id', $id, 'FProdotto');
                    $prodotto->setPrezzo($prezzo);
                }

                if($categoria != $prodotto->getIdCateg()){
                    $pm::update('id_categ', $categoria, 'id', $id, 'FProdotto');
                    $prodotto->setIdCateg($categoria);
                }

                $img = null;
                if(isset($_FILES['file'])){ //controllo se è stata aggiornata anche la foto
                    $nome_file = 'file';
                    $img = static::upload($prodotto->getId(), "modificaProdotto",$nome_file);
                    switch ($img) {
                        case "dimensioniMax":
                            $view->formModificaProdotto($prodotto, $foto_prodotto, $categoria, $categoriaOld, "dimensioniMax");
                            break;
                        case "conclusione":
                            header('Location: /techtopp/Prodotti/infoProdotto?id=' . $id);
                        case "tipoErrato":
                            $view->formModificaProdotto($prodotto, $foto_prodotto, $categoria, $categoriaOld, "tipoErrato");
                            break;
                    }
                }
                
                //evita l'errore di modificare due volte l'header http
                if($img != "dimensioniMax" && $img!="tipoErrato")
                    header('Location: /techtopp/Prodotti/infoProdotto?id=' . $id);

            }

        }

        /**
         * Metodo dedicato all'eliminazione del prodotto
         */
        static function eliminaProdotto($id){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');

            $prodotto = $pm::load('FProdotto', array(['id', '=', $id]));
            $fotoProdotto = $pm::load('FFotoProdotto', array(['idProdotto', '=', $id]));

            if(CUtente::isLogged()){
                $utente = unserialize($session->readValue('utente'));

                //controllo che il prodotto fornito sia esistente
                if(isset($prodotto)){
                    if($utente->getId() == $prodotto->getIDUtente()){

                        $pm::delete('id', $id, 'FProdotto');
                        if(isset($fotoProdotto)){
                            $pm::delete('idProdotto', $id, 'FFotoProdotto');
                        }
                        header("Location: /techtopp/Utente/profilo");
                    }
                }else header('Location: /techtopp');

            }else header('Location: /techtopp/Utente/login');
        }
         /**
         * Metodo dedicato all'acquisto del prodotto
         */
        static function acquistaProdotto($id){

            $pm = USingleton::getInstance('FPersistentManager');
            $session = USingleton::getInstance('USession');
    
            $prodotto = $pm::load('FProdotto', array(['id', '=', $id]));    
            $view = new VProdotti();

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
    
                    if(CUtente::isLogged()){
    
                        $utente = unserialize($session->readValue('utente'));
                        $view->showFormAcquisto($prodotto);
                    }else{
                        header('Location: /techtopp/Utente/login');
                    }
                    
            }elseif($_SERVER['REQUEST_METHOD'] == "POST"){
                $utente = unserialize($session->readValue('utente'));
                //controllo che il prodotto fornito sia esistente, e che non appartenga a chi ha pubblicato l'annuncio
                if(isset($prodotto)){
                    if($utente->getId() != $prodotto->getIDUtente()){

                        $a = 1;
                        $pm::update('ControlloAcquisto', $a, 'id', $id, 'FProdotto');
                        $pm::update('IDUtenteC', $utente->getId(), 'id', $id, 'FProdotto');
                        $prodotto->setControlloAcquisto($a);
                        $prodotto->setIDUtenteC($utente->getId());
                        }
                        header("Location: /techtopp");
                    }
                }
            }
    }
