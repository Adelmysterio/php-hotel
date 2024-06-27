<!-- Milestone 1
Stampare tutti i nostri hotel con tutti i dati disponibili. Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Milestone 2
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Milestone 3 
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA:
deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e
che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->
<?php include __DIR__ . '/db.php';
$hotelsWithPark = [];
$hotelsWithoutPark = [];

foreach ($hotels as $key => $hotel) {
    if ($hotel['parking'] == true) {
        $hotelsWithPark[] = $hotel;
    } else {
        $hotelsWithoutPark[] = $hotel;
    }
};

$parking = isset($_GET['parking']) ? $_GET['parking'] : 'all';

if ( $parking == 'withPark') {
    $hotels = $hotelsWithPark;

} else if ($parking == 'withoutPark') {
    $hotels = $hotelsWithoutPark;

} else {
    $hotels = $hotels;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>PHP Hotels</h1>
    <form action="./index.php" method="get">
        <p>Selezionare preferenza parcheggio</p>
        <input type="radio" id="all" name="parking" value="all">
        <label for="all">Mostra tutti</label><br>
        <input type="radio" id="withPark" name="parking" value="withPark">
        <label for="withPark">Con Parcheggio</label><br>
        <input type="radio" id="withoutPark" name="parking" value="withoutPark">
        <label for="withoutPark">Senza Parcheggio</label><br>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Voto</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Distanza dal centro</th>
                <th scope="col">Parcheggio</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($hotels as $hotel) { ?>
                <tr>
                    <td>
                        <?php echo $hotel['name'] ?>
                    </td>
                    <td>
                        <?php echo $hotel['vote'] ?>
                    </td>
                    <td>
                        <?php echo $hotel['description'] ?>
                    </td>
                    <td>
                        <?php echo $hotel['distance_to_center'] ?>
                    </td>
                    <td>
                        <?php if ($hotel['parking'] == true) {
                            echo 'Disponibile';
                        } else {
                            echo 'Non disponibile';
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</body>


</html>