<?php
function generate_ratings($rating) {
    $movie_rating = '';
    for ($i = 0; $i < $rating; $i++) {
        $movie_rating .= '<img src="star.png" alt="star"/>';
    }
    return $movie_rating;
}
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysql_error($db));

 $columna_orden = $_GET['orden'];
 $query = "SELECT * FROM reviews ORDER BY $columna_orden";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        // A continuación, muestra las reseñas ordenadas de manera similar al documento original
        echo <<<ENDHTML
        <html>
         <head>
          <title>Reviews - Sorted by $columna_orden</title>
         </head>
         <body>
          <div style="text-align: center;">
           <h2>Reviews - Sorted by $columna_orden</h2>
           <h3><em>Reviews</em></h3>
           <table cellpadding="2" cellspacing="2" style="width: 90%; margin-left: auto; margin-right: auto;">
            <tr>
             <th style="width: 7em;"><a href="ordenar_resenas.php?orden=date">Date</a></th>
             <th style="width: 10em;"><a href="ordenar_resenas.php?orden=reviewer_name">Reviewer</a></th>
             <th><a href="ordenar_resenas.php?orden=review_comment">Comments</a></th>
             <th style="width: 5em;"><a href="ordenar_resenas.php?orden=review_rating">Rating</a></th>
            </tr>
ENDHTML;

        while ($row = mysqli_fetch_assoc($result)) {
            $date = $row['review_date'];
            $name = $row['reviewer_name'];
            $comment = $row['review_comment'];
            $rating = generate_ratings($row['review_rating']);

            echo <<<ENDHTML
            <tr>
              <td style="vertical-align:top; text-align: center;">$date</td>
              <td style="vertical-align:top;">$name</td>
              <td style="vertical-align:top;">$comment</td>
              <td style="vertical-align:top;">$rating</td>
            </tr>
ENDHTML;
        }

        // Cierra la etiqueta HTML
        echo "</table></div></body></html>";
?>