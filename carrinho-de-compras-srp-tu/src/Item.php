<?php

namespace TuSRP;

class Item {

  private $nome;
  private $valor;

  public function __construct()
  {
    $this->nome = '';
    $this->valor = 0;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getValor() {
    return $this->valor;
  }

  public function setNome(string $nome) {
    $this->nome = $nome;
  }

  public function setValor(float $valor) {
    $this->valor = $valor;
  }

  public function itemValido() {
    return !($this->nome === '' || $this->valor <= 0);
  }
}
