function Analytics()
{
	this.siteUrl;
	this.init = function()
	{
		this.setListeners();
	};
	this.generateRandomNumbers = function(base, length)
	{
		var a = [];
		do
		{
			var i = Math.floor(Math.random() * base);
			var b = a.indexOf(i) > 0;
			if(!b)
			{
				a.push(i);
			}
		} while(a.length < length);
		return a;
	};
	this.generateRandomColors = function(length)
	{
		var colors = [];
		var letters = '0123456789ABCDEF'.split('');
		for(var a = 0; a < length; a++)
		{
			var nums = this.generateRandomNumbers(letters.length, 6);
			var c = '#';
			for(var j = 0; j < nums.length; j++)
			{
				c += letters[nums[j]];
			}
			colors.push(c);
		}
		return colors;
	};
	this.getFilters = function()
	{
		var s = '#analytics.index';
		var uId = $(s + ' .userId').val();
		var reportType = $(s + ' .reportType').val();
		var metric = $(s + ' .metric').val();
		var targetAudience = $(s + ' .targetAudience').val();
		var from = $(s + ' .from').val();
		var to = $(s + ' .to').val();
		//Orgs are the most common among users.
		var orgId = $(s + ' .organizationId').val();
		var o = 
		{ 
			date_to: to,
			date_from: from,
			user_id: uId,
			metric: metric,
			report_type: reportType, 
			target_audience: targetAudience,
			organization_id: orgId
		};
		return o;
	};
	this.renderGraph = function(graphType, data)
	{
		var imagesPath = '../public/libs/amcharts_3.13.0.free/images/';
		var gCntr = $('#analytics.index .graph');
		gCntr.css({minHeight: 400});
		switch(graphType)
		{
			case 'Line With Multiple Value Axes':
				//Used for multiple items.
				//lineWithMultipleValueAxes.html
			break;
			case 'Radar Simple':
				//For Geographic targets.
				//radarSimple.html
			break;
			case 'Area Hundred Percent Stacked':
				//area100PercentStacked.html
			break;
			case 'Column Hundred Percent Stacked':
				//column100PercentStacked.html
			break;
			case 'Line With Different Bullet Sizes':
				//All in one graph.
				//Use this graph perhaps for Engagement Data By Days. 
				//lineWithDifferentBulletSizes.html
			break;
			case 'Column Stacked':
				//columnStacked.html
			break;
			case 'Column Stacked And Clustered':
				//columnStackedAndClustered.html
			break;
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
					//_JSON_lineWithFilledValueRanges.html.
					var maximum = data.parameters.maximum;
					var half = maximum / 2;
					var chart = AmCharts.makeChart("chartdiv", {
		                "type": "serial",
		                "theme": "dark",
		                "dataDateFormat": "YYYY-MM-DD",
		                "pathToImages": imagesPath,
		                "dataProvider": data.provider,
		                "valueAxes": [{
		                    "maximum": maximum,
		                    "minimum": 0,
		                    "axisAlpha": 0,
		                    "guides": [{
		                        "fillAlpha": 0.1,
		                        "fillColor": "#CC0000",
		                        "lineAlpha": 0,
		                        "toValue": half,
		                        "value": 0
		                    }, {
		                        "fillAlpha": 0.1,
		                        "fillColor": "#0000cc",
		                        "lineAlpha": 0,
		                        "toValue": maximum,
		                        "value": half
		                    }]
		                }],
		                "graphs": [{
		                    "bullet": "square",
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
				
			break;
			case 'Area Stack':
				/*_JSON_areaStacked.html*/
					var chartData = data /*[{
			               "year": 2000,
			                   "cars": 1587,
			                   "motorcycles": 650,
			                   "bicycles": 121
			           }, {
			               	   "year": 1995,
			                   "cars": 1567,
			                   "motorcycles": 683,
			                   "bicycles": 146
			           }]*/;

			           AmCharts.makeChart("chartdiv", {
			               type: "serial",
			               pathToImages: imagesPath,
			               dataProvider: chartData,
			               marginTop: 10,
			               categoryField: "date",
			               categoryAxis: {
			                   gridAlpha: 0.07,
			                   axisColor: "#DADADA",
			                   startOnAxis: true
			               },
			               valueAxes: [{
			                   stackType: "regular",
			                   gridAlpha: 0.07,
			                   title: "Clicks"
			               }],
			               //TODO: Loop to specific obj indices for the items below.
			               graphs: [{
			                   type: "line",
			                   title: "General Manager",
			                   hidden: true,
			                   valueField: "General Manager",
			                   lineAlpha: 0,
			                   fillAlphas: 0.6,
			                   balloonText: "<span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>"
			               }, {
			                   type: "line",
			                   title: "Test Position",
			                   valueField: "Test Position",
			                   lineAlpha: 0,
			                   fillAlphas: 0.6,
			                   balloonText: "<span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>"
			               }],
			               legend: {
			                   position: "bottom",
			                   valueText: "[[value]]",
			                   valueWidth: 100,
			                   valueAlign: "left",
			                   equalWidths: false,
			                   periodValueText: "total: [[value.sum]]"
			               },
			               chartCursor: {
			                   cursorAlpha: 0
			               },
			               chartScrollbar: {
			                   color: "FFFFFF"
			               }

			           });
			break;
			case 'Stack':
				/*
					columnStacked.html
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
	this.toHumanReadableDate = function(date)
	{
		return date;
	};
	this.generateReport = function()
	{
		var ref = this;
		var o = {};
		var roleName = $('.btnGenerate').data('role-name');
		switch(roleName)
		{
			case 'Employer':
				//
			break;
			case 'Faculty':
				//Fields.
				$('.fields input').each(function(){
					var t = $(this);
					if(t.is(':checked'))
					{
						var name = t.attr('name');
						o[name] = 1;
					}
				});
				var course = $('select.course').val();
			break;
		}
		var params = $.extend({}, o, this.getFilters());
		var url = this.siteUrl + 
				'/analytics/generate/';
		$.ajax({
			url: url,
			type: 'POST',
			data: params,
			success: function(response)
			{
				if(response.status == 'success')
				{
					ref.renderGraph(response.data.graphType, response.data);
				}
				else
				{
					//TODO: Show error.
				}
			}
		});
	};
	this.setListeners = function()
	{
		var o = this;
		var s = '#analytics.index';
		$('.row.panel.employer .reportType').change(function(){
			var t = $(this);
			var sReportType = t.val();
			$.ajax({
				url: o.siteUrl + '/analytics/readMetrices/' + sReportType,
				success: function(response)
				{
					var m = $('.row.panel.employer .metric');
					m.html('');
					var data = response.metrices;
					var s = '';
					for(var a in data)
					{
						s += '<option value="' + a + 
							'">' + a + 
							'</option>';
					}
					m.html(s);
				}
			});
		});
		$(s + ' .btnGenerate').click(function(e){
			o.generateReport();
			//o.renderGraph('Line', null);
			e.preventDefault();
		});
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
							var r = response;
							if(r.status == 'success')
							{
								var d = r.data;
								var sCntr = $(s + ' .saved');
								var v = '<div data-id="' + d.id + '" class="panel row">';
									v += '<div class="small-12 medium-12 large-12 columns"><h5>' + d.title + '</h5></div>';
									v += '<div class="small-12 medium-12 large-4 columns">Report Type: ' + d.report_type + '</div>';
									v += '<div class="small-12 medium-12 large-4 columns">Frequency: ' + d.frequency + '</div>';
									v += '<div class="small-12 medium-12 large-4 columns">Dates: ' + 
											o.toHumanReadableDate(d.date_to) + ' - ' + 
											o.toHumanReadableDate(d.date_from) + 
										'</div>';
									v += '<div class="small-12 medium-12 large-12 columns">Recipients: ' + d.recipients + '</div>';
									v += '<a href="#" class="button tiny delete">&times;</a>';
								v += '</div>';
								sCntr.append(v);
							}
							else
							{
								console.log(response.error);
							}
						}
					}
				);
				e.preventDefault();
			}
		);
		$(s + ' .saved .delete').on('click', 
			function(e)
			{
				if(confirm('Are you sure?'))
				{
					var p = $(this).parent();
					$.ajax
					(
						{
							url: o.siteUrl + '/analytics/deleteEmailer/' + p.data('id'),
							success: function()
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
new Analytics().generateRandomColors(10);