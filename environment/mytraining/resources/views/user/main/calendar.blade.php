
<!DOCTYPE html>
<html lang="ja">

<div class="calendar-container">
    <h3 class="mb-5"><a href="?ym={{$prev}}">&lt;</a> {{$html_title}} <a href="?ym={{$next}}">&gt;</a></h3>
    <table class="table-width table-bordered">
    
    <tr>
        <th class="th-c">日</th>
        <th class="th-c">月</th>
        <th class="th-c">火</th>
        <th class="th-c">水</th>
        <th class="th-c">木</th>
        <th class="th-c">金</th>
        <th class="th-c">土</th>
    </tr>
    <?php
        foreach ($weeks as $week) {
            echo $week;
        }
    ?>
       
    </table>
</div>
</html>