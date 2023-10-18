<?php
/* Smarty version 4.3.0, created on 2023-10-17 15:11:30
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\nuova_recensione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652e88023f1b42_14230034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27f89f8f7a1aec06300bd0d4ec9902d98f0740d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\nuova_recensione.tpl',
      1 => 1697496893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652e88023f1b42_14230034 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/log.css" rel="stylesheet"/>
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
                <div class="form-box">
                    <div class="form-value">
                        <form class="form-select-lg" method="post" action="/techtopp/Recensione/scriviRecensione?id=<?php echo $_smarty_tpl->tpl_vars['destinatario']->value->getId();?>
"  enctype="multipart/form-data">
                        <input type="hidden" name="iddestinatario" value="<?php echo $_smarty_tpl->tpl_vars['destinatario']->value->getId();?>
">
                            <h2>Nuova recensione</h2>
                    <div class="inputbox">
                        <input type="text" id="messaggio" name="messaggio">
                        <label for="">Messaggio</label>
                    </div>
                    <div class="inputbox">
                    <a>Valutazione</a>
                        <br>
                        <label class="form-label" for="valutazione"></label>
                        <select id=valutazione name="valutazione" class="form-select">
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->tpl_vars['i']->value < 6) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < 6; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                            <?php }
}
?>
                    </select>
                    </div>
                            <button type="submit" class="btn btn-dark" >Inserisci recensione</button> 
                        </form>             
                            </div>
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
