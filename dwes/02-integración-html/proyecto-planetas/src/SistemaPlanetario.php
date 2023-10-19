<?php 

define ('FILE_NAME', 'sistema.json');

class SistemaPlanetario {

    private $planetas;

    function __construct(){
        $this->planetas = [];
    }

    function load(string $file_name=FILE_NAME):void{
        $tmpPlanetas = json_decode(
            file_get_contents($file_name)
        );
        foreach($tmpPlanetas as $tmpP){
            $this->planetas []= new Planeta(
                $tmpP->nombre,
                $tmpP->distancia,
                $tmpP->diametro,
                $tmpP->masa
            );
        }        
    }

    function save(string $file_name=FILE_NAME):void{
        file_put_contents(
            $file_name,
            json_encode($this->planetas)
        );
    }

    function add(Planeta $p):void {
        $this->planetas []= $p;
    }

    function toTable():string{
        $html = "<table>
                <tr>
                    <th>Nombre</th>
                    <th>Distancia</th>
                    <th>Diametro</th>
                    <th>Masa</th>
                </tr>";
        foreach($this->planetas as $p) {
            $html .= $p->toFila();    
        }
        $html .= "</table>";
        return $html;
    }

    function detail(string $nombre){
        $nombres = array_map(function($p){
            return $p->nombre;
        }, $this->planetas);
        $index = array_search($nombre, $nombres);
        echo "ARGG".$index;
        return ($index!==false)?$this->planetas[$index]:"Planeta no encontrado";
    }

    function toSelect(string $seleccionado = ""):string {
        $html = "<form action='' method='post'>";
        $html .= "<select name='mostrar'>";
        foreach($this->planetas as $p) {
            $html .= $p->toOption($seleccionado);    
        }
        $html .= "</select>";
        $html .= "<input type='submit' value='Mostrar'>";
        $html .= "</form>";
        return $html;
    }
}
?>