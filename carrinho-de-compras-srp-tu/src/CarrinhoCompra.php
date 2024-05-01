<?php

namespace TuSRP;

class CarrinhoCompra {

  private $itens;

  public function __construct()
  {
    $this->itens = [];
  }

  public function exibirItens() {
    return $this->itens;
  }

  public function adicionarItem(Item $item) {
    array_push($this->itens, $item);

    return true;
  }

  public function validarCarrinho() {
    return count($this->itens) > 0;
  }
}
