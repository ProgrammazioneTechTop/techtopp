<?php
/* Smarty version 4.3.0, created on 2023-10-17 15:07:06
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\nuovo_prodotto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652e86fa479231_25177958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8d7a08cf775a0181e5e803f0cebaa8773f65e11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\nuovo_prodotto.tpl',
      1 => 1697496901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652e86fa479231_25177958 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <form class="form-select-lg" method="post" action="/techtopp/Prodotti/nuovoProdotto"  enctype="multipart/form-data">
                            <h2>New product</h2>
                    <div class="inputbox">
                        <ion-icon name="Title"></ion-icon>
                        <input type="text" name="titolo" required>
                        <label for="">Title</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="Description"></ion-icon>
                        <input type="text" name="descrizione" required>
                        <label for="">Description</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="attach_money"></ion-icon>
                        <input type="text" name="prezzo" required>
                        <label for="">Price</label>
                    </div>
                    <div class="inputbox">
                        <br>
                        <label class="form-label" for="categoria"></label>
                        <select id=categoria name="categoria" class="form-select" required>
                    <?php if ((isset($_smarty_tpl->tpl_vars['categoria']->value))) {?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['categoria']->value)) {?>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categoria']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categoria']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</option>
                            <?php }
}
?>
                        <?php }?>
                    <?php }?>
                    </select>
                    </div>
                       <input class="btn btn-dark" type="file" name="file" id="formFile"/>
                       <br>
                       <br>
                            <button type="submit" class="btn btn-dark" >Inserisci prodotto</button> 
                        </form>
                    </div>
                </div>
                <?php if ((isset($_smarty_tpl->tpl_vars['dimensioniMax']->value))) {?>
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Siamo spiacenti, l'immagine supera le dimensioni consentite!</p>
               </div>
               <?php } elseif ((isset($_smarty_tpl->tpl_vars['tipoErrato']->value))) {?>
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Tipo di foto inserita errato!</p>
               </div>
            <?php }?>
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
