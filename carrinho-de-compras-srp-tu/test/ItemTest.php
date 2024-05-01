<?php

use TuSRP\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase {

  public function testEstadoInicialItem() {
    $item = new Item();
    
    $this->assertEquals('', $item->getNome());
    $this->assertEquals(0, $item->getValor());
  }

  public function testGetSetNome() {
    $nome = 'Cadeira';

    $item = new Item();
    $item->setNome($nome);

    $this->assertEquals($nome, $item->getNome());
  }

  public function dataValores() {
    return [
      [100],
      [-1],
      [0],
    ];
  }
  
  /**
   * @dataProvider dataValores
   */
  public function testGetSetValor($valor) {
    $item = new Item();
    $item->setValor($valor);

    $this->assertEquals($valor, $item->getValor());
  }

  public function testItemValido() {
    $item = new Item();
    
    $item->setNome('Pulseira');
    $item->setValor(55);
    $valido = $item->itemValido();
    $this->assertTrue($valido);

    $item->setNome('');
    $item->setValor(55);
    $valido = $item->itemValido();
    $this->assertFalse($valido);

    $item->setNome('Pulseira');
    $item->setValor(0);
    $valido = $item->itemValido();
    $this->assertFalse($valido);

    $item->setNome('');
    $item->setValor(0);
    $valido = $item->itemValido();
    $this->assertFalse($valido);
  }

}