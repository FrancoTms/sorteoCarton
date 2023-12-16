<?php
    //Números elegidos
    $numEleg = array(2, 3, 5, 6, 7, 8, 10, 11, 14, 15, 16, 17, 19, 20, 24);
    
    //Generar los números ganadores y ordenarlos
    $numGan = array();
    while(count($numGan) < 15) {
        $numAleatorio = mt_rand(1,25);
        if(!in_array($numAleatorio, $numGan)) {
            $numGan[] = $numAleatorio;
        }
    }
    sort($numGan);

    //Verificar la cantidad de aciertos
    $aciertos = 0;
    foreach($numEleg as $elemento) {
        if(in_array($elemento, $numGan)) {
            $aciertos++;
        }
    }
    require_once('php/encabezado.php');
?>
    <main class="row">
        <section class="col-md-6">
            <h2 class="text-center p-3">Su cartón</h2>
            <table class="m-auto fs-2">
                <figure class="m-auto">
                    <img src="img/logo_telekino.jpg" alt="Imagen Logo Telekino">
                </figure>
                <?php
                    //Números elegidos
                    $cont = 0;
                    $cantCol = 3;
                    echo '<tr>';
                    foreach($numEleg as $elemento) {
                        echo '<td class="text-center p-2">' . $elemento . '</td>';
                        $cont++;
                        if ($cont % $cantCol == 0) {
                            echo '</tr><tr>';
                        }
                    }
                    echo '</tr>';
                ?>
            </table>
        </section>
        <section class="col-md-6">
            <h2 class="text-center p-3">Cartón sorteado</h2>
            <figure class="m-auto">
                    <img src="img/logo_telekino.jpg" alt="Imagen Logo Telekino">
                </figure>
            <table class="m-auto fs-2">
                <?php
                    $cont = 0;
                    echo '<tr>';
                    foreach($numGan as $elemento) {
                        echo '<td class="text-center p-2">' . $elemento . '</td>';
                        $cont++;
                        if ($cont % $cantCol == 0) {
                            echo '</tr><tr>';
                        }
                    }
                    echo '</tr>';
                ?>
            </table>
        </section>
        <section>
        <?php
            if($aciertos == 15) {
                echo '<h3 class="text-center p-3">Felicidades!!! Ganaste el pozo de $150.000.000</h3>';
            } else {
                echo '<h3 class="text-center p-3">Cantidad de aciertos: ' . $aciertos . '</h3>';
            }
        ?>
    </section>
    </main>

<?php
    require_once('php/pie.php');
?>