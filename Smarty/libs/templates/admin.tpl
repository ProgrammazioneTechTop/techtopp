<!DOCTYPE html>
{assign var = 'userLogged' value=$userLogged|default:'nouser'}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>techtop</title>

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
    <div class="container">
    <form method="post" action="/techtopp/Admin/ricercaUtente"> 
            <label for="nome">Cerca utente</label>
            <div class="form-group">
            <input type="text" id="nome" name="nome" style = "width: 30%;">
            </div>
            <button type="submit" class="btn btn-dark" style = "width: 30%;">Cerca</button> 
            </form>
        </div>
        <br>
            <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                        <div class="card-body little-profile text-center">
                        {if $foto_admin != null}
                            <div class="pro-img"><img src="data:{$foto_admin->getTipo()};base64,{$foto_admin->getFoto()}" width=55 height=55 alt="user"></div>
                        {else}
                            <div class="pro-img"><img src="/techtopp/smarty/libs/assets/default.jpg" width=55 height=55 alt="user"></div>
                        {/if}
                            <div class="ms-3">
                                <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                                {if $utente->getAdmin() == 0}
                                    <p class="text-muted">Membro</p>
                                {/if}
                                {if $utente->getAdmin() == 1}
                                    <p class="text-muted">Amministratore</p>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Lista degli utenti</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            {if $list != null}
                            {if is_array($list)}
                             {for $i = 0; $i <sizeof($list); $i++}
                               <div id = "utenti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0"  >
                                      {if ($foto_utente[$i])!= null}
                                        <img class="card-img-top same" src="data:{$foto_utente[$i]->getTipo()};base64,{$foto_utente[$i]->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                                      {else}
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/default.jpg" style="width: 200px; height: 150px; align-content: center" />
                                         {/if}
                                            <h5 class="card-title">{$list[$i]->getNome()} {$list[$i]->getCognome()}</h5>
                                            <a methods="POST" href="../Utente/profilo?id={$list[$i]->getId()}" >Visualizza profilo</a>
                                            <br>
                                            {if $list[$i]->getStato()==0}
                                            <a methods="POST" href="../Admin/bannaUtente?id={$list[$i]->getId()}" >Banna utente</a>
                                            <input type="hidden" name="id" value="{$list[$i]->getId()}">
                                            {else}
                                            <a methods="POST" href="../Admin/sbannaUtente?id={$list[$i]->getId()}" >Sbanna utente</a>
                                            <input type="hidden" name="id" value="{$list[$i]->getId()}">
                                            {/if}
                                        </div>
                                      </div>
                                    </div>
                               {/for}
                             {else}
                             <div id = "utenti" class="col-lg-4 mb-5">
                                <div class="row" style="width: 15rem; height: 19rem">
                                    <div class="card  h-100 shadow border-0">
                                      {if $foto_utente!= null}
                                        <img class="card-img-top same" src="data:{$foto_utente->getTipo()};base64,{$foto_utente->getFoto()}" style="width: 200px; height: 150px; align-content: center" />
                                      {else}
                                         <img class="card-img-top same" src="/techtopp/smarty/libs/assets/default.jpg" style="width: 200px; height: 150px; align-content: center" />
                                         {/if}
                                            <h5 class="card-title">{$list->getNome()} {$list->getCognome()}</h5>
                                            <a methods="POST" href="../Utente/profilo?id={$list->getId()}" >Visualizza profilo</a>
                                            <br>
                                            {if $list->getStato()==0}
                                            <a methods="POST" href="../Admin/bannaUtente?id={$list->getId()}" >Banna utente</a>
                                            <input type="hidden" name="id" value="{$list->getId()}">
                                            {else}
                                            <a methods="POST" href="../Admin/sbannaUtente?id={$list->getId()}" >Sbanna utente</a>
                                            <input type="hidden" name="id" value="{$list->getId()}">
                                            {/if}
                                        </div>
                                      </div>
                                    </div>
                                {/if}
                            {else}
                            <h2> Non sono presenti utenti</h2>
                        {/if}
                    </div>
                </div> 
              </section>
                    </div>
                 </div>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
    </html>
               