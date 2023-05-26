<!DOCTYPE html>
<html>
<head>
    <title>Procesar palabras</title>
</head>
<body>
    <h1>Procesar palabras</h1>

    <?php
    // Variable para almacenar las palabras y su longitud
    $palabras = array();

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar si se ha subido un archivo
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            // Obtener la ruta temporal del archivo
            $ruta_temporal = $_FILES['archivo']['tmp_name'];

            // Leer el contenido del archivo
            $contenido = file_get_contents($ruta_temporal);

            // Dividir el contenido en líneas y recorrer cada línea
            $lineas = explode("\n", $contenido);
            foreach ($lineas as $linea) {
                // Limpiar la línea (eliminar espacios en blanco al inicio y final)
                $linea = trim($linea);

                // Verificar si la línea no está vacía
                if (!empty($linea)) {
                    // Obtener la palabra y su longitud
                    $palabra = $linea;
                    $longitud = strlen($palabra);

                    // Agregar la palabra y su longitud al arreglo
                    $palabras[] = array('palabra' => $palabra, 'longitud' => $longitud);
                }
            }
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <label for="archivo">Seleccione un archivo TXT:</label>
        <input type="file" name="archivo" id="archivo" accept=".txt" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php if (!empty($palabras)): ?>
        <h2>Palabras procesadas:</h2>
        <table>
            <thead>
                <tr>
                    <th>Palabra</th>
                    <th>Cantidad de letras</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($palabras as $item): ?>
                    <tr>
                        <td><?php echo $item['palabra']; ?></td>
                        <td><?php echo $item['longitud']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>