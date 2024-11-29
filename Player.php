<?php

require_once("Item.php");
require_once("Inventario.php");

class Player {
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;

    public function __construct(string $nickname) {
        $this->setNickname($nickname);
        $this->setNivel(1); // O nível inicial do jogador é 1
        $this->setInventario(new Inventario()); // cada jogador começa com um inventário padrão
    }

    // get-set nickname
    public function getNickname(): string{
        return $this->nickname;
    }

    public function setNickname(string $nickname): void {
        $this->nickname = $nickname;
    }

    // get-set nivel
    public function getNivel(): int{
        return $this->nivel;
    }

    public function setNivel(int $nivel){
        $this->nivel = $nivel;
    }

    // get-set inventario
    public function getInventario(){
        return $this->inventario;
    }

    public function setInventario($inventario): void {
        $this->inventario = $inventario;
    }

        public function coletarItem(Item $item){
        if ($this->inventario->capacidadeLivre() > 0){
            $this->inventario->adicionarItem($item);
           echo "O jogador {$this->nickname} coletou o ítem de {$item->getClasse()}, '{$item->getNome()}'. <br>";
           return True;
        } else{
            echo "{$this->nickname}. Não foi possivel adicionar o item {$item->getNome()} , inventário já está cheio. <br>";
            return False;
            }
        }

        public function droparItem($nome) {
            $dropado = $this->inventario->removerItem($nome);
                if ($dropado){
                    echo "Jogador {$this->nickname} dropou o item {$nome}. <br>";
                    if ($this->inventario->getCapacidadeLivre() == $this->inventario->getCapacidadeMax()){
                        echo "Inventário cheio! <br>";
                    }
                } else {
                    echo "{$this->nickname} não conseguiu dropar o item {$nome}.<br>";
                    return false;
                }
            
        }

    public function exibirInventario(){
        echo "<h1>Inventário: </h1>";
        foreach($this->inventario->getItem() as $itens){ //percorre por todos os itens da array.
            echo $itens->getNome(). " ".  "(". $itens->getTamanho(). ")" . "<br>"; //exibe todos os itens la dentro com seu nome e tamanho
        }
        echo "<br>Espaço atual no inventario: ";
        if($this->inventario->capacidadeLivre() <=0){
            echo "<h1>Inventário Cheio!</h1>"; // de acordo com a capacidade livre, aparece se o inventario esta cheio, se não, quantos itens posso adicionar
        } else{
            echo $this->inventario->capacidadeLivre(). "<br>";
        }

    }
    public function introducao(){
        echo "<h1>Saudações, {$this->nickname}, bem vindo ao jogo, aquí você poderá explorar, coletar ítens, lutar e subir de nível. Aproveite!</h1>"; //introdução basica do jogo para cada jogador
    }

    public function aumentarCapacidade(){
        $capacidade = $this->getNivel() * 3; 
        $this->inventario->setCapacidadeMax($this->inventario->getCapacidadeMax() + $capacidade);
        $this->inventario->setCapacidadeLivre($this->inventario->getCapacidadeLivre() + $capacidade);
        return $this->inventario->getCapacidadeMax();
    }
    
    public function subirNivel(){
        $this->setNivel($this->getNivel() +1); // função para subir um nível toda vez que a função subirNivel for chamada
        echo "<h1>{$this->nickname} SUBIU PARA O NÍVEL {$this->getNivel()} </h1> Agora seu inventário tem a capacidade de {$this->aumentarCapacidade()} ítens! <br> Espaço atual: {$this->inventario->getCapacidadeMax()} <br>";

    }
    
} 
?>