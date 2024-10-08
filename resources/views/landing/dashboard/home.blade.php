@include('layout.landing.header')
@include('layout.landing.sidebar')

<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
<div id="kt_app_toolbar" class="app-toolbar py-6">
	<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
		<div class="d-flex flex-column flex-row-fluid">
			<div class="d-flex align-items-center pt-1">
				<ul class="breadcrumb breadcrumb-separatorless fw-semibold">
					<li class="breadcrumb-item text-white fw-bold lh-1">
						<a href="{{url('landing')}}" class="text-white text-hover-primary">
						<i class="ki-outline ki-home text-gray-700 fs-6"></i>
						</a>
					</li>
					<li class="breadcrumb-item">
						<i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
					</li>
					<li class="breadcrumb-item text-white fw-bold lh-1">Dashboards</li>
				</ul>
			</div>
			<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
				<div class="page-title me-5">
					<h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">Selamat datang, {{ auth()->user()->name }} 
						<span class="page-desc text-gray-600 fw-semibold fs-6 pt-3">Kamu dapat mengelola lebih jauh disini</span>
					</h1>
				</div>
				<div class="d-flex align-self-center flex-center flex-shrink-0">
					<a href="#" class="btn btn-flex btn-sm btn-outline btn-active-color-primary btn-custom px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Contact</a>
					<a href="#" class="btn btn-sm btn-active-color-primary btn-outline btn-custom ms-3 px-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">FAQ</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="app-container container-xxl">
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <div class="row mb-5 mb-xl-8 g-5 g-xl-8">
                    <div class="col-6">
                        <a class="card flex-column justfiy-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10" href="#">
                        <i class="ki-outline ki-rocket fs-2tx mb-5 ms-n1 text-gray-500"></i>
                        <span class="fs-4 fw-bold">Request Visitor Access</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="card flex-column justfiy-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10" href="#">
                        <i class="ki-outline ki-technology-2 fs-2tx mb-5 ms-n1 text-gray-500"></i>
                        <span class="fs-4 fw-bold">Request New Worker Access</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="card flex-column justfiy-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10" href="#">
                        <i class="ki-outline ki-fingerprint-scanning fs-2tx mb-5 ms-n1 text-gray-500"></i>
                        <span class="fs-4 fw-bold">Request Extend Periode Worker Access</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="card flex-column justfiy-content-start align-items-start text-start w-100 text-gray-800 text-hover-primary p-10" href="#">
                        <i class="ki-outline ki-abstract-26 fs-2tx mb-5 ms-n1 text-gray-500"></i>
                        <span class="fs-4 fw-bold">History Verification</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 ps-xl-12">
                <div class="card card-xl-stretch mb-xl-4">
                    <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                        <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 ">
                            <div class="me-2">
                                <span class="fw-bold text-gray-800 d-block mt-5 fs-3">Persentase Approval</span>
                                <span class="text-gray-500 fw-bold">New Worker Access</span>
                            </div>
                            {{-- 
                            <div class="fw-bold fs-3 text-info">100</div>
                            --}}
                        </div>
                        <div class="card card-bordered">
                            <div class="card-body">
                                <div id="chartPie" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 ps-xl-12">
                <div class="card card-xl-stretch mb-xl-4">
                    <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
                        <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 ">
                            <div class="me-2">
                                <span class="fw-bold text-gray-800 d-block mt-5 fs-3">Statistic Request Access</span>
                                <span class="text-gray-500 fw-bold">Tahun 2024</span>
                            </div>
                            {{-- 
                            <div class="fw-bold fs-3 text-info">100</div>
                            --}}
                        </div>
                        <div class="card card-bordered">
                            <div class="card-body">
                                <div id="chartdiv" style="height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    am5.ready(function() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    paddingLeft: 0,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
    }));
    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(
    am5.Legend.new(root, {
    	centerX: am5.p50,
    	x: am5.p50
    })
    );
    var data = [{
    	"month": "Jan",
    	"Visitor Access": 100,
    	"New Worker Access": 150,
    	"Extend Period": 300,
    	
    	}, {
    	"month": "Feb",
    	"Visitor Access": 130,
    	"New Worker Access": 270,
    	"Extend Period": 220,
    	}, {
    	"month": "Mar",
    	"Visitor Access": 280,
    	"New Worker Access": 290,
    	"Extend Period": 240,
    	
    	}]
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, {
    cellStartLocation: 0.1,
    cellEndLocation: 0.9,
    minorGridEnabled: true
    })
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "month",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
    }));
    xRenderer.grid.template.setAll({
    location: 1
    })
    xAxis.data.setAll(data);
    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {
    	strokeOpacity: 0.1
    })
    }));
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    	name: name,
    	xAxis: xAxis,
    	yAxis: yAxis,
    	valueYField: fieldName,
    	categoryXField: "month"
    }));
    series.columns.template.setAll({
    	tooltipText: "{name}, {categoryX}:{valueY}",
    	width: am5.percent(50),
    	tooltipY: 0,
    	strokeOpacity: 0
    });
    series.data.setAll(data);
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();
    series.bullets.push(function () {
    	return am5.Bullet.new(root, {
    	locationY: 0,
    	sprite: am5.Label.new(root, {
    		text: "{valueY}",
    		fill: root.interfaceColors.get("alternativeText"),
    		centerY: 0,
    		centerX: am5.p50,
    		populateText: true
    	})
    	});
    });
    legend.data.push(series);
    }
    makeSeries("Visitor Access", "Visitor Access");
    makeSeries("New Worker Access", "New Worker Access");
    makeSeries("Extend Period", "Extend Period");
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
    }); // end am5.ready()
</script>	
<script>
    am5.ready(function() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartPie");
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
      radius: am5.percent(90),
      innerRadius: am5.percent(40),
      layout: root.horizontalLayout
    }));
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
      name: "Series",
      valueField: "tot_status",
      categoryField: "aproval"
    }));
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
      aproval: "Register",
      tot_status: 501.9
    }, {
      aproval: "Awaiting Aproval",
      tot_status: 301.9
    }, {
      aproval: "Aproved",
      tot_status: 201.1
    }
    ]);
    // Disabling labels and ticks
    series.labels.template.set("visible", false);
    series.ticks.template.set("visible", false);
    // Adding gradients
    series.slices.template.set("strokeOpacity", 0);
    series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
      stops: [{
    	brighten: -0.8
      }, {
    	brighten: -0.8
      }, {
    	brighten: -0.5
      }, {
    	brighten: 0
      }, {
    	brighten: -0.5
      }]
    }));
    // Create legend
    // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
    var legend = chart.children.push(am5.Legend.new(root, {
      centerY: am5.percent(50),
      y: am5.percent(50),
      layout: root.verticalLayout
    }));
    // set value labels align to right
    legend.valueLabels.template.setAll({ textAlign: "right" })
    // set width and max width of labels
    legend.labels.template.setAll({ 
      maxWidth: 140,
      width: 140,
      oversizedBehavior: "wrap"
    });
    legend.data.setAll(series.dataItems);
    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
    }); // end am5.ready()
</script>
@include('layout.landing.footer')
