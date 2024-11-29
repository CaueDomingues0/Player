<?php

require_once("Player.php");
require_once("Inventario.php");
require_once("Item.php");
require_once("Ataque.php");
require_once("Defesa.php");
require_once("Magia.php");

$player1 = new Player("Flxcz");
$player2 = new Player("Irineu");
$item1 = new Item("Manto da Invisibilidade", 2, "Magia");
$item2 = new Item("Machado do Conquistador", 7, "Ataque");
$item3 = new Item("Escudo do Guardião Eterno", 4, "Defesa");
$item4 = new Item("Espada do Rei", 7, "Ataque");
$item5 = new Item("Escudo do Rei", 2, "Defesa");
$item6 = new Item("Luvas Flamejantes", 2, "Magia");

/*

// funções do jogo teste
$player1 -> introducao();
echo "<-------------------->";
echo "<br>";

//coletando itens
$player1 -> coletarItem($item1);
$player1 -> coletarItem($item2);
$player1 -> coletarItem($item3);
$player1 -> coletarItem($item4);
$player1 -> coletarItem($item4);
echo "<br>";
echo "<-------------------->";
$player1 -> exibirInventario();
echo "<br>";
//dropando itens
echo "<br>";
echo "<--------------------><br>";
$player1 -> droparItem("Manto da Invisibilidade");
$player1 -> droparItem("Escudo do Guardião Eterno");
$player1 -> droparItem("Espada do Rei");
$player1 -> droparItem("Machado do Conquistador");
echo "<--------------------><br>";
$player1 -> exibirInventario();

//subindo de nível
$player1 -> subirNivel();
echo "<br>";
$player1 -> coletarItem($item1);
$player1 -> coletarItem($item2);
$player1 -> coletarItem($item3);
$player1 -> coletarItem($item4);
$player1 -> coletarItem($item4);
$player1 -> exibirInventario();
*/

/*simulação do jogo*/

//coletando item
$player1 -> introducao();
$player1 -> coletarItem($item2);
$player1 -> coletarItem($item4);
$player1 -> coletarItem($item3);
$player1 -> coletarItem($item1);
$player1 -> coletarItem($item4); // erro pois o inventario já está cheio
echo "<br>";

//dropando item
$player1 -> droparItem("Manto da Invisibilidade");
$player1 -> droparItem("Escudo do Guardião Eterno");
$player1 -> droparItem("Espada do Rei");
$player1 -> droparItem("Machado do Conquistador"); //dropado todos os ítens, resetando o espaço no inventário

//subindo de nível
$player1 -> subirNivel();
echo "<br>";
$player1 -> coletarItem($item2);
$player1 -> coletarItem($item4);
$player1 -> coletarItem($item5);
$player1 -> coletarItem($item6); //adicionado os mesmos itens para conferir o espaço livre, já que no nível 1, o inventário já se enche

//exibindo o inventário após o aumento de Level
$player1 -> exibirInventario(); //aumentado o espaço disponível para 26 (de acordo com o nível 2) agora aguentando mais um ítem que ocupa 6 espaços

echo "<br>";
//Player 2 (mesma funcionalidade o player1)
echo "<--------------------><br>";

$player2 -> introducao();

//Coletando novos itens

$player2 -> coletarItem($item2);
$player2 -> coletarItem($item4);
$player2 -> coletarItem($item5);
$player2 -> coletarItem($item6); 

$player2 -> subirNivel();
echo "<br>";

//teste subindo para o nível 3 e 4

$player2 -> subirNivel();
echo "<br>";

$player2 -> subirNivel();
echo "<br>";
//inserindo itens para o nível 3

$player2 -> coletarItem($item1);
$player2 -> coletarItem($item2);
$player2 -> coletarItem($item3);
$player2 -> coletarItem($item4);
$player2 -> coletarItem($item5);
$player2 -> coletarItem($item6); 

//exibindo inventario após todas as coletas
$player2 -> exibirInventario(); //após todas as coletas, o jogador 2, no nível 4, ficou com 5 espaços no inventário