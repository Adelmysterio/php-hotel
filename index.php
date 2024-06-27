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
<?php include __DIR__ . '/db.php' ?>

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