<!doctype html>
<?php

/**
 * Define paths to files here, like '/tmp/some-file.txt' (Linux) or 'C:\\some\\file.txt'
 */
$files = [
    'heartRate' => '/tmp/heart-rate.txt', // Contains heart rate in BPM
    'bloodPressure' => '/tmp/blood pressure.txt', // Contains pressure in mmhg like "120 / 90"
    'temperature' => '/tmp/temperature.txt', // Container temperature in celcius
    'saturation' => '/tmp/saturation.txt', // Contains oxygen saturation in %
    'bed' => '/tmp/bed.txt', // Contains 1 if the bed is full, 0 if the bed is empty
];

// Read all the data
$data = [];

foreach ($files as $key => $file) {
    if (file_exists($file)) {
        $value = trim(file_get_contents($file));
    } else {
        $value = '?';
    }

    $data[$key] = $value;
}

?>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/monitor.css">
        <link rel="shortcut icon" href="images/monitor.png" type="image/png">

        <title>Medische Monitor</title>

        <!-- refresh every 5 seconds -->
        <meta http-equiv="refresh" content="5">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="flaticon-heart-rate-monitor"></i> Medische Monitor
            </a>
        </nav>

        <div class="container">

            <?php if ($data['bed'] !== '0'): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            <i class="flaticon-illness-on-bed"></i> De patiënt is uit bed!
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="flaticon-heart-beats-lifeline-in-a-heart"></i> Hartslag
                        </div>
                        <div class="card-body">
                            <?= $data['heartRate'] ?>
                        </div>
                        <div class="card-footer text-muted">
                            BPM
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="flaticon-blood-pressure-control-tool"></i> Bloeddruk
                        </div>
                        <div class="card-body">
                            <?= $data['bloodPressure'] ?>
                        </div>
                        <div class="card-footer text-muted">
                            mmhg
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="flaticon-oxygen"></i> Saturatie
                        </div>
                        <div class="card-body">
                            <?= $data['saturation'] ?>
                        </div>
                        <div class="card-footer text-muted">
                            %
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-header">
                            <i class="flaticon-thermometer-medical-fever-temperature-control-tool"></i> Temperatuur
                        </div>
                        <div class="card-body">
                            <?= $data['temperature'] ?>
                        </div>
                        <div class="card-footer text-muted">
                            &deg;C
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>
