<?php

use TuSRP\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase {

  public function testDisparoEmailVazio() {
    $email = new Email();

    $email->dispararEmail();
    
    $this->expectOutputString('<p><b>(contato@carrinho-de-compras.com | )</b> - <i> - </i></p>');
  }

  public function testDisparoEmailPreenchido() {
    $email = new Email('test@email.com', 'De', 'Para', 'Conteudo');

    $email->dispararEmail();
    
    $this->expectOutputString('<p><b>(test@email.com | De)</b> - <i>Para - Conteudo</i></p>');
  }

}