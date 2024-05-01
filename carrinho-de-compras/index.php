<?php

require __DIR__."/vendor/autoload.php";

use NoSRP\CarrinhoCompra;

echo "<h2>Sem o Princípio da Responsabilidade Única</h2>";

echo "<h3>Carrinho vazio</h3>"; 

$carrinho = new CarrinhoCompra();
$itens = $carrinho->exibirItens();
$status = $carrinho->exibirStatus();
$valorTotal = $carrinho->exibirValorTotal();

echo "<pre>";
print_r($itens);
echo "</pre>";

echo "<p><b>Valor total:</b> $valorTotal</p>";

echo "<p><b>Status:</b> $status</p>";

$pedidoConfirmado = $carrinho->confirmarPedido();
$status = $carrinho->exibirStatus();

echo $pedidoConfirmado ? "<h5>Pedido finalizado!</h5>" : "<h5>O carrinho está vazio!</h5>";

echo "<p><b>Status:</b> $status</p>";

echo "<hr />";

echo "<h3>Carrinho preenchido</h3>"; 

$carrinho->adicionarItem('Vestido', 60.10);
$carrinho->adicionarItem('Camiseta', 30.15);
$carrinho->adicionarItem('Brinco', 11.20);
$carrinho->adicionarItem('', 0);

$itens = $carrinho->exibirItens();
$valorTotal = $carrinho->exibirValorTotal();

echo "<pre>";
print_r($itens);
echo "</pre>";

echo "<p><b>Valor total:</b> $valorTotal</p>";

echo "<p><b>Status:</b> $status</p>";

$pedidoConfirmado = $carrinho->confirmarPedido();
$status = $carrinho->exibirStatus();

echo $pedidoConfirmado ? "<h5>Pedido finalizado!</h5>" : "<h5>O carrinho está vazio!</h5>";

echo "<p><b>Status:</b> $status</p>";
