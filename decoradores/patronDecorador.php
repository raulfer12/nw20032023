<?php
interface Hamburguesa {
  public function costo(): float;
  public function descripcion(): string;
}

class HamburguesaBasica implements Hamburguesa {
  public function costo(): float {
    return 180.0;
  }

  public function descripcion(): string {
    return 'Hamburguesa básica';
  }
}

abstract class HamburguesaDecorador implements Hamburguesa {
  protected $hamburguesa;

  public function __construct(Hamburguesa $hamburguesa) {
    $this->hamburguesa = $hamburguesa;
  }

  public function costo(): float {
    return $this->hamburguesa->costo();
  }

  public function descripcion(): string {
    return $this->hamburguesa->descripcion();
  }
}

class Queso extends HamburguesaDecorador {
  public function costo(): float {
    return $this->hamburguesa->costo() + 50.85;
  }

  public function descripcion(): string {
    return $this->hamburguesa->descripcion() . ', con queso';
  }
}

class Tocino extends HamburguesaDecorador {
  public function costo(): float {
    return $this->hamburguesa->costo() + 95.99;
  }

  public function descripcion(): string {
    return $this->hamburguesa->descripcion() . ', con tocino';
  }
}

$hamburguesaBasica = new HamburguesaBasica();
$hamburguesaConQueso = new Queso($hamburguesaBasica);
$hamburguesaConQuesoYTocino = new Tocino($hamburguesaConQueso);

?>

<html>
  <head>
    <title>Hamburguesas</title>
  </head>
  <body>
    <h1>Hamburguesas</h1>
    <ul>
      <li>
        <p><?php echo $hamburguesaBasica->descripcion(); ?> :  lps <?php echo $hamburguesaBasica->costo(); ?></p>
      </li>
      <li>
        <p><?php echo $hamburguesaConQueso->descripcion(); ?> :  lps <?php echo $hamburguesaConQueso->costo(); ?></p>
      </li>
      <li>
        <p><?php echo $hamburguesaConQuesoYTocino->descripcion(); ?> :  lps <?php echo $hamburguesaConQuesoYTocino->costo(); ?></p>
      </li>
    </ul>
  </body>
</html>
