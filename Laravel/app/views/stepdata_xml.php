<steplist>
<?php
    foreach ($bodydata as $dailydata) {
        echo '<stepdata>';
        echo '<uid>'.$dailydata->uid.'</uid>';
        echo '<year>'.$dailydata->year.'</year>';
        echo '<month>'.$dailydata->month.'</month>';
        echo '<day>'.$dailydata->day.'</day>';
       
        echo '<steps>'.$dailydata->steps.'</steps>';
        echo '</stepdata>';
    }
?>
</steplist>