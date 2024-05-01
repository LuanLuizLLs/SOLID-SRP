<?php

require __DIR__."/vendor/autoload.php";

use YesSRP\Item;
use YesSRP\Pedido;
use YesSRP\Email;

echo "<h2>Com o Princípio da Responsabilidade Única</h2>";

echo "<h3>Carrinho vazio</h3>";

$pedido = new Pedido();
$resultado = ['Não', 'Sim'];

$itens = $pedido->getCarrinho()->exibirItens();

echo "<pre>";
print_r($itens);
echo "</pre>";

$valorTotal = 0;

foreach ($itens as $key => $item) {
  $valorTotal += $item->getValor();
}

echo "<p>Valor total: $valorTotal</p>";

$carrinhoPreenchido = $pedido->getCarrinho()->validarCarrinho();

echo "<p>Carrinho preenchido: $resultado[$carrinhoPreenchido]</p>";

$status = $pedido->getStatus();

echo "<p>Status do pedido: $status</p>";

echo "<h5>Pedido enviado para confirmação</h5>";

$pedidoConfirmado = $pedido->confirmarPedido();
$status = $pedido->getStatus();

echo "<p>Status do pedido: $status</p>";

echo "<hr />";

echo "<h3>Carrinho preenchido</h3>";

$pedido = new Pedido();

$item1 = new Item();
$item1->setNome('Chaveiro');
$item1->setValor(15.80);

$item2 = new Item();
$item2->setNome('Carteira');
$item2->setValor(25.90);

$item3 = new Item();
$item3->setNome('');
$item3->setValor(0);

$pedido->getCarrinho()->adicionarItem($item1);
$pedido->getCarrinho()->adicionarItem($item2);

$itens = $pedido->getCarrinho()->exibirItens();

echo "<pre>";
print_r($itens);
echo "</pre>";

$valorTotal = 0;

foreach ($itens as $key => $item) {
  $valorTotal += $item->getValor();
}

echo "<p>Valor total: $valorTotal</p>";

$carrinhoPreenchido = $pedido->getCarrinho()->validarCarrinho();

echo "<p>Carrinho preenchido: $resultado[$carrinhoPreenchido]</p>";

$status = $pedido->getStatus();

echo "<p>Status do pedido: $status</p>";

echo "<h5>Pedido enviado para confirmação</h5>";

$pedidoConfirmado = $pedido->confirmarPedido();
$status = $pedido->getStatus();

if ($status === 'confirmado') {
  $email = new Email('de@email.com', 'para@email.com', 'Pedido confirmado', 'Seu pedido foi finalizado!');
  $email->dispararEmail();
}

echo "<p>Status do pedido: $status</p>";
