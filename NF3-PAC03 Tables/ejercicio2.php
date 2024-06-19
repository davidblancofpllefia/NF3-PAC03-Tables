<?php
// Conectar a la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or die ('No se pudo conectar. Verifica tus parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Consulta para obtener el promedio de calificaciones
$query = "SELECT AVG(review_rating) AS avg_rating FROM reviews";
$result = mysqli_query($db, $query);

if ($result && $data = mysqli_fetch_assoc($result)) {
    $averageRating = $data['avg_rating'];
} else {
    $averageRating = 0;
}

mysqli_free_result($result);

// Mostrar el promedio de calificaciones
echo "<h2>Calificación promedio de los revisores: $averageRating</h2>";

// Resto del contenido de tu archivo de detalles
// ...

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>
