<?php 

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$hotelsCopy = $hotels;

if(isset($_GET["parking"])){

    $hotelParking = [];

    if($_GET["parking"] == 'parking_yes'){

        foreach($hotels as $elem){

            if($elem['parking'] == true){
                $hotelParking[] = $elem;
            };      
        };

        $hotelsCopy = $hotelParking;

    }else if($_GET["parking"] == 'parking_no'){

        foreach($hotels as $elem){

            if($elem['parking'] == false){
                $hotelParking[] = $elem;
            };
        };

        $hotelsCopy = $hotelParking;
    };
    
};

if(isset($_GET["voteChosen"])){

    $hotelVote = [];

    foreach($hotelsCopy as $elem){

        if($elem['vote'] >= $_GET["voteChosen"]){
            $hotelVote[] = $elem;
        };
    };

    $hotelsCopy = $hotelVote;
};

$parcheggioPres = 'Parcheggio presente';
$parcheggioAss = 'Parcheggio assente';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

    <div class="container bg-body-tertiary mt-5 rounded-3 p-3">

        <h1 class="text-center p-4">Hotels</h1>

        <form action="index.php" method="GET" class="w-50">
            <div class="d-flex mt-2 mb-4">
                <select class="form-select w-50" aria-label="Default select example" name="parking">
                    <option selected>Seleziona parcheggio</option>
                    <option value="parking_yes">parcheggio presente</option>
                    <option value="parking_no">parcheggio assente</option>
                </select>
    
                <input type="number" class="form-control w-25 mx-2" name="voteChosen">
                <button type="submit" class="btn btn-light">Search</button>
            </div>
        </form>

        <table class="table text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance</th>
                </tr>
            </thead>
            <tbody>

                <?php 

                foreach($hotelsCopy as $elem){
                    echo "<tr>";
                        echo '<td>' . $elem["name"] . '</td>';
                        echo '<td>' . $elem["description"] . '</td>';

                        echo '<td>';

                            if($elem["parking"] == true){
                                echo $parcheggioPres;
                            }else{
                                echo $parcheggioAss;
                            };

                        '</td>';

                        echo '<td>' . $elem["vote"] . '</td>';
                        echo '<td>' . $elem["distance_to_center"] . ' km </td>';
                    "</tr>";
                };

                ?>

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>