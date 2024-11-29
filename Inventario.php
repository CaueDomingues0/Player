<?php

require_once("Item.php");
require_once("Player.php");

class Inventario {
    private array $item = [];
    private int $capacidadeMax = 20;
    private int $capacidadeLivre = 20;

    public function __construct(int $capacidadeMax = 20) {
        $this->setCapacidadeMax($capacidadeMax);
    }

    public function getItem(): array {
        return $this->item;
    }

    public function setItem(array $item): void {
        if (empty($item)){
            echo "Inventario Vazío! <br>";
        } else{
        $this->item = $item;
        }
    }

    public function getCapacidadeMax(): int {
        return $this->capacidadeMax;
    }

    public function setCapacidadeMax(int $capacidadeMax): void {
        $this->capacidadeMax = $capacidadeMax;
    }

    public function getCapacidadeLivre(): int{
        return $this->capacidadeLivre;
    }

    public function setCapacidadeLivre($capacidadeLivre): void{
        $this->capacidadeLivre = $capacidadeLivre;
    }

    public function adicionarItem(Item $itens){ //adiciona os itens no array de itens
        array_push($this->item, $itens);
        $this->capacidadeLivre -= $itens->getTamanho();
    } 

    public function removerItem(string $nome){
        foreach($this->item as $index => $item){
            if($item->getNome() == $nome){
                unset($this->item[$index]);
                $this->capacidadeLivre += $item->getTamanho();
                return true;
            }
        }
         return false;
    }
    public function capacidadeLivre(){
        if($this->capacidadeMax >0){
        return $this->capacidadeLivre;
        }else{
           return "<h1>Inventário cheio!</h1>";
        }
    }

}
?>