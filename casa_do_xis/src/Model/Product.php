<?php

namespace APP\Model;

class Product{
    private int $product_code;
    private string $name;
    private float $price;
    private int $quantity;
    private string $ingredients1;
    private string $ingredients2;
    private string $ingredients3;
    private bool $isActive;

    public function __construct(
        string $name,
        float $price,
        int $quantity,
        string $ingredients1,
        string $ingredients2,
        string $ingredients3,
        int $product_code=0,
    ) {
        $this->productCode = $product_code;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->ingredients1 = $ingredients1;
        $this->ingredients2 = $ingredients2;
        $this->ingredients3 = $ingredients3;
    }
}