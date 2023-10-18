<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../Smarty/libs/css/log.css">
  <link rel="stylesheet" href="../Smarty/libs/css/boot_styles.css">
  <title>techtopp</title>
  <script>
    function ready(){
        if (!navigator.cookieEnabled) {
            alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
        }
    }
    document.addEventListener("DOMContentLoaded", ready);
</script>

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
        {if isset($passErrata)}
        <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 20px;">
            <p align="center">La password inserita è errata, inseriscila correttamente per apportare le modifiche</p>
        </div>
    {/if}
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>