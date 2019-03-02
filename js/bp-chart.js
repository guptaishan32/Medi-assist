fetchdata();
      function fetchdata(){
	// alert("index page function ");
          
          
            var options = {
                chart: {
                    
                    type: 'line',
					 height: 300,
					 width: 450,
                    marginRight: 130,
                    marginBottom: 25,
					shadow: true
                },
				title:{text:'BP Record'},
				subtitle:{text:'@Medicare'},
				 xAxis: {
					 title: { text: ''},
                      categories: []
						
                },  
				yAxis: {
					   	title: {text: '' }
                	   },
				tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                            ; return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'center',
                    x: 10,
                    y: 100,
                    borderWidth: 0,
					backgroundColor: 'yellow',
			 		borderColor: '#C98657',
            		borderWidth: 3,
					borderRadius:5,
					enabled:true,
					itemHoverStyle: 
					{
                		color: '#FF0000',
					}
                },          
                series: [
							{
							}
							,
							{
							}
						]
            }
			
      //     alert(city);
    
	 var url = "gethighchartbprecord.php";
    $.getJSON(url,function(json)
          {
			  //alert("ok");
			  /*alert(JSON.stringify(json));*/
				
		    options.xAxis.categories = json[0]['data'];
			 options.series[0].data = json[2]['data'];
			
			options.series[1].data = json[1]['data'];//to show more cols
			
			
			options.xAxis.title.text=json[0]['date'];
				
				options.yAxis.title.text="Bp Level";//json[1]['count'];
				
               
				options.series[0].name=json[2]['low'];
				
				options.series[1].name=json[1]['high'];
				
                
				
/*				alert(json[1].data);
				alert(json[0].data);
				alert(json[2].data);*/
				
               // chart = new Highcharts.Chart(options);
			   $("#containerr").highcharts(options);
				
          }); 
			
			}
