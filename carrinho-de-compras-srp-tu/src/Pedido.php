<?php 

namespace TuSRP;

class Pedido {

  private $status;
  private $carrinho;
  private $valorPedido;

  public function __construct()
  {
    $this->status = 'aberto';
    $this->carrinho = new CarrinhoCompra();
    $this->valorPedido = 0;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getCarrinho() {
    return $this->carrinho;
  }

  public function getValorPedido() {
    return $this->valorPedido;
  }

  public function setStatus(string $status) {
    $this->status = $status;
  }

  public function confirmarPedido() {
    if ($this->carrinho->validarCarrinho()) {
      $this->setStatus('confirmado');

      return true;
    }

    return false;
  }

}