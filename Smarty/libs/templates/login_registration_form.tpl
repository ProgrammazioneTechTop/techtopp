<!DOCTYPE html>
{assign var='Stato' value=$Stato|default:0}
{assign var='error' value=$error|default:''}
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
        {if isset($emailEsistente)}
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Email già in uso!</p>
        </div>
        {/if}
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>