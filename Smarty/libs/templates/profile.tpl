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
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-1">
                    <a class="navbar-brand px-sm-1" href="/techtopp/">TECHTOP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/techtopp/">Home</a></li>
                            {if $userlogged =='nouser'}
                                    <li class="nav-item text-light">
                                     <a class="nav-link" href="/techtopp/Utente/login">Accedi</a>
                                     </li>
                                {else}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Prodotti/nuovoProdotto">Aggiungi prodotto</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/techtopp/Utente/logout">Disconnetti</a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <div class="container">
            <div class="col-12 text-center">
                <div class="form-box">
                        <div class="card-body little-profile text-center">
                        {if $foto_utente != null}
                            <div class="pro-img"><img src="data:{$foto_utente->getTipo()};base64,{$foto_utente->getFoto()}" width=100 height=100 alt="user"></div>
                        {else}
                            <div class="pro-img"><img src="/techtopp/smarty/libs/assets/default.jpg" width=100 height=100 alt="user"></div>
                        {/if}
                            <div class="ms-3">
                                <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                                {if $utente->getStato() == 0}
                                {if $utente->getAdmin() == 0}
                                    <p class="text-muted">Membro</p>
                                {else}
                                    <p class="text-muted">Amministratore</p>
                                {/if}
                                {else}
                                    <p class="text-muted">UTENTE BANNATO</p>
                                {/if}
                            </div>
                            {if $idutente == null}
                                <a method="get" class="btn btn-dark" href="/techtopp/Utente/modificaProfilo"> Modifica Profilo </a>
                            {elseif $idutente==$utente->getid()}
                            <a method="get" class="btn btn-dark" href="/techtopp/Recensione/scriviRecensione?id={$utente->getId()}"> Inserisci Recensione </a>
                            <input type="hidden" name="iddestinatario" value="{$utente->getId()}">
                            {/if}
                            <br>
                            <br>
                            <div class="ms-3">
                                {if $prodotti != null}
                                    {if is_array($prodotti)}
                                        <h3 class="m-b-0 font-light style="text-align: left;">{sizeof($prodotti)}<small> Prodotti Pubblicati</small></h3>
                                    {else}
                                        <h3 class="m-b-0 font-light style="text-align: left;"><small>1 Prodotto Pubblicato</small></h3>
                                    {/if}
                                {/if}
                                {if $prodotti_venduti != null}
                                    {if is_array($prodotti_venduti)}
                                        <h3 class="m-b-0 font-light style="text-align: left;">{sizeof($prodotti_venduti)}<small> Prodotti Venduti</small></h3>
                                    {else}
                                        <h3 class="m-b-0 font-light style="text-align: left;"><small>1 Prodotto Venduto</small></h3>
                                    {/if}
                                {/if}
                                </div>
                                </div>
                                </div>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Prodotti di {$utente->getNome()}</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            {if $prodotti != null}
                            {if is_array($prodotti)}
                             {for $i = 0; $i <sizeof($prodotti); $i++}
                               <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card"  >
                                      {if ($foto[$i])!= null}
                                        <img class="card-img-top same" src="data:{$foto[$i]->getTipo()};base64,{$foto[$i]->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                                      {else}
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                                         {/if}
                                            <h5 class="card-title">{$prodotti[$i]->getTitolo()}</h5>
                                            <p class="card-text">{substr($prodotti[$i]->getDescrizione(), 0, 56)}...</p>
                                            <a methods="POST"  class="btn btn-dark" href="../Prodotti/infoProdotto?id={$prodotti[$i]->getId()}" >Visualizza prodotto</a>
                                        </div>
                                      </div>
                                    </div>
                               {/for}
                             {else}
                             <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card">
                                      {if $foto!= null}
                                        <img class="card-img-top same" src="data:{$foto->getTipo()};base64,{$foto->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                                      {else}
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/pcdef.jpeg" style="width: 200px; height: 150px; align-content: center" />
                                         {/if}
                                            <h5 class="card-title">{$prodotti->getTitolo()}</h5>
                                            <p class="card-text">{substr($prodotti->getDescrizione(), 0, 56)}...</p>
                                            <a methods="POST"  class="btn btn-dark" href="../Prodotti/infoProdotto?id={$prodotti->getId()}" >Visualizza prodotto</a>
                                        </div>
                                      </div>
                                    </div>
                                {/if}
                            {else}
                            <h2> L'utente non ha ancora pubblicato prodotti</h2>
                        {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Recensioni di {$utente->getNome()}</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            {if $recensioni != null}
                            {if is_array($recensioni)}
                             {for $i = 0; $i <sizeof($recensioni); $i++}
                             {if ($mittente[$i]->getStato())==0}
                               <div id = "recensioni" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0"  >
                                            <h5 class="card-title">RECENSIONE</h5>
                                            <p class="card-text">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id={$mittente[$i]->getId()}">{$mittente[$i]->getNome()} {$mittente[$i]->getCognome()}</a></p>
                                            <p class="card-text">Valutazione: {$recensioni[$i]->getValutazione()}/5</p>
                                            <p class="card-text">{$recensioni[$i]->getMessaggio()}</p>
                                            {if $userlogged != 'nouser'}
                                            {if $utenteAutenticato->getId() == $mittente[$i]->getId()}
                                            <a style="color: blue;" href="../Recensione/eliminaRecensione?id={$recensioni[$i]->getId()}" >Elimina recensione</a>
                                            <input type="hidden" name="idrecensione" value="{$recensioni[$i]->getId()}">
                                            {/if}
                                            {/if}
                                        </div>
                                      </div>
                                    </div>
                                   {/if}
                               {/for}
                             {else}
                             {if ($mittente->getStato())==0}
                             <div id = "prodotti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0">
                                            <h5 class="card-title">RECENSIONE</h5>
                                            <p class="card-text">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id={$mittente->getId()}">{$mittente->getNome()} {$mittente->getCognome()}</a></p>
                                            <p class="card-text">Valutazione: {$recensioni->getValutazione()}/5</p>
                                            <p class="card-text">{$recensioni->getMessaggio()}</p>
                                            {if $userlogged != 'nouser'}
                                            {if $utenteAutenticato->getId() == $mittente->getId()}
                                            <a style="color: blue;" href="../Recensione/eliminaRecensione?id={$recensioni->getId()}" >Elimina recensione</a>
                                            <input type="hidden" name="idrecensione" value="{$recensioni->getId()}">
                                            {/if}
                                            {/if}
                                        </div>
                                      </div>
                                    </div>
                                  {/if}
                                {/if}
                            {else}
                            <h2> L'utente non ha ancora ricevuto recensioni</h2>
                            {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="copyright">
                     <div class="container">
                         <div class="row">
                            <div class="col-md-12">
                                <p>© 2023 All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                 </div>
                </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
               