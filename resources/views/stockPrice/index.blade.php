<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var ar = <?php echo json_encode($data) ?>;
var qdata = ar['qdata'];
var ndata = ar['ndata'];
var i;

var valuesQ = new Array();
var valuesN = new Array();
for(i=0; i<qdata.length; i++){
    valuesQ.push({
            x: new Date(qdata[i].DATE), 
            y: qdata[i].CLOSE, 
        });
}
for(i=0; i<ndata.length; i++){
    valuesN.push({
            x: new Date(ndata[i].DATE), 
            y: ndata[i].CLOSE, 
        });
}


console.log(valuesQ);



var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "QUALCOMM and NASDAQ Chart 2017.6.1-2018.6.30"
	},
	axisY:{
		includeZero: false
	},
	data: [{
		type: "line", 
		showInLegend: true, 
		legendText: "QUALCOMM_values",
		dataPoints: valuesQ,
	},
    {
		type: "line", 
		showInLegend: true, 
		legendText: "NASDAQ_values",
        dataPoints: valuesN
	}
    
    ]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

<h3>The highest q_profit is: {!!$data['qprofit']!!}<h3>
<h3>The highest n_profit is: {!!$data['nprofit']!!}<h3>
</html>