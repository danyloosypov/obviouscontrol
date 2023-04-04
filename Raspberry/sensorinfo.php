<?php 

	if(isset($_GET['id'])) {
		$id = $_GET['id'];

		$db = new SQLite3('clientdb.db');

		$results = $db->query("SELECT value, `datetime` FROM sensor_value where sensor_id = '$id'");
	    $dataPoints = Array();
	    $arrx = Array();
	    $arry = Array();
		while ($row = $results->fetchArray()) {
			$value = $row['value'];
			$date = $row['datetime'];
			$arrx[] = $date;
			$arry[] = $value;

		}

		$results = $db->query("SELECT max(value) as maxval, min(value) as minval, max(datetime) as maxdate, min(datetime) as mindate FROM sensor_value where sensor_id = '$id'");
	   	$row = $results->fetchArray();
		$maxval = $row['maxval'];
		$minval = $row['minval'];
		$maxdate = $row['maxdate'];
		$mindate = $row['mindate'];
		echo $minval;
		echo $maxval;
		echo $maxdate;
		echo $mindate;


	}




?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>







var xValues = <?php echo json_encode($arrx); ?>;
var yValues = <?php echo json_encode($arry); ?>;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: <?php echo $minval ?>, max:<?php echo $maxval ?>}}],
      xAxes: [{ticks: {min: "<?php echo $mindate ?>", max:"<?php echo $maxdate ?>"}}]
    }
  }
});
</script>

</body>
</html>