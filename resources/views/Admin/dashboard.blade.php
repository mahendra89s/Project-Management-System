@extends('Admin.layouts.master')
@section('title')
  Dashboard
@endsection('title')
@section('css')
      <style>
        
        .card .card-header .card-title{
          font-size:15px;
          font-weight:bold;
          letter-spacing:2px;
          color:white;
        }
        .card-content{
          font-size:25px;
          font-weight:bold;
          color:white;
        }
        #card{
          background-color:white;
          border-radius:8px;
          box-shadow:0px 0px 57px -8px rgba(0,0,0,0.75);
        }
        .card{
          /* background-color:#0e1726; */
          background-color: #485461;
          background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
          border-radius:8px;
          box-shadow:0px 0px 57px -8px rgba(0,0,0,0.75);
        }
        
        .now-ui-icons
        {
          font-size:50px;
          color:white;
        }
      </style>
@endsection('css')
@section('content')
      <div class="panel-header">
        <div class="header text-center">
          <h2 class="title">DashBoard</h2>
        </div>
      </div>
      <div class="content">
        <div class="row">
        
        <div class="col-md-6">
          <div class="row">
          <div class="col-md-6">
            <div class="card ">
              <div class="card-body">
                <div class="card-header">
                  <h4 class="card-title text-center">USERS</h4>
                </div>
                  <div class="card-body">
                  <div class="text-center icon">
                    <i class="now-ui-icons users_single-02"></i>
                    </div>
                    <div class="card-content text-center">
                    {{ $user }}
                    </div>
                    
                  </div>
              </div>
            </div>
          </div>
        
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                  <h4 class="card-title text-center">PROJECTS</h4>
                </div>
                <div class="card-body">
                <div class="text-center icon">
                    <i class="now-ui-icons business_briefcase-24"></i>
                    </div>
                <div class="card-content text-center">
                    {{ $project }}
                    </div>
                    
                  </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <div id="card">
              <div class="card-body">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
            </div>
          </div>
        <!--
          
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                  <h4 class="card-title text-center">COMPLETED PROJECTS</h4>
                </div>
                <div class="card-body">
                <div class="text-center icon">
                    <i class="now-ui-icons files_box"></i>
                    </div>
                <div class="card-content text-center">
                    {{ $completed_project }}
                    </div>
                  </div>
              </div>
            </div>
          </div> 
          
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                  <h4 class="card-title text-center">PENDING PROJECTS</h4>
                </div>
                <div class="card-body">
                <div class="text-center icon">
                    <i class="now-ui-icons files_paper"></i>
                    </div>
                <div class="card-content text-center">
                    {{ $pending_project }}
                    </div>
                  </div>
              </div>
            </div>
          </div>
          -->
          </div>
          </div>
          <div class="col-md-6">
          <div class="card">
              <div class="card-body">
              <div class="card-header">
                  <h4 class="card-title text-center">More Stuff</h4>
                </div>
                <div class="card-body">
                <div class="text-center icon">
                    
                    </div>
                <div class="card-content text-center">
                    
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

      <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Projects",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: {{ $pending_project }}, label: "Pending" },
			{ y: {{ $completed_project }}, label: "Completed" },
			
		]
	}]
});
chart.render();

}
</script>
@endsection('content')