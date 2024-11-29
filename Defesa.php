<?php

require_once("Item.php");

class Defese extends item{

    public function __construct(string $nome, int $tamanho, string $classe){
        parent::__construct($nome, $tamanho, $classe);
    }
}
