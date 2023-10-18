<?php
/* Smarty version 4.3.0, created on 2023-10-17 15:02:56
  from 'C:\xampp\htdocs\techtopp\Smarty\libs\templates\pagamento.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652e860094e651_59368356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb11b1b6edb6b6014c2cbae8cc5b2896f6db461b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\Smarty\\libs\\templates\\pagamento.tpl',
      1 => 1697496910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652e860094e651_59368356 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = $_smarty_tpl->tpl_vars['userlogged']->value ?? null)===null||$tmp==='' ? 'nouser' ?? null : $tmp));?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/prof5.css" rel="stylesheet"/>
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
                <div class="form-box-reg">
                <div class="form-value">
                <form class="form-select-lg" method="POST" action="/techtopp/Prodotti/acquistaProdotto?id=<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
"  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['prodotto']->value->getId();?>
">
                <h1>Conferma pagamento</h1>
                <br>
                <h3>Possessore della carta</h3>
                <div class="input-field">
                    <input type="text">
                </div>
                <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password">
                </div>
            </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Numero della carta</h3>
                <div class="input-field">
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Data di scadenza</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2020">2023</option>
                        <option value="2019">2024</option>
                        <option value="2018">2025</option>
                        <option value="2017">2026</option>
                        <option value="2016">2027</option>
                        <option value="2015">2028</option>
                      </select>
                </div>
            </div>    
        </div>
        <br>
        <button type="submit" class="btn btn-dark">Conferma acquisto</button>
        </form>
    </section>
    </div>
    </div>
       <?php echo '<script'; ?>
 type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"><?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
