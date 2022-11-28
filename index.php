<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => 'true',
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => 'true',
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => 'false',
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => 'false',
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => 'true',
        'vote' => 2,
        'distance_to_center' => 50
    ],

];


if (isset($_GET['parking']) && !empty($_GET['parking'])) {
    $parking = $_GET['parking'];
    $hotels = array_filter($hotels, fn($value) => $value['parking'] == $parking);
    // var_dump($hotels);

}
if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $vote = $_GET['vote'];
    $hotels = array_filter($hotels, fn($value) => $value['vote'] == $vote);
    // var_dump($hotels);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Php Hotel</title>
</head>

<body>

    <div class="container text-center card wrapper">
        <div class="text-center py-5">
            <form action="index.php" method="GET" name="formFilter">
                <div class="mb-3">
                    <label for="parking" class="form-label">parking</label>
                    <select name="parking" id="parking">
                        <option value="">Scegli</option>
                        <option value="true">parking</option>
                        <option value="false">no parking</option>
                    </select>
                    <label for="vote" class="form-label">vote</label>
                    <select name="vote" id="vote">
                        <option value="">Scegli</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filtra</button>
                </div>

            </form>
        </div>
        <div class="container">
            <h1 class="text-center py-2 text-danger">
                Hotels
            </h1>
            <table class="table my-5">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $hotel): ?>
                    <tr>
                        <th class="text-center" scope="row">
                            <?php echo $hotel["name"] ?>
                        </th>
                        <td class="text-center">
                            <?php echo $hotel["description"] ?>
                        </td>
                        <td class="text-center">
                            <?php if ($hotel["parking"] === 'true') {
                            echo "Avaible";
                        } else {
                            echo "Not avaible";
                        } ?>
                        </td>
                        <td class="text-center">
                            <?php echo $hotel["vote"] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $hotel["distance_to_center"] ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>