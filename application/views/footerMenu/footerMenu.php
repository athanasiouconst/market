
<!-- footer -->
	<div class="footer">
		<div class="container">
			<ul class="agileits_w3layouts_footer_info">
				<a href="<?php echo base_url(); ?>">Αρχική</a><i>|</i></li>
				<a href="<?php echo base_url('WorkingDays/ViewDays'); ?>">Ημέρες Εργασίας</a><i>|</i></li>
				<a href="<?php echo base_url('PublicMarket/ViewPublicMarket'); ?>">Λαϊκή Αγορά</a><i>|</i></li>
				<a href="<?php echo base_url('Products/ViewProducts'); ?>">Προϊόντα</a><i>|</i></li>
				<a href="<?php echo base_url('Sales/ViewSales'); ?>">Πωλήσεις</a><i>|</i></li>
			</ul>
		</div>
	</div>
<!-- //footer -->
<!-- script for marque -->
	<script>
	  $('.marquee').marquee({
		gap: 100,
		delayBeforeStart: 0,
		direction: 'left',
		duplicated: true,
		pauseOnHover: true
	});
	</script>
	
<!-- //script for marque -->
<!-- area-chart -->
<script type="text/javascript">
    $(window).load(function () {
		var d0 = [[2, 5], [4, 8], [6, 2], [7, 3], [10, 4], [12, 5], [13, 6], [14, 4]];
			var plot2 = $.plotAnimator($("#chart2"), [{ data: d0, animator: {steps: 136, duration: 2500, start:0}, lines: { show: true, fill: true },label: "SENSEX" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});

		$("#bnt2").attr("disabled", "disabled");
		$("#chart2").on("animatorComplete", function() {
			$("#bnt2").removeAttr("disabled")
		});
		$("#bnt2").on("click",function() {
			$("#bnt2").attr("disabled", "disabled");
				plot2 = $.plotAnimator($("#chart2"), [{ data: d0, animator: {steps: 136, duration: 2500, start:0}, lines: { show: true, fill: true },label: "SENSEX" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});
		});
		
		var d5 = [[1, 4], [2, 2], [4, 4], [6, 2], [8, 4], [10, 2], [15, 4], [20, 2]];
    	var d6 = [[1, 3], [20, 3]];
	var plot3 = $.plotAnimator($("#chart3"), [{ data: d5, animator: {steps: 136, duration: 2000, start:0}, lines: { show: true, fill: true }, label: "Fill this"}, { data: d6, lines: { show: true, fill: false}, label: "Standard Values" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});

	$("#bnt3").attr("disabled", "disabled");
	$("#chart3").on("animatorComplete", function() {
		$("#bnt3").removeAttr("disabled")
	});
	$("#bnt3").on("click",function() {
		$("#bnt3").attr("disabled", "disabled");
		plot3 = $.plotAnimator($("#chart3"), [{ data: d5, animator: {steps: 136, duration: 2000, start:0}, lines: { show: true, fill: true }, label: "Fill this"}, { data: d6, lines: { show: true, fill: false}, label: "Standard Values" }],{grid: { backgroundColor: { colors: [ "#fff", "#eee" ] }}});
	});
	
    });
</script> 
<!-- //area-chart -->
<!-- revenue-chart -->
    <script class="code" type="text/javascript">
        $(document).ready(function () {
            $.jqplot._noToImageButton = true;
            var prevYear = [["2016-08-20",398], ["2016-08-21",255.25], ["2016-08-22",263.9], ["2016-08-23",154.24], 
            ["2016-08-24",210.18], ["2016-08-25",109.73], ["2016-08-26",166.91], ["2016-08-27",330.27], ["2016-08-28",546.6], 
            ["2016-08-29",260.5], ["2016-08-30",330.34], ["2016-08-31",464.32], ["2016-09-01",511.83], ["2016-09-02",721.15], ["2016-09-03",649.62], 
            ["2016-09-04",653.14], ["2016-09-06",900.31], ["2016-09-07",803.59], ["2016-09-08",851.19], ["2016-09-09",2059.24], 
            ["2016-09-10",994.05], ["2016-09-11",742.95], ["2016-09-12",1340.98], ["2016-09-13",839.78], ["2016-09-14",1769.21], 
            ["2016-09-15",1559.01], ["2016-09-16",2099.49], ["2016-09-17",1510.22], ["2016-09-18",1691.72], 
            ["2016-09-19",1074.45], ["2016-09-20",1529.41], ["2016-09-21",1876.44], ["2016-09-22",1986.02], 
            ["2016-09-23",1461.91], ["2016-09-24",1460.3], ["2016-09-25",1392.96], ["2016-09-26",2164.85], 
            ["2016-09-27",1746.86], ["2016-09-28",2220.28], ["2016-09-29",2617.91], ["2016-09-30",3236.63]];

            var currYear = [["2016-08-20",796.01], ["2016-08-21",510.5], ["2016-08-22",527.8], ["2016-08-23",308.48], 
            ["2016-08-24",420.36], ["2016-08-25",219.47], ["2016-08-26",333.82], ["2016-08-27",660.55], ["2016-08-28",1093.19], 
            ["2016-08-29",521], ["2016-08-30",660.68], ["2016-08-31",928.65], ["2016-09-01",1023.66], ["2016-09-02",1442.31], ["2016-09-03",1299.24], 
            ["2016-09-04",1306.29], ["2016-09-06",1800.62], ["2016-09-07",1607.18], ["2016-09-08",1702.38], 
            ["2016-09-09",4118.48], ["2016-09-10",1988.11], ["2016-09-11",1485.89], ["2016-09-12",2681.97], 
            ["2016-09-13",1679.56], ["2016-09-14",3538.43], ["2016-09-15",3118.01], ["2016-09-16",4198.97], 
            ["2016-09-17",3020.44], ["2016-09-18",3383.45], ["2016-09-19",2148.91], ["2016-09-20",3058.82], 
            ["2016-09-21",3752.88], ["2016-09-22",3972.03], ["2016-09-23",2923.82], ["2016-09-24",2920.59], 
            ["2016-09-25",2785.93], ["2016-09-26",4329.7], ["2016-09-27",3493.72], ["2016-09-28",4440.55], 
            ["2016-09-29",5235.81], ["2016-09-30",6473.25]];

            var plot1 = $.jqplot("chart1", [prevYear, currYear], {
                seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)"],
                title: 'Monthly India Revenue',
                highlighter: {
                    show: true,
                    sizeAdjust: 1,
                    tooltipOffset: 9
                },
                grid: {
                    background: 'rgba(57,57,57,0.0)',
                    drawBorder: false,
                    shadow: false,
                    gridLineColor: '#666666',
                    gridLineWidth: 2
                },
                legend: {
                    show: true,
                    placement: 'inside'
                },
                seriesDefaults: {
                    rendererOptions: {
                        smooth: true,
                        animation: {
                            show: true
                        }
                    },
                    showMarker: false
                },
                series: [
                    {
                        fill: true,
                        label: '2015'
                    },
                    {
                        label: '2016'
                    }
                ],
                axesDefaults: {
                    rendererOptions: {
                        baselineWidth: 1.5,
                        baselineColor: '#444444',
                        drawBaseline: false
                    }
                },
                axes: {
                    xaxis: {
                        renderer: $.jqplot.DateAxisRenderer,
                        tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            formatString: "%b %e",
                            angle: -30,
                            textColor: '#666666'
                        },
                        min: "2016-08-20",
                        max: "2016-09-30",
                        tickInterval: "7 days",
                        drawMajorGridlines: false
                    },
                    yaxis: {
                        renderer: $.jqplot.LogAxisRenderer,
                        pad: 0,
                        rendererOptions: {
                            minorTicks: 1
                        },
                        tickOptions: {
                            formatString: "$%'d",
                            showMark: false
                        }
                    }
                }
            });

              $('.jqplot-highlighter-tooltip').addClass('ui-corner-all')
        });


    </script>
	<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.jqplot.js"></script>
	<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.dateAxisRenderer.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.logAxisRenderer.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.canvasTextRenderer.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.canvasAxisTickRenderer.js"></script>
	<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jqplot.highlighter.js"></script>
<!-- //revenue-chart -->
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->


</body>
</html>