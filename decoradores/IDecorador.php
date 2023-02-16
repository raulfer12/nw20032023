<?php
interface IDecorador
{
    public function getPrecio();
}

class WhopperB implements IDecorador
{
    protected float $whopperBase = 180.00;

    public function __construct()
    {
        echo '<br> Factura <br>';
        echo '------------------------------';
    }

    public function getPrecio()
    {
        return $this->whopperBase;
    }
}
abstract class WhopperDecorador implements IDecorador
{
    protected $whopper;

    public function __construct(IDecorador $whopper)
    {
        echo '<br>' .get_class($this);
        echo '---------------'.$whopper->getPrecio();
        $this->whopper=$whopper;
    }
}
class Whopper extends WhopperDecorador
{
    public function getPrecio()
    {
        return $this->whopper->getPrecio();
    }
}
class ExtraQueso extends WhopperDecorador
{
    private float $extraQ=50.00;

    public function getPrecio()
    {
        return $this->whopper->getPrecio() + $this->extraQ;
    }
}
class ExtraTomate extends WhopperDecorador
{
    private float $extraT=30.00;

    public function getPrecio()
    {
         return $this->whopper->getPrecio() + $this->extraT;
    }
}
class ExtraLechuga extends WhopperDecorador
{
    private float $extraL=20.25;

    public function getPrecio()
    {
       return $this->whopper->getPrecio() + $this->extraL;
    }
}
class Descuento extends WhopperDecorador
{
    private float $descuento = 43.5;

    public function getPrecio()
    {
         return $this->whopper->getPrecio() - $this->descuento;
    }
}
$whopper = new WhopperB();
$whopper = new Whopper($whopper);
$whopper = new ExtraQueso($whopper);
$whopper = new ExtraTomate($whopper);
$whopper = new ExtraLechuga($whopper);
if (rand(1,2)==1) {
    $whopper = new Descuento($whopper);
}
echo '<br> El total es: ' .$whopper->getPrecio();
?>