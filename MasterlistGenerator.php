<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/authentication.php");
require_once("include/receipts.php");

date_default_timezone_set("Asia/Singapore");

$start_date = getParm('start_date','');
$end_date = getParm('end_date','');
$starttime_friendly = getParm('start_time','');
$endtime_friendly = getParm('end_time','');

$start_time = array_slice(explode(" ",getParm('start_time','')),0);
$end_time = array_slice(explode(" ",getParm('end_time','')),0);
$meridian_start = $start_time[1];
$meridian_end = $end_time[1];
$time_from = explode(":",$start_time[0]);
$time_to = explode(":",$end_time[0]);
$start_hour = $time_from[0];
$start_mins = $time_from[1];
$end_hour = $time_to[0];
$end_mins = $time_to[1];

function to_24_hour($hours,$minutes,$seconds,$meridian){
	$hours = sprintf('%02d',(int) $hours);
	$minutes = sprintf('%02d',(int) $minutes);
	$seconds = sprintf('%02d',(int) $seconds);
	$meridian = (strtolower($meridian)=='am') ? 'am' : 'pm';
	return date('H:i:s', strtotime("{$hours}:{$minutes}:{$seconds} {$meridian}"));
}
 
$From = $start_date." ".to_24_hour( $start_hour, $start_mins, 0, $meridian_start ); // Returns 13:02:03
$To = $end_date." ".to_24_hour( $end_hour, $end_mins, 0, $meridian_end ); // Returns 14:30:00

$objreceipts = new receipts($db);

$results = $objreceipts->getmasterlist($From, $To);

//get the User-friendly dates for date range
$md1=cal_to_jd(CAL_GREGORIAN,date("m",strtotime($start_date)),date("d",strtotime($start_date)),date("Y",strtotime($start_date)));
$monthname = jdmonthname($md1,1);
$dayname = jddayofweek($md1,2);
$startdate_friendly = $dayname.", ".$monthname." ".date('d',strtotime($start_date)).", ".date('Y');

$md2=cal_to_jd(CAL_GREGORIAN,date("m",strtotime($end_date)),date("d",strtotime($end_date)),date("Y",strtotime($end_date)));
$monthname = jdmonthname($md2,1);
$dayname = jddayofweek($md2,2);
$enddate_friendly = $dayname.", ".$monthname." ".date('d',strtotime($end_date)).", ".date('Y');
?>
	<?php if($results) { ?>
        <h3 style="text-align:center;">OHL TRADING INCORPORATED</h3>
        <h4 style="text-align:center;">225 - 4834 / 422 - 8309</h4>
        <h4 style="text-align:center;">PRODUCT MASTERLIST - WAREHOUSE</h4>
        <table id="masterlist_header" border="0" width="100%">
            <tbody>
                <tr>
                	<td width="20">From:</td>
                    <td> <?=$startdate_friendly." - ".$starttime_friendly?></td>
                    <td style="text-align:right;" rowspan="2"><b>Date Issued: <?=date("Y-m-d")?></b></td>
                </tr>
                <tr>
                	<td width="20">To:</td>
                	<td colspan="2"> <?=$enddate_friendly." - ".$endtime_friendly?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table id="masterlist_row_table" class="table table-condensed" border="1" bordercolor="#000000" style="background:#202328;">
            <thead>
                <tr>
                    <th width="80%"><b>ITEM NAME</b></th>
                    <th><b>TOTAL</b></th>
                <tr>
            </thead>
            <tbody>
            <?php foreach($results as $result) { ?>
                <tr>
                    <td><?=$result->Item?></td>
                    <td><?=(real)$result->TotalQuantity?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <br />
	<?php } ?>