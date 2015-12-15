<distancelist>
<?php
    foreach ($bodydata as $dailydata) {
        echo '<distancedata>';
        echo '<uid>'.$dailydata->uid.'</uid>';
        echo '<year>'.$dailydata->year.'</year>';
        echo '<month>'.$dailydata->month.'</month>';
        echo '<day>'.$dailydata->day.'</day>';
       
        echo '<mile>'.$dailydata->mile.'</mile>';
        echo '</distancedata>';
    }
?>
</distancelist>