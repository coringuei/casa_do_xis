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
    <title>Casa Do Xis - Dashboard</title>
    <link href="src/View/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        
        <div class = "center">
            <div class="menu">
                <li>
                    <a href="../../index.html" button type="submit" class="p-3 text-white bg-red-700 rounded" button>Home</a>
                </li>
                <a href="src/View/form_add_product.php"button type="submit" class="p-3 text-white bg-red-700 rounded"button>Novo Produto </a>
                <a href="src/View/list_of_product.php" button type="submit" class="p-3 text-white bg-red-700 rounded"button>Lista de Produtos </a>
            </div>
        </div>
        <div class="slide">
            <div class="slides">
                
                <div id="voltar" class="btn">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div id="next" class="btn">
                    <i class="fas fa-chevron-right"></i>
                </div>
                
                <div id="atual" class="image"> <img src="img/c.png" alt=""> </div>
                <div class="image"> <img src="img/d.png" alt=""> </div>
                <div class="image"> <img src="img/e.png" alt=""> </div>
            </div>
            <div class="balls">
            </div>
        </div>
    </header>
</body>
<script>
    var balls = document.querySelector('.balls')
    var quant = document.querySelectorAll('.slides .image')
    var atual = 0
    var imagem = document.getElementById('atual')
    var next = document.getElementById('next')
    var voltar = document.getElementById('voltar')

    for(let i=0; i<quant.length; i++){
        var div = document.createElement('div')
        div.id = i
        balls.appendChild(div)
    }
    document.getElementById('0').classList.add('imgAtual')
    
    var pos = document.querySelectorAll(".balls div")
    
    for(let i=0; i< pos.lenght; i++){
        pos[i].addEventListener('click', ()=>{
            atual = pos[i].id
            slide()
        })
    }
    
    voltar.addEventListener('click', ()=>{
        atual--
        slide()
    })
    next.addEventListener('click', ()=>{
        atual++
        slide()
    })

    function slide(){
        if(atual >= quant.length){
            atual = 0
        }
        else if(atual < 0){
            atual = quant.length-1
        }
        document.querySelector('.imgAtual').classList.remove('.imgAtual')
        imagem.style.marginLeft = -1024*atual+'px'
        document.getElementById(atual).classList.add('imgAtual')
    }
    setInterval(()=>{
        atual++
        slide()
    },4000)
</script>
</html>