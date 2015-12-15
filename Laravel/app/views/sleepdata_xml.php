<sleepdatalist>
<?php
    foreach ($bodydata as $dailydata) {
        echo '<sleepdata>';
        echo '<uid>'.$dailydata->uid.'</uid>';
        echo '<year>'.$dailydata->year.'</year>';
        echo '<month>'.$dailydata->month.'</month>';
        echo '<day>'.$dailydata->day.'</day>';
        echo '<start>'.$dailydata->start->format('Y-m-d H:i:s').'</start>';
        echo '<stop>'.$dailydata->stop->format('Y-m-d H:i:s').'</stop>';
        echo '<dsNum>'.$dailydata->dsNum.'</dsNum>';
		echo '<lsNum>'.$dailydata->lsNum.'</lsNum>';
		echo '<wakeTime>'.$dailydata->wakeTime.'</wakeTime>';
        echo '</sleepdata>';
    }
?>
</sleepdatalist>