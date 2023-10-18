<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtopp</title>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/techtopp/smarty/libs/css/prof4.css" rel="stylesheet"/>
    <link href="/techtopp/smarty/libs/css/boot_styles.css" rel="stylesheet"/>
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
            <section>
                <div class="form-box-prof">
                    <div class="form-value">
                        {if $userlogged != 'nouser'}
                            {if $utente->getId() == $autore->getId()}
                                <form class="form-select-lg" method="GET" action="/techtopp/Prodotti/modificaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{$prodotto->getId()}">
                            {else}
                                <form class="form-select-lg" method="GET" action="/techtopp/Prodotti/acquistaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{$prodotto->getId()}">
                            {/if}
                        {/if}
                            <h2>{$prodotto->getTitolo()}</h2>
                            <div class="mt-3 px-4"> 
                            {if $foto_prodotto != null}
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="data:{$foto_prodotto->getTipo()};base64,{$foto_prodotto->getFoto()}" width=200 height=200 alt="user" class="rounded">
                            {else}
                                <div class="d-flex flex-row align-items-center mt-2"> <img src="/techtopp/smarty/libs/assets/pcdef.jpeg" width=200 height=200 alt="user" class="rounded">
                            {/if}
                           </div>
                           <br>
                           <p class="card-title">AUTORE: <a style="color: blue;" href="/techtopp/Utente/profilo?id={$autore->getId()}">{$autore->getNome()} {$autore->getCognome()}</a></p>
                           <p class="card-title">DESCRIZIONE:</p>
                           <p class="inputbox">{$prodotto->getDescrizione()}</p>
                           <p class="inputbox">PREZZO: {$prodotto->getPrezzo()}$</p>
                            {if $userlogged != 'nouser'}
                                {if $utente->getId() == $autore->getId()}
                                    <button type="submit" class="btn btn-dark" >Modifica prodotto</button>
                                {else}
                                    <button type="submit" class="btn btn-dark" >Acquista prodotto</button>
                                {/if}
                            {else}
                            <p style="color: blue;"> Devi effettuare il login per acquistare i prodotti!</p>
                            {/if} 
                        </form>
                    </div>
                </div>
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>