<?php
/* Smarty version 4.3.0, created on 2023-10-04 23:54:53
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\edit-profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_651ddf2d62fa72_42664673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22d96af4d606db298773f9277a68e1cfb1565f45' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\edit-profile.tpl',
      1 => 1696435264,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651ddf2d62fa72_42664673 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtop</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/prof2.css" rel="stylesheet"/>
    <link href="/techtopp/smarty/libs/css/edit-profile.css" rel="stylesheet"/>
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
                        <form class="form-select-lg" method="post" action="/techtopp/Utente/modificaProfilo"  enctype="multipart/form-data">
                            <h2>Edit profile</h2>
                            <div class="inputbox">
                                <ion-icon name="Person"></ion-icon>
                                <input type="text" id="Nome" name="Nome" value="<?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
">
                                <label for="">Name</label>
                            </div>
                            <div class="inputbox">
                                <ion-icon name="Person"></ion-icon>
                                <input type="text" id="Cognome" name="Cognome" value="<?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
">
                                <label for="">Surname</label>
                            </div>
                            <!--<div class="inputbox">
                                <ion-icon name="mail-outline"></ion-icon>
                                <input disabled type="Email" value="<?php echo $_smarty_tpl->tpl_vars['utente']->value->getEmail();?>
">
                            </div>-->
                            <div class="forget">
                                <label for=""><a href="/techtopp/Utente/modificaPassword">Modifica Password</a></label>                 
                            </div>
                            <div class="mt-3 px-4"> <span class="text-uppercase name">Profile Picture</span>
                            <?php if ($_smarty_tpl->tpl_vars['foto_utente']->value != null) {?>
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getFoto();?>
" width=80 height=80 alt="user" class="rounded">
                            <?php } else { ?>
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="/techtopp/smarty/libs/assets/default.jpg" width=80 height=80 alt="user" class="rounded">
                            <?php }?>
                                    <div class="ml-3"><input class="btn btn-dark" type="file" name="file" id="formFile"/> </div>
                                </div>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-dark" >Salva Modifiche</button> 
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
