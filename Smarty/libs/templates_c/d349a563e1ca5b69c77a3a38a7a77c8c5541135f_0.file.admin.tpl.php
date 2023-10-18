<?php
/* Smarty version 4.3.0, created on 2023-10-17 02:19:17
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652dd3055012a4_00690136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd349a563e1ca5b69c77a3a38a7a77c8c5541135f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\admin.tpl',
      1 => 1697501948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652dd3055012a4_00690136 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userLogged', (($tmp = $_smarty_tpl->tpl_vars['userLogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtop</title>

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
    <div class="container">
    <form method="post" action="/techtopp/Admin/ricercaUtente"> 
            <label for="nome">Cerca utente</label>
            <div class="form-group">
            <input type="text" id="nome" name="nome" style = "width: 30%;">
            </div>
            <button type="submit" class="btn btn-dark" style = "width: 30%;">Cerca</button> 
            </form>
        </div>
        <br>
            <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                        <div class="card-body little-profile text-center">
                        <?php if ($_smarty_tpl->tpl_vars['foto_admin']->value != null) {?>
                            <div class="pro-img"><img src="data:<?php echo $_smarty_tpl->tpl_vars['foto_admin']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_admin']->value->getFoto();?>
" width=55 height=55 alt="user"></div>
                        <?php } else { ?>
                            <div class="pro-img"><img src="/techtopp/smarty/libs/assets/default.jpg" width=55 height=55 alt="user"></div>
                        <?php }?>
                            <div class="ms-3">
                                <h3 class="m-b-0"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h3>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getAdmin() == 0) {?>
                                    <p class="text-muted">Membro</p>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getAdmin() == 1) {?>
                                    <p class="text-muted">Amministratore</p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Lista degli utenti</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php if ($_smarty_tpl->tpl_vars['list']->value != null) {?>
                            <?php if (is_array($_smarty_tpl->tpl_vars['list']->value)) {?>
                             <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['list']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['list']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                               <div id = "utenti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0"  >
                                      <?php if (($_smarty_tpl->tpl_vars['foto_utente']->value[$_smarty_tpl->tpl_vars['i']->value]) != null) {?>
                                        <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value[$_smarty_tpl->tpl_vars['i']->value]->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                                      <?php } else { ?>
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/default.jpg" style="width: 200px; height: 150px; align-content: center" />
                                         <?php }?>
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</h5>
                                            <a methods="POST" href="../Utente/profilo?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Visualizza profilo</a>
                                            <br>
                                            <?php if ($_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getStato() == 0) {?>
                                            <a methods="POST" href="../Admin/bannaUtente?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Banna utente</a>
                                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
">
                                            <?php } else { ?>
                                            <a methods="POST" href="../Admin/sbannaUtente?id=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
" >Sbanna utente</a>
                                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
">
                                            <?php }?>
                                        </div>
                                      </div>
                                    </div>
                               <?php }
}
?>
                             <?php } else { ?>
                             <div id = "utenti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0">
                                      <?php if ($_smarty_tpl->tpl_vars['foto_utente']->value != null) {?>
                                        <img class="card-img-top same" src="data:<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['foto_utente']->value->getFoto();?>
" style="width: 200px; height: 150px; align-content: center" />
                                      <?php } else { ?>
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/default.jpg" style="width: 200px; height: 150px; align-content: center" />
                                         <?php }?>
                                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['list']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['list']->value->getCognome();?>
</h5>
                                            <a methods="POST" href="../Utente/profilo?id=<?php echo $_smarty_tpl->tpl_vars['list']->value->getId();?>
" >Visualizza profilo</a>
                                            <br>
                                            <?php if ($_smarty_tpl->tpl_vars['list']->value->getStato() == 0) {?>
                                            <a methods="POST" href="../Admin/bannaUtente?id=<?php echo $_smarty_tpl->tpl_vars['list']->value->getId();?>
" >Banna utente</a>
                                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['list']->value->getId();?>
">
                                            <?php } else { ?>
                                            <a methods="POST" href="../Admin/sbannaUtente?id=<?php echo $_smarty_tpl->tpl_vars['list']->value->getId();?>
" >Sbanna utente</a>
                                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['list']->value->getId();?>
">
                                            <?php }?>
                                        </div>
                                      </div>
                                    </div>
                                <?php }?>
                            <?php } else { ?>
                            <h2> Non sono presenti utenti</h2>
                        <?php }?>
                    </div>
                </div> 
              </section>
                    </div>
                 </div>
            <!-- Bootstrap core JS-->
            <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
        </body>
    </html>
               <?php }
}
