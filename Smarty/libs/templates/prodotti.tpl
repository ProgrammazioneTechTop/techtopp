<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
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
    <script>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    </script>
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
                            {if $userlogged!='nouser'}
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
                                <li class="nav-item text-light">
                                     <a class="nav-link" href="/techtopp/Utente/login">Accedi</a>
                            </li>
                            {/if}
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
                    {if isset($categoria)}
                        {if is_array($categoria)}
                            {for $i = 0; $i < sizeof($categoria); $i++}
                                <option value="{$categoria[$i]->getId()}">{$categoria[$i]->getCategoria()}</option>
                            {/for}
                        {/if}
                    {/if}
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
                    {if $prodotti != null}
                    {if is_array($prodotti) && is_array($prodotti_foto)}
                     {for $i = 0; $i <sizeof($prodotti); $i++}
                       <div id = "prodotti" class="col-lg-4 mb-5">
                        <div class="row" style="width: 15rem; height: 19rem">
                            <div class="card"  >
                            {if ($prodotti_foto[$i])!= null}
                                <img class="card-img-top same" src="data:{$prodotti_foto[$i]->getTipo()};base64,{$prodotti_foto[$i]->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                            {else}
                                <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                               {/if} 
                                    <h5 class="card-title">{$prodotti[$i]->getTitolo()}</h5>
                                    <p class="card-text">{substr($prodotti[$i]->getDescrizione(), 0, 56)}...</p>
                                    <a methods="GET"  class="btn btn-dark" href="../Prodotti/infoProdotto?id={$prodotti[$i]->getId()}" >Visualizza prodotto</a>
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
                                    <h5 class="card-title">{$prodotti->getTitolo()}</h5>
                                    <p class="card-text">{substr($prodotti->getDescrizione(), 0, 56)}...</p>
                                    <a methods="GET"  class="btn btn-dark" href="../Prodotti/infoProdotto?id={$prodotti->getId()}" >Visualizza prodotto</a>
                                </div>
                            </div>
                         </div>
                        {/if}
                        {else}
                            <h2 style="color: red;">Siamo spiacenti, la ricerca non ha prodotto risultati!</h2>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>