<?php

class VRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    static function getIdCategoria(){
        $value = "";
        if (!empty($_POST['categoria']))
            $value = $_POST['categoria'];
        return $value;
    }
    static function getTitolo(){
        $value = "";
        if (!empty($_POST['titolo']))
            $value = $_POST['titolo'];
        return $value;
    }
    public function showHome($prodotti_home, $prodotti_foto, $venditore_pr,$utente)
    {
        if(CUtente::isLogged())  $this->smarty->assign('userLogged', 'loggato');
        else $this->smarty->assign('userLogged', 'nouser');

        $this->smarty->assign('prodotti_home', $prodotti_home);
        $this->smarty->assign('venditore_pr', $venditore_pr);
        $this->smarty->assign('prodotti_foto', $prodotti_foto);
        $this->smarty->assign('utente', $utente);

        $this->smarty->display('./smarty/libs/templates/index.tpl');
    }
        /**
         * Metodo dedicato a mostrare i prodotti in esploraProdotti
         */
        public function mostraProdotti($prodotti, $prodotti_foto, $categoria){

            if (CUtente::isLogged())  $this->smarty->assign('userlogged', 'loggato');
            else $this->smarty->assign('userlogged', 'nouser');

            $this->smarty->assign('prodotti', $prodotti);
            $this->smarty->assign('prodotti_foto', $prodotti_foto);
            $this->smarty->assign('categoria', $categoria);

            $this->smarty->display('./smarty/libs/templates/prodotti.tpl');
            
        }
}