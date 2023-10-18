<?php
/* Smarty version 4.3.0, created on 2023-10-17 00:56:41
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\prodotto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652dbfa9052f57_03674272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc8c327a892070456ca5b49648f170a9dac2f635' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\prodotto.tpl',
      1 => 1697496932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652dbfa9052f57_03674272 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/prof4.css" rel="stylesheet"/>
    <link href="/techtopp/smarty/libs/css/boot_styles.css" rel="stylesheet"/>
    <?php echo '<script'; ?>
>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
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
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Prodotti/nuovoProdotto">Aggiungi prodotto</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/logout">Disconnetti</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item text-light">
                                     <a class="nav-link" href="/techtopp/Utente/login">Accedi</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
            <section>
                <div class="form-box-prof">
                    <div class="form-value">
                        <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                            <?php if ($_smarty_tpl->tpl_vars['utente']->value->getId() == $_smarty_tpl->tpl_vars['autore']->value->getId()) {?>
                                <form class="form-select-lg" method="GET" action="/techtopp/Prodotti/modificaProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
"  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
">
                            <?php } else { ?>
                                <form class="form-select-lg" method="GET" action="/techtopp/Prodotti/acquistaProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
"  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
">
                            <?php }?>
                        <?php }?>
                            <h2><?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getTitolo();?>
</h2>
                            <div class="mt-3 px-4"> 
                            <?php if ($_smarty_tpl->tpl_vars['foto_prodotto']->value != null) {?>
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['foto_prodotto']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_prodotto']->value->getFoto();?>
" width=200 height=200 alt="user" class="rounded">
                            <?php } else { ?>
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="/techtopp/smarty/libs/assets/pcdef.jpeg" width=200 height=200 alt="user" class="rounded">
                            <?php }?>
                           </div>
                           <br>
                           <p class="card-title">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id=<?php echo $_smarty_tpl->tpl_vars['autore']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['autore']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['autore']->value->getCognome();?>
</a></p>
                           <p class="card-title">DESCRIZIONE:</p>
                           <p class="inputbox"><?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getDescrizione();?>
</p>
                           <p class="inputbox">PREZZO: <?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getPrezzo();?>
$</p>
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getId() == $_smarty_tpl->tpl_vars['autore']->value->getId()) {?>
                                    <button type="submit" class="btn btn-dark" >Modifica prodotto</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-dark" >Acquista prodotto</button>
                                <?php }?>
                            <?php } else { ?>
                            <p style="color: blue;"> Devi effettuare il login per acquistare i prodotti!</p>
                            <?php }?> 
                        </form>
                    </div>
                </div>
            </section>
            <?php echo '<script'; ?>
 type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"><?php echo '</script'; ?>
>
        </body>
        </html><?php }
}
