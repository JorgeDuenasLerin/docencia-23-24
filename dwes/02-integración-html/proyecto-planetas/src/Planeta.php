<?php 
class Planeta {
    public $nombre;
    public $distancia;
    public $diametro;
    public $masa;

    function __construct(string $nombre='', string $distancia='0', string $diametro='0', string $masa='0'){
        $this->nombre = $nombre;
        $this->distancia = $distancia;
        $this->diametro = $diametro;
        $this->masa = $masa;
    }

    function toEtiqueta($tag='div'):string {
        return "<$tag>$this</$tag>";
    }

    function toOption(string $selected = ''):string {
        $sel = ($this->nombre == $selected)?' selected':'';
        return "<option value='$this->nombre' $sel>$this->nombre</option>";
    }

    function toFila():string{
        return "<tr><td><a href='?nombre=$this->nombre'>$this->nombre</a></td><td>$this->distancia</td><td>$this->diametro</td><td>$this->masa</td></tr>";
    }

    function toEdit():string {
        return "<form action='' method='post'>
            <input type='text' name='nombre' value='$this->nombre'><br>
            <input type='text' name='distancia' value='$this->distancia'><br>
            <input type='text' name='diametro' value='$this->diametro'><br>
            <input type='text' name='masa' value='$this->masa'><br>
            <input type='submit' name='guardar' value='Guardar'>
        </form>";
    }

    function __toString():string{
        return "$this->nombre dist: $this->distancia diametro: $this->diametro masa: $this->masa";
    }
}
?>