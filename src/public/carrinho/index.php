<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/> 
</head>
<body>
    <header class="light">
        <div class="container">
            <div class="logo">
                <a href="index.php?arquivo=controlador&metodo=index">
                    <h1>e-compras</h1>
                </a>
            </div>
            <div class="cart">
                <ul>
                    <li>
                        <a href="">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="balao">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

        <main>
                <table>
                    <tr>
                        <td>Id</td>
                        <td>Produto</td>
                        <td>Qtde</td>
                        <td>Preço</td>
                        <td>Imagem</td>
                        <td>Subtotal</td>
                        <td>Ação</td>
                    </tr>

                    <tr>
                        <td><?=   $_SESSION["carrinho"]["id"];?></td>
                        <td>ryzen</td>
                        <td>2</td>
                        <td>000.000</td>
                        <td><img src="lib/img/ryzen.jpg" alt=""></td>
                        <td>000.000</td>
                        <td><i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <label for="">Selecionar Clientes</label>
                            <select name="" id="">
                                <option value="">Selecione um cliente</option>
                                <option value="">Ciclano</option>
                                <option value="">Fulano</option>
                            </select>
                        
                            <label for="">Forma de pagamento</label>
                            <select name="" id="">
                                <option value="">Selecione uma forma de pagamento</option>
                                <option value="">Paypal</option>
                                <option value="">Cartao</option>
                                <option value="">Boleto</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="index.php?arquivo=controlador&metodo=index">Comprar mais</a>
                        <input type="submit" value = "finalizar">
                        </td>
                    </tr>
                </table>


        </main>





    <footer>
            <p>2026 Kabum Clone</p>
        </footer>
</body>
</html>


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

main {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto 80px auto;
}

main table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

main table tr:first-child {
    background-color: #f2f2f2;
    font-weight: bold;
}

main table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}

main table tr:last-child td {
    border-bottom: none;
}

main table img {
    width: 70px;
    height: auto;
    object-fit: contain;
}

main table td:nth-child(4),
main table td:nth-child(6) {
    font-weight: bold;
    color: #ff6500;
}

main table td:last-child i {
    color: #ff3b3b;
    cursor: pointer;
    font-size: 18px;
    transition: transform 0.2s ease, color 0.2s ease;
}

main table td:last-child i:hover {
    transform: scale(1.2);
    color: #d60000;
}

@media (max-width: 768px) {
    main table {
        font-size: 13px;
    }

    main table img {
        width: 50px;
    }
}

main table tr td[colspan] {
    text-align: left;
    padding: 25px;
    background-color: #fafafa;
}

main table label {
    font-weight: bold;
    margin-right: 10px;
    color: #333;
}

main table select {
    padding: 8px 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-right: 30px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s ease;
}

main table select:focus {
    border-color: #ff6500;
}

main table tr:last-child td {
    padding: 20px;
    text-align: right;
}

main table tr:last-child a {
    text-decoration: none;
    font-weight: bold;
    color: #555;
    margin-right: 20px;
    transition: color 0.2s ease;
}

main table tr:last-child a:hover {
    color: #ff6500;
}

main table input[type="submit"] {
    background-color: #ff6500;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.2s ease, transform 0.2s ease;
}

main table input[type="submit"]:hover {
    background-color: #e65c00;
    transform: scale(1.05);
}

main table input[type="submit"]:active {
    transform: scale(0.98);
}


</style>





    