<?php
/* Smarty version 4.3.0, created on 2023-10-02 13:27:26
  from 'C:\xampp\htdocs\techtopp\smarty\libs\templates\mod_password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_651aa91e2ccb25_64896495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c236092abf686d3a125e3c610125b9f8f93be546' => 
    array (
      0 => 'C:\\xampp\\htdocs\\techtopp\\smarty\\libs\\templates\\mod_password.tpl',
      1 => 1696029245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_651aa91e2ccb25_64896495 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <link rel="stylesheet" href="../Smarty/libs/css/boot_styles.css">
  <title>techtopp</title>
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
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="/techtopp/Utente/modificaPassword" method="POST">
                    <h2>change password</h2>
                    <div class="inputbox">    
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="Password" required>
                        <label for="">Old Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="nuova_password" required>
                        <label for="">New Password</label>
                        <br/>
                    </div>
                    <div class="forget">
                        <label for=""><a href="#">Forget Password</a></label>   
                    </div>
                    <button type ="submit" class="btn btn-dark" >Salva Modifiche</button>
                </form>
            </div>
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['passErrata']->value))) {?>
        <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 20px;">
            <p align="center">La password inserita è errata, inseriscila correttamente per apportare le modifiche</p>
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
