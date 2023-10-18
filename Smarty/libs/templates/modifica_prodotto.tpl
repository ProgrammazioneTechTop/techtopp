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
                        <form class="form-select-lg" method="post" action="/techtopp/Prodotti/modificaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$prodotto->getId()}">
                            <h2>Edit product</h2>
                    <div class="inputbox">
                        <ion-icon name="Title"></ion-icon>
                        <input type="text" id="titolo" name="titolo" value="{$prodotto->getTitolo()}">
                        <label for="">Title</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="Description"></ion-icon>
                        <input type="text" id="descrizione" name="descrizione" value="{$prodotto->getDescrizione()}">
                        <label for="">Description</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="attach_money"></ion-icon>
                        <input type="text" id="prezzo" name="prezzo" value="{$prodotto->getPrezzo()}">
                        <label for="">Price</label>
                    </div>
                    <div class="inputbox">
                        <br>
                        <label class="form-label" for="categoria"></label>
                        <select id=categoria name="categoria" class="form-select" value="{$categoriaOld->getId()}">
                    {if isset($categoria)}
                        {if is_array($categoria)}
                            {for $i = 0; $i < sizeof($categoria); $i++}
                                <option value="{$categoria[$i]->getId()}">{$categoria[$i]->getCategoria()}</option>
                            {/for}
                        {/if}
                    {/if}
                    </select>
                    </div>
                       <input class="btn btn-dark" type="file" name="file" id="formFile"/>
                       <br>
                       <br>
                            <button type="submit" class="btn btn-dark" >Modifica prodotto</button> 
                        </form>
                        <form class="form-select-lg" method="post" action="/techtopp/Prodotti/eliminaProdotto?id={$prodotto->getId()}"  enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{$prodotto->getId()}">
                        <div class="forget">
                                <label for=""><a href="/techtopp/Prodotti/eliminaProdotto?id={$prodotto->getId()}"">Elimina prodotto</a></label>
                                <input type="hidden" name="id" value="{$prodotto->getId()}">                 
                            </div>
                        </form>
                    </div>
                </div>
                
                {if isset($dimensioniMax)}
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Siamo spiacenti, l'immagine supera le dimensioni consentite!</p>
               </div>
               {elseif isset($tipoErrato)}
            <div class="text-center" style="color: red; position: absolute; bottom: 0; width: 100%; margin-bottom: 55px;">
            <p align="center">Tipo di foto inserita errato!</p>
               </div>
            {/if}
            </section>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </body>
        </html>