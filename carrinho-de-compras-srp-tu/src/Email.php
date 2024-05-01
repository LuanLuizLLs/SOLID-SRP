<?php

namespace TuSRP;

class Email {

  private $de;
  private $para;
  private $assunto;
  private $conteudo;

  public function __construct(
    $de = 'contato@carrinho-de-compras.com',
    $para = '',
    $assunto = '',
    $conteudo = ''
  ) {
    $this->de = $de;
    $this->para = $para;
    $this->assunto = $assunto;
    $this->conteudo = $conteudo;
  }

  public function dispararEmail() {
    echo "<p><b>($this->de | $this->para)</b> - <i>$this->assunto - $this->conteudo</i></p>";
  }
}
