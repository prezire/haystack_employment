function Analytics()
{
	this.siteUrl;
	this.init = function()
	{
		this.setListeners();
	};
	this.getFilters = function()
	{
		var s = '#analytics.index';
		var uId = $(s + ' .userId').val();
		var filter = $(s + ' .filter').val();
		var from = $(s + ' .from').val();
		var to = $(s + ' .to').val();
		var o = 
		{
			filter: filter, 
			date_from: from, 
			date_to: to,
			user_id: uId
		};
		return o;
	};
	this.renderGraph = function(data)
	{
		var s = '#analytics.index';
		var graphType = $(s + ' .graphType').val();
		var gCntr = $(s + ' .graph');
		gCntr.height(400);
		switch(graphType)
		{
			case 'Column':
				/*
					columnRotatedSeries.html
					var chart;

		            var chartData = [
		                {
		                    "country": "USA",
		                    "visits": 3025,
		                    "color": "#FF0F00"
		                },
		                {
		                    "country": "China",
		                    "visits": 1882,
		                    "color": "#FF6600"
		                },
		                {
		                    "country": "Japan",
		                    "visits": 1809,
		                    "color": "#FF9E01"
		                },
		                {
		                    "country": "Germany",
		                    "visits": 1322,
		                    "color": "#FCD202"
		                },
		                {
		                    "country": "UK",
		                    "visits": 1122,
		                    "color": "#F8FF01"
		                },
		                {
		                    "country": "France",
		                    "visits": 1114,
		                    "color": "#B0DE09"
		                },
		                {
		                    "country": "India",
		                    "visits": 984,
		                    "color": "#04D215"
		                },
		                {
		                    "country": "Spain",
		                    "visits": 711,
		                    "color": "#0D8ECF"
		                },
		                {
		                    "country": "Netherlands",
		                    "visits": 665,
		                    "color": "#0D52D1"
		                },
		                {
		                    "country": "Russia",
		                    "visits": 580,
		                    "color": "#2A0CD0"
		                },
		                {
		                    "country": "South Korea",
		                    "visits": 443,
		                    "color": "#8A0CCF"
		                },
		                {
		                    "country": "Canada",
		                    "visits": 441,
		                    "color": "#CD0D74"
		                }
		            ];


		            AmCharts.ready(function () {
		                // SERIAL CHART
		                chart = new AmCharts.AmSerialChart();
		                chart.dataProvider = chartData;
		                chart.categoryField = "country";
		                chart.startDuration = 1;

		                // AXES
		                // category
		                var categoryAxis = chart.categoryAxis;
		                categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		                categoryAxis.gridAlpha = 0;
		                categoryAxis.fillAlpha = 1;
		                categoryAxis.fillColor = "#FAFAFA";
		                categoryAxis.gridPosition = "start";

		                // value
		                var valueAxis = new AmCharts.ValueAxis();
		                valueAxis.dashLength = 5;
		                valueAxis.title = "Visitors from country";
		                valueAxis.axisAlpha = 0;
		                chart.addValueAxis(valueAxis);

		                // GRAPH
		                var graph = new AmCharts.AmGraph();
		                graph.valueField = "visits";
		                graph.colorField = "color";
		                graph.balloonText = "<b>[[category]]: [[value]]</b>";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                chart.addGraph(graph);

		                // CURSOR
		                var chartCursor = new AmCharts.ChartCursor();
		                chartCursor.cursorAlpha = 0;
		                chartCursor.zoomable = false;
		                chartCursor.categoryBalloonEnabled = false;
		                chart.addChartCursor(chartCursor);

		                chart.creditsPosition = "top-right";

		                // WRITE
		                chart.write("chartdiv");
		            });
				*/
			break;
			case 'Line':
				/*
					_JSON_lineWithFilledValueRanges.html
					var chart = AmCharts.makeChart("chartdiv", {
		                "type": "serial",
		                "theme": "dark",
		                "dataDateFormat": "YYYY-MM-DD",
		                "pathToImages": "../amcharts/images/",
		                "dataProvider": [{
		                    "date": "2013-11-30",
		                    "value": 104
		                }, {
		                    "date": "2013-12-01",
		                    "value": 108
		                }, {
		                    "date": "2013-12-02",
		                    "value": 103
		                }, {
		                    "date": "2013-12-03",
		                    "value": 105
		                }, {
		                    "date": "2013-12-04",
		                    "value": 136
		                }, {
		                    "date": "2013-12-05",
		                    "value": 138
		                }, {
		                    "date": "2013-12-06",
		                    "value": 113
		                }, {
		                    "date": "2013-12-07",
		                    "value": 131
		                }, {
		                    "date": "2013-12-08",
		                    "value": 114
		                }, {
		                    "date": "2013-12-09",
		                    "value": 124
		                }],
		                "valueAxes": [{
		                    "maximum": 140,
		                    "minimum": 100,
		                    "axisAlpha": 0,
		                    "guides": [{
		                        "fillAlpha": 0.1,
		                        "fillColor": "#CC0000",
		                        "lineAlpha": 0,
		                        "toValue": 120,
		                        "value": 0
		                    }, {
		                        "fillAlpha": 0.1,
		                        "fillColor": "#0000cc",
		                        "lineAlpha": 0,
		                        "toValue": 200,
		                        "value": 120
		                    }]
		                }],
		                "graphs": [{
		                    "bullet": "round",
		                    "dashLength": 4,
		                    "valueField": "value"
		                }],
		                "chartCursor": {
		                    "cursorAlpha": 0
		                },
		                "categoryField": "date",
		                "categoryAxis": {
		                    "parseDates": true
		                }
		            });
				*/
			break;
			case 'Stack':
				/*
					columnStacked.htmPl
					var chart;
		            var chartData = [
		                {
		                    "year": "2003",
		                    "europe": 2.5,
		                    "namerica": 2.5,
		                    "asia": 2.1,
		                    "lamerica": 0.3,
		                    "meast": 0.2,
		                    "africa": 0.1
		                },
		                {
		                    "year": "2004",
		                    "europe": 2.6,
		                    "namerica": 2.7,
		                    "asia": 2.2,
		                    "lamerica": 0.3,
		                    "meast": 0.3,
		                    "africa": 0.1
		                },
		                {
		                    "year": "2005",
		                    "europe": 2.8,
		                    "namerica": 2.9,
		                    "asia": 2.4,
		                    "lamerica": 0.3,
		                    "meast": 0.3,
		                    "africa": 0.1
		                }
		            ];

		            AmCharts.ready(function () {
		                // SERIAL CHART
		                chart = new AmCharts.AmSerialChart();
		                chart.dataProvider = chartData;
		                chart.categoryField = "year";
		                chart.plotAreaBorderAlpha = 0.2;

		                // AXES
		                // category
		                var categoryAxis = chart.categoryAxis;
		                categoryAxis.gridAlpha = 0.1;
		                categoryAxis.axisAlpha = 0;
		                categoryAxis.gridPosition = "start";

		                // value
		                var valueAxis = new AmCharts.ValueAxis();
		                valueAxis.stackType = "regular";
		                valueAxis.gridAlpha = 0.1;
		                valueAxis.axisAlpha = 0;
		                chart.addValueAxis(valueAxis);

		                // GRAPHS
		                // first graph    
		                var graph = new AmCharts.AmGraph();
		                graph.title = "Europe";
		                graph.labelText = "[[value]]";
		                graph.valueField = "europe";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#C72C95";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);

		                // second graph              
		                graph = new AmCharts.AmGraph();
		                graph.title = "North America";
		                graph.labelText = "[[value]]";
		                graph.valueField = "namerica";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#D8E0BD";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);                

		                // third graph                              
		                graph = new AmCharts.AmGraph();
		                graph.title = "Asia-Pacific";
		                graph.labelText = "[[value]]";
		                graph.valueField = "asia";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#B3DBD4";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);

		                // fourth graph  
		                graph = new AmCharts.AmGraph();
		                graph.title = "Latin America";
		                graph.labelText = "[[value]]";
		                graph.valueField = "lamerica";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#69A55C";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);

		                // fifth graph
		                graph = new AmCharts.AmGraph();
		                graph.title = "Middle-East";
		                graph.labelText = "[[value]]";
		                graph.valueField = "meast";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#B5B8D3";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);

		                // sixth graph   
		                graph = new AmCharts.AmGraph();
		                graph.title = "Africa";
		                graph.labelText = "[[value]]";
		                graph.valueField = "africa";
		                graph.type = "column";
		                graph.lineAlpha = 0;
		                graph.fillAlphas = 1;
		                graph.lineColor = "#F4E23B";
		                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span class='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
		                chart.addGraph(graph);

		                // LEGEND                  
		                var legend = new AmCharts.AmLegend();
		                legend.borderAlpha = 0.2;
		                legend.horizontalGap = 10;
		                chart.addLegend(legend);

		                // WRITE
		                chart.write("chartdiv");
		            });

		            // this method sets chart 2D/3D
		            function setDepth() {
		                if (document.getElementById("rb1").checked) {
		                    chart.depth3D = 0;
		                    chart.angle = 0;
		                } else {
		                    chart.depth3D = 25;
		                    chart.angle = 30;
		                }
		                chart.validateNow();
		            }
				*/
			break;
			case 'Pie':
				/*
					_JSON_pieWithLegend.html
					AmCharts.makeChart("chartdiv", {
		                "type": "pie",
		                "dataProvider": [{
		                    "country": "Czech Republic",
		                        "litres": 156.9
		                }, {
		                    "country": "Ireland",
		                        "litres": 131.1
		                }, {
		                    "country": "Germany",
		                        "litres": 115.8
		                }, {
		                    "country": "Australia",
		                        "litres": 109.9
		                }, {
		                    "country": "Austria",
		                        "litres": 108.3
		                }, {
		                    "country": "UK",
		                        "litres": 65
		                }, {
		                    "country": "Belgium",
		                        "litres": 50
		                }],
		                "titleField": "country",
		                "valueField": "litres",
		                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
		                "legend": {
		                    "align": "center",
		                    "markerType": "circle"
		                }
		            });
				*/
			break;
		}
	};
	this.wrap = function(item)
	{
		var v = '<div class="small-12 medium-12 large-12 columns">';
			v += item;
		v += '</div>';
		return v;
	};
	this.setListeners = function()
	{
		var o = this;
		var s = '#analytics.index';
		$(s + ' .btnGenerate').click
		(
			function(e)
			{
				$.ajax
				(
					{
						url: o.siteUrl + '/analytics/generate',
						type: 'POST',
						data: o.getFilters(),
						success: function(response)
						{
							if(response.status == 'success')
							{
								o.renderGraph(response.data);
							}
							else
							{
								//TODO: Show error.
							}
						}
					}
				);
				e.preventDefault();
			}
		);
		$(s + ' .btnSave').click
		(
			function(e)
			{
				var freq = $(s + ' .frequency').val();
				var ttl = $(s + ' .title').val();
				var recipients = $(s + ' .recipients').val();
				//Concat 2 obj params.
				var params = $.extend
				(
					{}, 
					{
						frequency: freq, 
						title: ttl, 
						recipients: recipients
					}, 
					o.getFilters()
				);
				$.ajax
				(
					{
						url: o.siteUrl + '/analytics/createEmailer',
						type: 'POST',
						data: params,
						success: function(response)
						{
							if(response.status == 'success')
							{
								var id = 'emailer' + response.data.id;
								var sCntr = $(s + ' .saved');
								var v = '<div id="' + id + '" class="row">';
									v += o.wrap(freq);
									v += o.wrap(ttl);
									v += o.wrap(email);
									v += o.wrap(dateTime);
									v += o.wrap('&times;');
								v += '</div>';
								sCntr.append(v);
							}
							else
							{
								//TODO: Show error.
							}
						}
					}
				);
				e.preventDefault();
			}
		);
		$(s + ' .saved .delete').click
		(
			function(e)
			{
				if(confirm('Are you sure?'))
				{
					var p = $(this).parent().parent();
					$a.ajax
					(
						{
							url: o.siteUrl + '/analytics/deleteEmailer/' + p.attr('id'),
							success: function(response)
							{
								p.remove();
							}
						}
					);
				}
				e.preventDefault();
			}
		);
	};
}