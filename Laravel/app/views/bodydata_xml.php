<bodydata>
<?php
    foreach ($bodydata as $dailydata) {
        echo '<dailydata>';
        echo '<userId>'.$dailydata->userId.'</userId>';
        echo '<height>'.$dailydata->height.'</height>';
        echo '<weight>'.$dailydata->weight.'</weight>';
        echo '<bust>'.$dailydata->bust.'</bust>';
        echo '<waist>'.$dailydata->waist.'</waist>';
        echo '<hip>'.$dailydata->hip.'</hip>';
        echo '<heartRate>'.$dailydata->heartRate.'</heartRate>';
        echo '<systolic>'.$dailydata->systolic.'</systolic>';
        echo '<diastolic>'.$dailydata->diastolic.'</diastolic>';
        echo '</dailydata>';
    }
?>
</bodydata>