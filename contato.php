<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Monise Personalizados</title>
        <link rel="icon" href="assets/svg/logoMP.svg"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <header class="topo">
            <?php require_once("conteudo/menu.php")?>
        </header>
        <main>
            <?php require_once("conteudo/banner.php")?>
            <img id="fimBanner" src="assets/svg/faixaBranca01.svg" alt="Faixa Branca"/>
            <?php require_once("conteudo/contato.php")?>
            <img id="fimDestaque"src="assets/svg/faixaBranca02.svg" alt="Faixa Branca"/>
            <?php require_once("conteudo/app.php")?>
            <img id="fimApp" src="assets/svg/faixaBranca06.svg" alt="Faixa Branca"/>
            <?php require_once("conteudo/kits.php")?>
            <hr id="fimKits" />
        </main>
        <footer>
            <img id="fimNewsletter" src="assets/svg/faixaRodape.svg" alt="Faixa Rodape Monise Personalizados"/>
            <?php require_once("conteudo/rodape.php")?>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
