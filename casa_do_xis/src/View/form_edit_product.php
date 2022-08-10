<?php
session_start();
if (empty($_SESSION['login'])) {
    header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Do Xis - Novo produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-blue-400">
        <nav>
            <ul class="flex">
                <li>
                    <a href="../../index.html">Home</a>
                </li>
                <li>
                    <a href="../controller/Product.php?operation=list">Listar produtos</a>
                </li>
            </ul>
        </nav>
    </header>
    <form action="../controller/Product.php?operation=edit" method="POST">
        <?php
        $product = $_SESSION ['product_data'];
        ?>
        <input type="hidden" name="code" value= <?= $product['product_code'] ?> disabled   >
        <section class="mx-4 mt-4 columns-3">
            <article>
                <label for="name" class="cursor-pointer">Nome do produto: </label>
                <input type="text" id="name" name="name" class="border border-blue-400" required value="<?= $product['product_name']?>"->
            </article>
            </section>
        <section class="mx-4 mt-4 columns-2">
            <article>
                <label for="quantity" class="cursor-pointer">Quantidade em estoque: </label>
                <input type="number" name="quantity" id="quantity" class="border border-blue-400" required min=1 max=1000 value="<?= $product['product_quantity'] ?>">
            </article>
            <article class="flex justify-center mt-3">
            <button type="submit" class="p-3 text-white bg-blue-700 rounded">Salvar</button>
        </article>
  </section>
    </form>
</body>

</html>