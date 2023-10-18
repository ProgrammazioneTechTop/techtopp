<?php

class VProdotti
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    static function getTitolo(){
        return $_POST['titolo'];
    }

    static function getDescrizione(){
        return $_POST['descrizione'];
    }

    static function getPrezzo(){
        return $_POST['prezzo'];
    }

    static function getIdCateg(){
        return $_POST['categoria'];
    }
    public function showFormAcquisto($prodotto){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('prodotto', $prodotto);
        $this->smarty->display('./Smarty/libs/templates/pagamento.tpl');
    }

    public function formNuovoProdotto($autore, $categoria, $error){
            
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        switch ($error){
            case 'dimensioniMax':
                $this->smarty->assign('dimensioniMax', "dimensioniMax");
                break;
            case 'tipoErrato':
                $this->smarty->assign('tipoErrato', "tipoErrato");
                break;
        }

        $this->smarty->assign('autore', $autore);
        $this->smarty->assign('categoria', $categoria);

        $this->smarty->display('./smarty/libs/templates/nuovo_prodotto.tpl');
    }
    public function mostraInfo($prodotto, $foto_prodotto, $categoria, $autore, $foto_autore, $utente) {
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        $this->smarty->assign('autore', $autore);
        $this->smarty->assign('prodotto', $prodotto);
        $this->smarty->assign('foto_prodotto', $foto_prodotto);
        $this->smarty->assign('foto_autore', $foto_autore);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('utente',$utente);

        $this->smarty->display('./smarty/libs/templates/prodotto.tpl');
    }
    public function formModificaProdotto($prodotto, $foto_prodotto, $categoria, $categoriaOld, $error){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        else $this->smarty->assign('userlogged', 'nouser');

        switch ($error){
            case 'dimensioniMax':
                $this->smarty->assign('dimensioniMax', "dimensioniMax");
                break;
            case 'tipoErrato':
                $this->smarty->assign('tipoErrato', "tipoErrato");
                break;
        }

        $this->smarty->assign('prodotto', $prodotto);
        $this->smarty->assign('foto_prodotto', $foto_prodotto);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('categoriaOld', $categoriaOld);

        $this->smarty->display('./smarty/libs/templates/modifica_prodotto.tpl');
    }
}