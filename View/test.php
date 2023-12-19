<?php
include "../View/header.php";
include ("../Model/adminModel.php");
echo json_encode(totalTicket());
echo json_encode(getCreationDate());
echo json_encode(allTicket());
echo json_encode(openTicket());
?>
<script>
  var totalTicket=<?php echo json_encode(totalTicket());?>
  var date=<?php echo json_encode(getCreationDate());?>
  var xValues=totalTicket;
  var yValues=date;
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
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>

