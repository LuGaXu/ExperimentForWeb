<bodydata>
<?php
    foreach ($bodydata as $dailydata) {
        echo '<bloodpressuredata>';
        echo '<uid>'.$dailydata->uid.'</uid>';
        echo '<year>'.$dailydata->year.'</year>';
        echo '<month>'.$dailydata->month.'</month>';
        echo '<day>'.$dailydata->day.'</day>';
        echo '<hour>'.$dailydata->hour.'</hour>';
        echo '<max>'.$dailydata->maxdata.'</max>';
        echo '<min>'.$dailydata->mindata.'</min>';
        echo '</bloodpressuredata>';
    }
?>
</bodydata>