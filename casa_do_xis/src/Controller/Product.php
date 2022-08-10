<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\ProductDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Product;

use PDOException;

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi informada!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        insertProduct();
        break;
    case 'list':
        listProducts();
        break;
    case 'delete':
        deleteProduct();
        break;
    case 'find':
        findProduct();
        break;
    case 'edit':
        editProduct();
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!', type: 'error');
}

function insertProduct()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!'
        );
    }

    $productName = $_POST["name"];
    $productQuantity = $_POST["quantity"];
    $productPrice = $_POST["price"];
    $productIngredients1 = $_POST["ingredients1"];
    $productIngredients2 = $_POST["ingredients2"];
    $productIngredients3 = $_POST["ingredients3"];

    $error = array();

    if (!Validation::validateName($productName)) {
        array_push($error, 'O nome do produto deve conter ao menos 5 caracteres entre letras e números!!!');
    }

    if (!Validation::validateQuantity($productQuantity)) {
        array_push($error, 'A quantidade em estoque deve ser superior ou igual à 1 unidade!!!');
    }


    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $product = new Product(
            name: $productName,
            price: $productPrice,
            quantity: $productQuantity,
            ingredients1: $productIngredients1,
            ingredients2: $productIngredients2,
            ingredients3: $productIngredients3
        );
        $dao = new ProductDAO();
        try {
            $result = $dao->insert($product);
            if ($result)
            Redirect::redirect(
                message: 'Produto cadastrado com sucesso!!'
            );
        else
            Redirect::redirect(
                message: 'Não foi possível cadastrar o produto!!',
                type: 'error'
            );
        } catch (PDOException $e) {
            Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!', type: 'error');

        }
    }
}
function listProducts()
{
    $dao = new ProductDAO();
    try {
        $product = $dao->findAll();
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado!!', type: 'error');
    }
    session_start();
    if ($product) {
        $_SESSION['list_of_product'] = $product;
        header("location:../View/list_of_product.php");
    } else {
        Redirect::redirect(message: ['Não existem produtos cadastrados no sistema!!'], type: 'warning');
    }
}
function deleteProduct(){
    $id = $_GET['code'];
    $dao = new ProductDAO();
    try{
    $result = $dao->delete($id);
    if($result){
        Redirect::redirect(message:'Removido com sucesso!!');
    }else{
        Redirect::redirect(message: ['Impossivel remover o produto!!'], type: 'warning');
    }
    }catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado!!', type: 'error');
    }
}
function findProduct()
{
    $id = $_GET['code'];
    $dao = new ProductDAO();
    $data = $dao->findOne($id);
    if ($data) {
        session_start();
        $_SESSION['product_data'] = $data;
        header('location:../View/form_edit_product.php');
    } else {
        Redirect::redirect(message: 'O produto não foi localizado!!');
    }
}
function editProduct(){
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }
    
    $product = $_POST['code'];
    $productName = $_POST['name'];
    $productQuantity = $_POST['quantity'];
    $productPrice = $_POST['price'];
    $productIngredients1 = $_POST['ingredients1'];
    $productIngredients2 = $_POST['ingredients2'];
    $productIngredients3 = $_POST['ingredients3'];

    $error = array();

    if (!Validation::validateName($productName)) {
        array_push($error, 'O nome do produto deve conter ao menos 5 caracteres entre letras e números!!!');
    }

    if (!Validation::validateQuantity($productQuantity)) {
        array_push($error, 'A quantidade em estoque deve ser superior ou igual à 1 unidade!!!');
    }

    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $product = new Product(
            product_code: $product,
            name: $productName,
            quantity: $productQuantity,
            price: $productPrice,
            ingredients1: $productIngredients1,
            ingredients2: $productIngredients2,
            ingredients3: $productIngredients3
        );
        $dao = new ProductDAO();
        $result = $dao->update($product);
        if ($result) {
            Redirect::redirect(message: 'Produto atualizado com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível atualizar o produto!!!'], type: 'warning');
        }
    }
}
