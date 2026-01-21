<?php
    if(!isset($_SESSION)):
        session_start();
    endif;

    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Loja KaBuM Clone</title>


    <link rel="stylesheet" href="/projetoPOO/src/public/home/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f5f5f5;
    color: #333;
}

header.light {
    background: linear-gradient(90deg, #ff6600, #ff9900);
    padding: 15px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

header .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Logo */
header .logo h1 {
    font-size: 1.8rem;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #000;
    transition: transform 0.3s ease;
}

header .logo h1:hover {
    transform: scale(1.05);
}

/* Carrinho */
header .cart ul {
    list-style: none;
    display: flex;
    align-items: center;
}

header .cart li {
    position: relative;
}

header .cart li a {
    color: #000;
    font-size: 1.6rem;
    position: relative;
    transition: transform 0.2s ease, color 0.2s ease;
}

header .cart li a:hover {
    transform: scale(1.15);
    color: #333;
}

/* Balão */
header .balao {
    position: absolute;
    top: -8px;
    right: -10px;
    background-color: red;
    color: #fff;
    font-size: 0.7rem;
    font-weight: bold;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}


.banner {
    background-image: url('lib/img/banner.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 90%;
    max-width: 1200px;
    height: 300px;
    margin: 40px auto 20px auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}


.produtos {
    max-width: 1200px;
    margin: 0 auto 60px auto;
    padding: 40px 20px;
}

.produtos .titulo {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 30px;
    text-align: center;
    color: #222;
}

/* Grid */
.produtos-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Card */
.produto-card {
    background-color: #fff;
    width: 250px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.2s ease;
}

.produto-card:hover {
    transform: translateY(-5px);
}

/* Imagem */
.produto-card img {
    width: 200px;
    height: 200px;
    object-fit: contain;
    margin-bottom: 15px;
}

/* Nome */
.produto-card .nome {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: center;
}

/* Preço */
.produto-card .preco {
    font-size: 20px;
    font-weight: bold;
    color: #ff6500;
    margin-bottom: 15px;
}

/* Botão */
.produto-card .btn {
    width: 100%;
    text-align: center;
    background-color: #ff6500;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.2s ease;
}

.produto-card .btn:hover {
    background-color: #e65c00;
}


@media (max-width: 768px) {
    header .container {
        flex-direction: column;
        gap: 15px;
    }

    .produto-card {
        width: 90%;
        max-width: 300px;
    }
}


.produtos {
    margin-bottom: 80px; 
}


footer {
    background-color: #1a1a1a;
    color: #fff;
    padding: 25px 0;
    text-align: center;
    font-size: 14px;
}

footer p {
    margin: 0;
    letter-spacing: 1px;
    opacity: 0.85;
}
</style>
</head>
<body>

    <!-- Header -->
    <header class="light">
        <div class="container">
            <div class="logo">
                <a href="">
                    <h1>Kabum Clone</h1>
                </a>
            </div>
            <div class="cart">
                <ul>
                    <li>
                        <a href="index.php?arquivo=Controlador&metodo=inserirCarrinho">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="balao">
                                <?php
                                   if(isset($_SESSION["carrinho"])):
                                        echo $_SESSION["qtdeProduto"];
                                        else:
                                            echo "0";
                                   endif;
                                ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner"></section>

    <!-- Produtos -->


    <section class="produtos">
    <h3 class="titulo">Monte já seu Computador Gamer</h3>
   
    <div class="produtos-container">

        <?php
        if(isset($ret) && count($ret) > 0): 
            foreach($ret as $indice => $item): ?>
            <div class="produto-card">
                <img src="lib/img/<?= $item->getImagem(); ?>" alt="">

                <p class="nome"><?= $item->getDescricao(); ?></p>

                <p class="preco">
                    R$ <?= number_format($item->getPreco(), 2, ',', '.'); ?>
                </p>

                <a 
                    href="index.php?arquivo=Controlador&metodo=inserirCarrinho&id=<?= $item->getId(); ?>" class="btn"
                >
                    Inserir no Carrinho
                </a>
            </div>
        <?php endforeach;
        endif; ?>

    </div>
</section>


        <footer>
            <p>2026 Kabum Clone</p>
        </footer>
</body>
</html>

