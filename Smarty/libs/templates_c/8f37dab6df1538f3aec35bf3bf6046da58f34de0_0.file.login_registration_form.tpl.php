<?php
/* Smarty version 4.3.0, created on 2023-09-30 01:22:03
  from 'C:\xampp\htdocs\techtopp\Smarty\libs\templates\login_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65175c1b4d3cb7_23779099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f37dab6df1538f3aec35bf3bf6046da58f34de0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\Smarty\\libs\\templates\\login_registration_form.tpl',
      1 => 1696029721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65175c1b4d3cb7_23779099 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('Stato', (($tmp = $_smarty_tpl->tpl_vars['Stato']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp));
$_smarty_tpl->_assignInScope('error', (($tmp = $_smarty_tpl->tpl_vars['error']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp));?>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <title>techtopp</title>
</head>
<body>
    <section>
        <div class="form-box-reg">
            <div class="form-value">
                <form action="/techtopp/Utente/registrazione" method="POST">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Nome" required>
                        <label for="">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="Person"></ion-icon>
                        <input type="text" name="Cognome" required>
                        <label for="">Surname</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="Email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="Password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit">Register</button>
                    <div class="register">
                        <p>Already have an account? <a href="/techtopp/Utente/login">Login now</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['emailEsistente']->value))) {?>
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Email già in uso!</p>
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
