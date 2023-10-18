<!DOCTYPE html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>

    <!-- Collegamento ai file CSS di Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>
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
    <script>
        function ready(){
            if(!navigator.cookieEnabled){
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione')
            }
        }
        document.addEventListener("DOMContentLoaded",ready);
    </script>

</head>
    <body class="d-flex flex-column h-25">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/techtopp/">TECHTOP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/techtopp/">Home</a></li>
                            {if $userLogged!='nouser'}
                            {if $utente->getAdmin()== 1}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Admin/homepage">Amministratore</a>
                                </li>
                            {/if}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Prodotti/nuovoProdotto">Aggiungi prodotto</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/logout">Disconnetti</a>
                                </li>
                            {else}
                            <li class="nav-item">
                                <a class="nav-link" href="/techtopp/Utente/login">Accedi</a>
                            </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
    <div class="container my-15 text-center">
        <img class="rounded-circle" src="/techtopp/smarty/libs/assets/logo.jpg" width="40" height="40">
        <h1 class="header_top">BENVENUTO SU TECHTOP</h1>
        <p class="lead"> used technology </p>
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <section class="banner_main" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-bg">
                    <a href="Contatti/chiSiamo" type="button" class="btn btn-dark">Contattaci</a>
                    {if isset($prodotti_home)}
                    <a href="Ricerca/esploraProdotti" type="button" class="btn btn-dark">Tutti i prodotti</a>
                      {/if}
                        <h1 style="font-weight: 600;font-size:75px"> <span class="blodark"> TECHTOP</span> <br>Used technology</h1>
                        <p class="lead">Trends 2023</p>
                        <button onclick="document.location='#prodotti'" id = "shopnow" type="button" class="btn btn-dark" style = "width: 20%;">Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p></p>
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Prodotti in evidenza</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                    {if is_array($prodotti_home) && is_array($prodotti_foto)}
                     {for $i = 0; $i <sizeof($prodotti_home); $i++}
                       <div id = "prodotti" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                            {if ($prodotti_foto[$i])!= null}
                                <img class="card-img-top same" src="data:{$prodotti_foto[$i]->getTipo()};base64,{$prodotti_foto[$i]->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                            {else}
                                <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                               {/if} 
                                    <h5 class="card-title">{$prodotti_home[$i]->getTitolo()}</h5>
                                    <p class="card-text">{substr($prodotti_home[$i]->getDescrizione(), 0, 56)}...</p>
                                    <a methods="GET"  class="btn btn-dark" href="Prodotti/infoProdotto?id={$prodotti_home[$i]->getId()}" >Visualizza prodotto</a>
                                </div>
                              </div>
                            </div>
                       {/for}
                       {else}
                       <div id = "prodotti" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                           {if $prodotti_foto!= null}
                                <img class="card-img-top same" src="data:{$prodotti_foto->getTipo()};base64,{$prodotti_foto->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                            {else}
                                <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                               {/if}        
                                    <h5 class="card-title">{$prodotti_home->getTitolo()}</h5>
                                    <p class="card-text">{substr($prodotti_home->getDescrizione(), 0, 56)}...</p>
                                    <a methods="GET"  class="btn btn-dark" href="Prodotti/infoProdotto?id={$prodotti_home->getId()}" >Visualizza prodotto</a>
                                </div>
                            </div>
                         </div>
                     {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
            <footer id="footer">
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="inror_box">
                                    <h3>INFORMAZIONI </h3>
                                    <p>Questo è un sito per la compravendita di oggetti di ogni tipo, è necessario registrarsi per pubblicare annunci mentre non è necessario registrarsi per acquistare oggetti. <a href="#shopnow">Shop now</a> </p>
    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="inror_box">
                                    <h3>ACCOUNT </h3>
                                    <p>Per registrarsi o loggarsi basta cliccare sulla voce <a href="#searchbar">Login/Registrati</a> in alto a sinistra. </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="inror_box">
                                    <h3>ABOUT US  </h3>
                                    <p>Edoardo Perreca email: <a href="mailto:edoardo.perreca@student.univaq.it">edoardo.perreca@student.univaq.it</a> </p>
                                    <p>Ulderico Fosca email: <a href="mailto:ulderico.fosca@student.univaq.it">ulderico.fosca@student.univaq.it</a> </p>
                                    <p>Gennaro Ranalli email: <a href="mailto:gennaro.ranalli@student.univaq.it">gennaro.ranalli@student.univaq.it</a> </p>
                                    <p>Sara Rea email: <a href="mailto:sara.rea@student.univaq.it">sara.rea@student.univaq.it</a> </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="inror_box">
                                    <h3>SOCIAL CONTACTS  </h3>
                                    <p>Facebook:</p>
                                    <p><a href="https://www.facebook.com/profile.php?id=100013442918440">Edoardo Perreca</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>© 2023 All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>