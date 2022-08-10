<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa do Xis - adicionar produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-blue-400 ">
        <nav>
            <ul class="flex">
                <li>
                    <a href="../../index.html" button type="submit" class="p-3 text-white bg-red-700 rounded" button id="home">Home</a>
                </li>
            </ul>
            <form action="../controller/Product.php?operation=insert" method="POST">
                <section class="mx-4 mt-4 columns-3">
                    <article>
                        <label for="name" class="cursor-pointer">Nome do produto</label>
                        <input type="text" id="name" name="name" class="border border-red-500" required>
                    </article>
                    <article>
                        <label for="price" class="cursor-pointer">Preço</label>
                        <input type="number" name="price" id="price" class="border border-red-500" required min=0 max=1000>
                    </article>
                    <article>
                        <label for="name" class="cursor-pointer">Quantidade </label>
                        <input type="text" id="quantity" name="quantity" class="border border-red-500">
                    </article>
                </section>
                <section class="mx-4 mt-4 columns-3">
                    <article>
                        <label for="name" class="cursor-pointer">Ingrediente 1</label>
                        <input type="text" id="ingredients1" name="ingredients1" class="border border-red-500">
                    </article>
                    <article>
                        <label for="name" class="cursor-pointer">Ingrediente 2</label>
                        <input type="text" id="ingredients2" name="ingredients2" class="border border-red-500">
                    </article>
                    <article>
                        <label for="name" class="cursor-pointer">Ingrediente 3</label>
                        <input type="text" id="ingredients3" name="ingredients3" class="border border-red-500">
                    </article>
                </section>
                <article class="flex justify-center mt-3">
                    <button type="submit" class="p-3 text-white bg-red-700 rounded">Cadastrar</button>
                </article>
            </form>
        </nav>
    </header>
</body>

</html>