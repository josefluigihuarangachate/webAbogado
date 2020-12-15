"use strict";

/*--================================--*/
// Revenue Date Picker
/*--================================--*/

$(function () {
	var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';

	// Button         
	var start = moment().subtract(29, 'days');
	var end = moment();

	function cb(start, end) {
		$('#revenueDatePicker').html(start.format('MMM DD, YYYY') + ' - ' + end.format('MMM DD, YYYY'));
	}
	$('#revenueDatePicker').daterangepicker({
		startDate: start,
		endDate: end,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		},
		opens: (isRtl ? 'left' : 'right')
	}, cb);
	cb(start, end);

	// Replace icons         
	$('#revenueDatePicker').each(function () {
		var obj = $(this).data('daterangepicker');
		var _updateCalendars = obj.updateCalendars;
		obj.updateCalendars = function () {
			// Call original function
			_updateCalendars.call(obj)
			// Replace icons
			obj.container.find('.prev > i').each(function () {
				this.className = 'ion ion-ios-arrow-back'
			});
			obj.container.find('.next > i').each(function () {
				this.className = 'ion ion-ios-arrow-forward'
			});
			obj.container.find('.daterangepicker_input > i').each(function () {
				this.className = 'ion ion-md-calendar'
			});
			obj.container.find('.calendar-time > i').each(function () {
				this.className = 'ion ion-md-time'
			});
		};
	});
});


window.onload = function () {

	/*--================================--*/
	// Daily Sales Chart
	/*--================================--*/

	var ctx1 = document.getElementById('dailySalesChart').getContext('2d');
	window.dailySalesChart = new Chart(ctx1, {

		type: 'line',
		data: {
			labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			datasets: [{
				label: 'Total Sales',
				fill: true,
				backgroundColor: 'rgba(92, 118, 251, 0.15)',
				borderColor: '#5c76fb',
				borderWidth: 1,
				data: [520, 450, 680, 530, 750, 560, 780],
			}]
		},
		options: {
			responsive: true,
			tooltips: {
				intersect: true,
				bodyFontSize: 11,
				bodyFontFamily: '"Poppins", sans-serif',
				callbacks: {
					label: function (tooltipItem, data) {
						return "Total Sales: " + "$" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function (c, i, a) {
							return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
						});
					}
				}
			},
			hover: {
				intersect: true
			},
			scales: {
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Product Sales',
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],
				xAxes: [{
					display: true,
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],

			},
			legend: {
				display: false,
			},
		}
	});

	/*--================================--*/
	// Weekly Sales Chart
	/*--================================--*/

	var ctx1 = document.getElementById('weeklySalesChart').getContext('2d');
	window.weeklySalesChart = new Chart(ctx1, {

		type: 'line',
		data: {
			labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6', 'Week7'],
			datasets: [{
				label: 'Total Sales',
				fill: true,
				backgroundColor: 'rgba(253, 191, 94, 0.15)',
				borderColor: '#fdbf5e',
				borderWidth: 1,
				data: [520, 450, 680, 530, 750, 560, 780],
			}]
		},
		options: {
			responsive: true,
			tooltips: {
				intersect: true,
				bodyFontSize: 11,
				bodyFontFamily: '"Poppins", sans-serif',
				callbacks: {
					label: function (tooltipItem, data) {
						return "Total Sales: " + "$" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function (c, i, a) {
							return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
						});
					}
				}
			},
			hover: {
				intersect: true
			},
			scales: {
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Product Sales',
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],
				xAxes: [{
					display: true,
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],

			},
			legend: {
				display: false,
			},
		}
	});

	/*--================================--*/
	// Monthly Sales Chart
	/*--================================--*/

	var ctx1 = document.getElementById('monthlySalesChart').getContext('2d');
	window.monthlySalesChart = new Chart(ctx1, {

		type: 'line',
		data: {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Opt', 'Nov', 'Dec'],
			datasets: [{
				label: 'Total Sales',
				fill: true,
				backgroundColor: 'rgba(74, 199, 236, 0.15)',
				borderColor: '#4ac7ec',
				borderWidth: 1,
				data: [500, 520, 400, 450, 600, 680, 500, 530, 700, 750, 500, 860, 980],
			}]
		},
		options: {
			responsive: true,
			tooltips: {
				intersect: true,
				bodyFontSize: 11,
				bodyFontFamily: '"Poppins", sans-serif',
				callbacks: {
					label: function (tooltipItem, data) {
						return "Total Sales: " + "$" + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function (c, i, a) {
							return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
						});
					}
				}
			},
			hover: {
				intersect: true
			},
			scales: {
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Product Sales',
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],
				xAxes: [{
					display: true,
					ticks: {
						fontColor: '#868DAA',
						fontSize: 11,
						fontStyle: "normal",
						fontFamily: '"Poppins", sans-serif',
					},
					gridLines: {
						display: true,
						color: '#eee',
					},
				}],

			},
			legend: {
				display: false,
			},
		}
	});

	/*--================================--*/
	// Total Profit Dount Chart JS
	/*--================================--*/

	Chart.pluginService.register({
		beforeDraw: function (chart) {
			if (chart.config.options.elements.center) {
				var ctx = chart.chart.ctx;
				var centerConfig = chart.config.options.elements.center;
				var fontStyle = centerConfig.fontStyle || '"Poppins", sans-serif';
				var txt = centerConfig.text;
				var color = centerConfig.color || '#000';
				var sidePadding = centerConfig.sidePadding || 40;
				var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
				ctx.font = "30px " + fontStyle;
				var stringWidth = ctx.measureText(txt).width;
				var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;
				var widthRatio = elementWidth / stringWidth;
				var newFontSize = Math.floor(30 * widthRatio);
				var elementHeight = (chart.innerRadius * 2);
				var fontSizeToUse = Math.min(newFontSize, elementHeight);
				ctx.textAlign = 'center';
				ctx.textBaseline = 'middle';
				var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
				var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
				ctx.font = fontSizeToUse + "px " + fontStyle;
				ctx.fillStyle = color;
				ctx.fillText(txt, centerX, centerY);
			}
		}
	});


	var config = {
		type: 'doughnut',
		data: {
			labels: [
				"Current",
				"Target",
				"Lost"
			],
			datasets: [{
				data: [300, 100, 50],
				backgroundColor: [
					"#3355ff",
					"#e0e7fd",
					"#4ac7ec"
				]
			}]
		},
		options: {
			elements: {
				center: {
					text: '$5,535',
					color: '#001737',
					fontStyle: 'rubik',
				}
			},
			responsive: true,
			legend: {
				display: true,
				position: 'bottom',
				labels: {
					boxWidth: 12,
					fontColor: '#868DAA',
					fontSize: 12,
					fontStyle: "normal",
					fontFamily: '"Poppins", sans-serif',
					padding: 20
				}
			},
			cutoutPercentage: 70,
			tooltips: {
				fontColor: '#868DAA',
				fontSize: 11,
				fontStyle: "normal",
				fontFamily: '"Poppins", sans-serif',
				callbacks: {
					label: function (tooltipItem, data) {
						var dataset = data.datasets[tooltipItem.datasetIndex];
						var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
							return previousValue + currentValue;
						});
						var currentValue = dataset.data[tooltipItem.index];
						var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

						return percentage + "%";
					}
				}
			},


		}
	};


	var ctx = document.getElementById("totalProfitDount").getContext("2d");
	var totalProfitDount = new Chart(ctx, config);

	/*--================================--*/
	// Slimscroll Active Code
	/*--================================--*/

	if ($.fn.slimscroll) {
		$('#productScrollBar, #featureProductsScrollBar, #topSellingProductsScrollBar').slimscroll({
			height: '400px',
			size: '3px',
			position: 'right',
			color: '#b3bac1',
			alwaysVisible: false,
			distance: '0px',
			railVisible: false,
			wheelStep: 15
		});
	}

	if ($.fn.slimscroll) {
		$('#reviewScrollBar').slimscroll({
			height: '420px',
			size: '3px',
			position: 'right',
			color: '#b3bac1',
			alwaysVisible: false,
			distance: '0px',
			railVisible: false,
			wheelStep: 15
		});
	}

}

/*--================================--*/
// World Map   
/*--================================--*/

"use strict";
$(document).ready(function () {
	// World Map
	$('#world-map').vectorMap({
		map: 'world_mill_en',
		showTooltip: true,
		backgroundColor: 'transparent',
		markerStyle: {
			initial: {
				fill: '#2e2e2e',
				stroke: '#3355ff',
				"fill-opacity": 1,
				"stroke-width": 15,
				"stroke-opacity": 0.2
			}
		},
		markers: [{
				latLng: [37.18, -93.35],
				name: 'United States'
			},
			{
				latLng: [20.59, 78.96],
				name: 'India'
			},
			{
				latLng: [-25.27, 133.77],
				name: 'Australia'
			},
			{
				latLng: [-38.41, -63.61],
				name: 'Argentina'
			},
			{
				latLng: [61.52, 105.31],
				name: 'Russia'
			},
			{
				latLng: [-30.55, 22.93],
				name: 'South Africa'
			},
		],
		focusOn: {
			x: 0,
			y: 0,
			scale: 1
		},
		series: {
			regions: [{
				values: {
					US: 'rgba(148, 77, 255, 0.3)',
					AU: 'rgba(255, 228, 17, 0.3)',
					IN: 'rgba(8, 210, 111, 0.3)',
					AR: 'rgba(252, 79, 104, 0.3)',
					RU: 'rgba(129, 206, 246, 0.3)',
					ZA: 'rgba(252, 79, 104, 0.3)',
				}
			}]
		},
		regionStyle: {
			initial: {
				fill: '#e0e7fd'
			}
		}
	});

})