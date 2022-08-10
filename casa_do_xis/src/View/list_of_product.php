<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Do Xis - Lista De Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header class="bg-black">
        <nav>
            <ul class="flex">
                <li>
                    <a href="../../index.html" button type="submit" class="p-3 text-white bg-red-700 rounded">Home</a>
                </li>
            </ul>
        </nav>
        <main class="w-2/4 m-auto mt-9">
        <table class="table">
            <thead class="text-white bg-orange-600">
                <th>Nome do produto</th>
                <th>Preço de venda</th>
                <th>Quantidade em estoque</th>
                <th>Ingrediente 1</th>
                <th>Ingrediente 2</th>
                <th>Ingrediente 3</th>
            </thead>
            <tbody>
                <?php
                session_start();
                foreach ($_SESSION['list_of_product'] as $product) :
                ?>
                    <tr>
                        <td>
                            <?= $product['product_name'] ?>
                        </td>
                        <td>
                            <?= $product['product_price'] ?>
                        </td>
                        <td>
                            R$ <?= str_replace(".", ",", $product['product_price']) ?>
                        </td>
                        <td>
                            <?= $product['product_quantity'] ?>
                        </td>
                        <td>
                            <a href="../Controller/Product.php?operation=find&code<?= $product["product_code"] ?>">Editar</a>
                            <a href="../Controller/Product.php?operation=delete&code<?= $product["product_code"] ?>">Deletar</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
    </header>
</body>
</html>