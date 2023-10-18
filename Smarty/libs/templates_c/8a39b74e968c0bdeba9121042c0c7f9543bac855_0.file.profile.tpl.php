<?php
/* Smarty version 4.3.0, created on 2023-10-17 11:10:49
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652e4f99e6ac70_92935805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a39b74e968c0bdeba9121042c0c7f9543bac855' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\profile.tpl',
      1 => 1697533821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652e4f99e6ac70_92935805 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>

    <!-- Collegamento ai file CSS di Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>
    <link href="/techtopp/smarty/libs/css/prof7.css" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-image: url('/techtopp/smarty/libs/assets/robot2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            color: #000; /* Testo nero */
        }
    </style>
    <?php echo '<script'; ?>
>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione')
            }
        }
        document.addEventListener("DOMContentLoaded",ready);
    <?php echo '</script'; ?>
>

</head>
    <body class="d-flex flex-column h-25">
        <main class="flex-shrink-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/techtopp/">TECHTOP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/techtopp/">Home</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value == 'nouser') {?>
                                    <li class="nav-item text-light">
                                     <a class="nav-link" href="/techtopp/Utente/login">Accedi</a>
                                     </li>
                                <?php } else { ?>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Prodotti/nuovoProdotto">Aggiungi prodotto</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/logout">Disconnetti</a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <div class="container">
            <div class="col-12 text-center">
                <div class="form-box">
                        <div class="card-body little-profile text-center">
                        <?php if ($_smarty_tpl->tpl_vars['foto_utente']->value != null) {?>
                            <div class="pro-img"><img src="data:<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getFoto();?>
" width=100 height=100 alt="user"></div>
                        <?php } else { ?>
                            <div class="pro-img"><img src="/techtopp/smarty/libs/assets/default.jpg" width=100 height=100 alt="user"></div>
                        <?php }?>
                            <div class="ms-3">
                                <h3 class="m-b-0"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h3>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getStato() == 0) {?>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getAdmin() == 0) {?>
                                    <p class="text-muted">Membro</p>
                                <?php } else { ?>
                                    <p class="text-muted">Amministratore</p>
                                <?php }?>
                                <?php } else { ?>
                                    <p class="text-muted">UTENTE BANNATO</p>
                                <?php }?>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['idutente']->value == null) {?>
                                <a method="get" class="btn btn-dark" href="/techtopp/Utente/modificaProfilo"> Modifica Profilo </a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['idutente']->value == $_smarty_tpl->tpl_vars['utente']->value->getid()) {?>
                            <a method="get" class="btn btn-dark" href="/techtopp/Recensione/scriviRecensione?id=<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
"> Inserisci Recensione </a>
                            <input type="hidden" name="iddestinatario" value="<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
">
                            <?php }?>
                            <br>
                            <br>
                            <div class="ms-3">
                                <?php if ($_smarty_tpl->tpl_vars['prodotti']->value != null) {?>
                                    <?php if (is_array($_smarty_tpl->tpl_vars['prodotti']->value)) {?>
                                        <h3 class="m-b-0 font-light style="text-align: left;"><?php echo sizeof($_smarty_tpl->tpl_vars['prodotti']->value);?>
<small> Prodotti Pubblicati</small></h3>
                                    <?php } else { ?>
                                        <h3 class="m-b-0 font-light style="text-align: left;"><small>1 Prodotto Pubblicato</small></h3>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['prodotti_venduti']->value != null) {?>
                                    <?php if (is_array($_smarty_tpl->tpl_vars['prodotti_venduti']->value)) {?>
                                        <h3 class="m-b-0 font-light style="text-align: left;"><?php echo sizeof($_smarty_tpl->tpl_vars['prodotti_venduti']->value);?>
<small> Prodotti Venduti</small></h3>
                                    <?php } else { ?>
                                        <h3 class="m-b-0 font-light style="text-align: left;"><small>1 Prodotto Venduto</small></h3>
                                    <?php }?>
                                <?php }?>
                                </div>
                                </div>
                                </div>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Prodotti di <?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php if ($_smarty_tpl->tpl_vars['prodotti']->value != null) {?>
                            <?php if (is_array($_smarty_tpl->tpl_vars['prodotti']->value)) {?>
                             <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotti']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotti']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                               <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card"  >
                                      <?php if (($_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['i']->value]) != null) {?>
                                        <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto']->value[$_smarty_tpl->tpl_vars['i']->value]->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                                      <?php } else { ?>
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                                         <?php }?>
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getTitolo();?>
</h5>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getDescrizione(),0,56);?>
...</p>
                                            <a methods="POST"  class="btn btn-dark" href="../Prodotti/infoProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Visualizza prodotto</a>
                                        </div>
                                      </div>
                                    </div>
                               <?php }
}
?>
                             <?php } else { ?>
                             <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card">
                                      <?php if ($_smarty_tpl->tpl_vars['foto']->value != null) {?>
                                        <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['foto']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto']->value->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                                      <?php } else { ?>
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                                         <?php }?>
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotti']->value->getTitolo();?>
</h5>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['prodotti']->value->getDescrizione(),0,56);?>
...</p>
                                            <a methods="POST"  class="btn btn-dark" href="../Prodotti/infoProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotti']->value->getId();?>
" >Visualizza prodotto</a>
                                        </div>
                                      </div>
                                    </div>
                                <?php }?>
                            <?php } else { ?>
                            <h2> L'utente non ha ancora pubblicato prodotti</h2>
                        <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Recensioni di <?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php if ($_smarty_tpl->tpl_vars['recensioni']->value != null) {?>
                            <?php if (is_array($_smarty_tpl->tpl_vars['recensioni']->value)) {?>
                             <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['recensioni']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['recensioni']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                             <?php if (($_smarty_tpl->tpl_vars['mittente']->value[$_smarty_tpl->tpl_vars['i']->value]->getStato()) == 0) {?>
                               <div id = "recensioni" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0"  >
                                            <h5 class="card-title">RECENSIONE</h5>
                                            <p class="card-text">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id=<?php echo $_smarty_tpl->tpl_vars['mittente']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['mittente']->value[$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['mittente']->value[$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</a></p>
                                            <p class="card-text">Valutazione: <?php echo $_smarty_tpl->tpl_vars['recensioni']->value[$_smarty_tpl->tpl_vars['i']->value]->getValutazione();?>
/5</p>
                                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['recensioni']->value[$_smarty_tpl->tpl_vars['i']->value]->getMessaggio();?>
</p>
                                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['utenteAutenticato']->value->getId() == $_smarty_tpl->tpl_vars['mittente']->value[$_smarty_tpl->tpl_vars['i']->value]->getId()) {?>
                                            <a style="color: blue;" href="../Recensione/eliminaRecensione?id=<?php echo $_smarty_tpl->tpl_vars['recensioni']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Elimina recensione</a>
                                            <input type="hidden" name="idrecensione" value="<?php echo $_smarty_tpl->tpl_vars['recensioni']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
">
                                            <?php }?>
                                            <?php }?>
                                        </div>
                                      </div>
                                    </div>
                                   <?php }?>
                               <?php }
}
?>
                             <?php } else { ?>
                             <?php if (($_smarty_tpl->tpl_vars['mittente']->value->getStato()) == 0) {?>
                             <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0">
                                            <h5 class="card-title">RECENSIONE</h5>
                                            <p class="card-text">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id=<?php echo $_smarty_tpl->tpl_vars['mittente']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['mittente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['mittente']->value->getCognome();?>
</a></p>
                                            <p class="card-text">Valutazione: <?php echo $_smarty_tpl->tpl_vars['recensioni']->value->getValutazione();?>
/5</p>
                                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['recensioni']->value->getMessaggio();?>
</p>
                                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                            <?php if ($_smarty_tpl->tpl_vars['utenteAutenticato']->value->getId() == $_smarty_tpl->tpl_vars['mittente']->value->getId()) {?>
                                            <a style="color: blue;" href="../Recensione/eliminaRecensione?id=<?php echo $_smarty_tpl->tpl_vars['recensioni']->value->getId();?>
" >Elimina recensione</a>
                                            <input type="hidden" name="idrecensione" value="<?php echo $_smarty_tpl->tpl_vars['recensioni']->value->getId();?>
">
                                            <?php }?>
                                            <?php }?>
                                        </div>
                                      </div>
                                    </div>
                                  <?php }?>
                                <?php }?>
                            <?php } else { ?>
                            <h2> L'utente non ha ancora ricevuto recensioni</h2>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="copyright">
                     <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <p>© 2023 All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                 </div>
                </footer>
            <!-- Bootstrap core JS-->
            <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
        </body>
    </html>
               <?php }
}
