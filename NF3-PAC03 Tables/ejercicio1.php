<?php
// Conectar a la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se pudo conectar. Verifica tus parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Función para ejecutar consultas y mostrar mensajes
function ejecutarConsulta($db, $query, $numeroReseña) {
    if (mysqli_query($db, $query)) {
        echo "Reseña $numeroReseña agregada.<br>";
    } else {
        echo "Error al agregar la reseña $numeroReseña: " . mysqli_error($db) . "<br>";
    }
}

// Inserta la primera reseña
$query1 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (1, '2023-10-18', 'Ferran Torres', 'Pensé que esta era una gran película. Aunque mi novia me hizo verla en contra de mi voluntad.', 4)";
ejecutarConsulta($db, $query1, 1);

// Inserta la segunda reseña
$query2 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (2, '2023-10-18', 'Lamine Yamal', 'Me gustó más Eraserhead.', 2)";
ejecutarConsulta($db, $query2, 2);

// Inserta la tercera reseña
$query3 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (3, '2023-10-18', 'Marc Guiu', 'Ojalá la hubiera visto antes.', 5)";
ejecutarConsulta($db, $query3, 3);

// Cierra la conexión a la base de datos
mysqli_close($db);
?>
