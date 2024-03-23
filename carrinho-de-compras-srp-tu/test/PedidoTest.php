<?php

use App\Item;
use App\Pedido;
use App\CarrinhoCompra;
use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase {

  public function testEstadoInicialPedido() {
    $pedido = new Pedido();
    $carrinho = new CarrinhoCompra();

    $this->assertEquals('aberto', $pedido->getStatus());
    $this->assertEquals($carrinho, $pedido->getCarrinho());
    $this->assertEquals(0, $pedido->getValorPedido());
  }

  public function dataStatus() {
    return [
      ['aberto'],
      ['confirmado'],
      ['']
    ];
  }
  
  /**
   * @dataProvider dataStatus
   */
  public function testGetSetStatus($status) {
    $pedido = new Pedido();

    $pedido->setStatus($status);

    $this->assertEquals($status, $pedido->getStatus());
  }

  public function testConfirmarPedido() {
    $pedido = new Pedido();

    $confirmado = $pedido->confirmarPedido();
    $this->assertEquals('aberto', $pedido->getStatus());
    $this->assertFalse($confirmado);

    $item = new Item();
    $item->setNome('Camiseta');
    $item->setValor(65.90);

    $pedido->getCarrinho()->adicionarItem($item);
    $confirmado = $pedido->confirmarPedido();
    $this->assertEquals('confirmado', $pedido->getStatus());
    $this->assertTrue($confirmado);
  }

}