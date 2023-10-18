<?php
/* Smarty version 4.3.0, created on 2023-10-17 01:41:48
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\prodotti.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652dca3c2195b1_98095825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '557a351e3c82ceecd3db5d38bb0040db75ad695d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\prodotti.tpl',
      1 => 1697499704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652dca3c2195b1_98095825 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/boot_styles.css" rel="stylesheet"/>
    <link href="/techtopp/smarty/libs/css/prof7.css" rel="stylesheet" type="text/css"/>
    <!-- Stile personalizzato per l'immagine di sfondo -->
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
        <section id="search" class="testimonials section-bg">
      <div class="container">

        <div class="section-title">
        <br>
          <h2>TUTTI I PRODOTTI</h2>
        </div>
    
    <form method="post" action="/techtopp/Ricerca/esploraProdotti"> 
            <label for="titolo">Cerca prodotto</label>
            <div class="form-group">
            <input type="text" id="titolo" name="titolo" style = "width: 30%;">
            </select>
            </div>
            <br> 
        <label for="categoria">Seleziona categoria</label> 
            <div class="form-group">
            <select id=categoria name="categoria" class="form-select" aria-label="Default select example" style = "width: 30%;">
                <option value=""></option>
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
            <br>
            <button type="submit" class="btn btn-dark" style = "width: 30%;">Cerca</button>
            </form>
        </div>
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Prodotti in evidenza</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <?php if ($_smarty_tpl->tpl_vars['prodotti']->value != null) {?>
                    <?php if (is_array($_smarty_tpl->tpl_vars['prodotti']->value) && is_array($_smarty_tpl->tpl_vars['prodotti_foto']->value)) {?>
                     <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotti']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['prodotti']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                       <div id = "prodotti" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                            <?php if (($_smarty_tpl->tpl_vars['prodotti_foto']->value[$_smarty_tpl->tpl_vars['i']->value]) != null) {?>
                                <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['prodotti_foto']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['prodotti_foto']->value[$_smarty_tpl->tpl_vars['i']->value]->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                            <?php } else { ?>
                                <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                               <?php }?> 
                                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getTitolo();?>
</h5>
                                    <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getDescrizione(),0,56);?>
...</p>
                                    <a methods="GET"  class="btn btn-dark" href="../Prodotti/infoProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotti']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
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
                            <div class="card"  >
                           <?php if ($_smarty_tpl->tpl_vars['prodotti_foto']->value != null) {?>
                                <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['prodotti_foto']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['prodotti_foto']->value->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                            <?php } else { ?>
                                <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                               <?php }?>        
                                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prodotti']->value->getTitolo();?>
</h5>
                                    <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['prodotti']->value->getDescrizione(),0,56);?>
...</p>
                                    <a methods="GET"  class="btn btn-dark" href="../Prodotti/infoProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotti']->value->getId();?>
" >Visualizza prodotto</a>
                                </div>
                            </div>
                         </div>
                        <?php }?>
                        <?php } else { ?>
                            <h2 style="color: red;">Siamo spiacenti, la ricerca non ha prodotto risultati!</h2>
                        <?php }?>
                    </div>
                </div>
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
