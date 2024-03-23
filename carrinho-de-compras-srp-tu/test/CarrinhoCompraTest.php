<?php

use App\Item;
use App\CarrinhoCompra;
use PHPUnit\Framework\TestCase;

class CarrinhoCompraTest extends TestCase {

  public function testEstadoInicialCarrinhoCompra() {
    $carrinho = new CarrinhoCompra();
    
    $this->assertEmpty($carrinho->exibirItens());
  }

  public function testAdicionarItem() {
    $carrinho = new CarrinhoCompra();

    $item = new Item();
    $item->setNome('Pulseira');
    $item->setValor(215.50);
    $adicionado = $carrinho->adicionarItem($item);

    $this->assertTrue($adicionado);
  }

  public function dataItens() {
    $carrinho = new CarrinhoCompra();

    $item1 = new Item();
    $item1->setNome('Colar');
    $item1->setValor(250.50);
    $carrinho->adicionarItem($item1);

    $item2 = new Item();
    $item2->setNome('Brinco');
    $item2->setValor(95.50);
    $carrinho->adicionarItem($item2);

    return [
      [$carrinho, [$item1, $item2]],
    ];
  }

  /**
   * @dataProvider dataItens
   */
  public function testExibirItens($carrinho, $itens) {
    $this->assertEquals($itens, $carrinho->exibirItens());
  }

  public function testValidarCarrinho() {
    $carrinho = new CarrinhoCompra();

    $valido = $carrinho->validarCarrinho();
    $this->assertFalse($valido);

    $item = new Item();
    $item->setNome('Anel');
    $item->setValor(145.50);
    $carrinho->adicionarItem($item);

    $valido = $carrinho->validarCarrinho();
    $this->assertTrue($valido);
  }

}