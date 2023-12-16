<?php
    //Números elegidos
    $numElegidos = array(2, 3, 5, 6, 7, 8, 10, 11, 14, 15, 16, 17, 19, 20, 24);
    
    //Genero los números ganadores y los ordeno
    $numGanadores = array();
    while(count($numGanadores) < 15) {
        $numAleatorio = mt_rand(1,25);
        if(!in_array($numAleatorio, $numGanadores)) {
            //Notación para agregar el número aleatorio al arreglo, sin indicar índice
            $numGanadores[] = $numAleatorio;
        }
    }
    sort($numGanadores);

    //Cuento la cantidad de aciertos
    $aciertos = 0;
    foreach($numElegidos as $elemento) {
        if(in_array($elemento, $numGanadores)) {
            $aciertos++;
        }
    }
    require_once('php/encabezado.php');
?>
    <main class="row">
        <section class="col-md-6">
            <h2 class="text-center p-3">Números elegidos</h2>
            <table class="m-auto fs-2">
                <figure class="m-auto">
                    <img src="img/logo_telekino.jpg" alt="Imagen Logo Telekino">
                </figure>
                <?php
                    //Números elegidos
                    $contador = 0;
                    $cantColumnas = 3;
                    echo '<tr>';
                    foreach($numElegidos as $elemento) {
                        echo '<td class="text-center p-2">' . $elemento . '</td>';
                        $contador++;
                        /*Cada vez que $contador sea divisble por $cantColumnas, 
                        se cierra la fila anterior y se abre una nueva*/
                        if ($contador % $cantColumnas == 0) {
                            echo '</tr><tr>';
                        }
                    }
                    echo '</tr>';
                ?>
            </table>
        </section>
        <section class="col-md-6">
            <h2 class="text-center p-3">Números ganadores</h2>
            <figure class="m-auto">
                    <img src="img/logo_telekino.jpg" alt="Imagen Logo Telekino">
                </figure>
            <table class="m-auto fs-2">
                <?php
                    //Números ganadores
                    $contador = 0;
                    echo '<tr>';
                    foreach($numGanadores as $elemento) {
                        echo '<td class="text-center p-2">' . $elemento . '</td>';
                        $contador++;
                        if ($contador % $cantColumnas == 0) {
                            echo '</tr><tr>';
                        }
                    }
                    echo '</tr>';
                ?>
            </table>
        </section>
    </main>
    <section>
        <?php
            if($aciertos == 15) {
                echo '<h3 class="text-center p-3">Es ganador del pozo de $150.000.000</h3>';
            } else {
                echo '<h3 class="text-center p-3">Cantidad de aciertos: ' . $aciertos . '</h3>';
            }
        ?>
    </section>
<?php
    require_once('php/pie.php');
?>