<?php
include ("Secure/Functions.php");
include ("Secure/connect.php");
?>
<?php
   
$TopicPercetages = GetPercentageFromResults($conn);


$dataPoints = array( 
	array("label"=>"News", "y"=>$TopicPercetages[0]),
	array("label"=>"Other", "y"=>$TopicPercetages[1]),
	array("label"=>"Social Media", "y"=>$TopicPercetages[2]),
	array("label"=>"Sport", "y"=>$TopicPercetages[3]),
	array("label"=>"Stream Media", "y"=>$TopicPercetages[4])
	
)
 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="/Wifi_Analyser/Style/Wifi_Analyser.css">
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <title>View Trends</title>
                <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Percentage of Popular Topics"
	},
	subtitles: [{
		text: "November 2019"
	}],
	data: [{
		type: "pie",
                explodeOnClick: false,
                click: onClick,
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

function onClick(e) {

var chartLabelid = e.dataPoint.label;

if (chartLabelid == "News") {
  window.location.href = "View_News_Feedback.php";
} else if (chartLabelid == "Other") {
  window.location.href = "View_Other_Feedback.php";
} else if (chartLabelid == "Social Media") {
   window.location.href = "View_Media_Feedback.php";
} else if (chartLabelid == "Sport") {
   window.location.href = "View_Sport_Feedback.php";
} else if (chartLabelid == "Stream Media") {
   window.location.href = "View_Streaming_Feedback.php";
}


 
}

}
</script>
    </head>
    <body>
        <div class="OverallContainer">
            <div class="SidebarContainer">
                <div class="SidebarInsideTop"></div>
                <div class="SidebarInsideRest">
                    <div class="SidebarImgContainer">
                        <form name="AccountDetails" action="Account.php">
                       <div onclick="AccountDetails.submit();" class="SidebarImg">                            
                        </div>
                        </form>
                     
                      
                    </div>
                    <div class="SidebarNameContainer">
                        <label id="Lbl_BusinessName">Coffee Cafe</label>
                    </div>
                    <div>
                        <div>
                            <form method="post" action="index.php">
                            <input type="submit" name="ButtonDashboard" value="Dashboard" class="Sidebar_Buttons DashboardBtn">
                            </form>
                            
                            <form method="post" action="View_Urls.php">
                            <input type="submit" name="ButtonUrl" value="View Urls" class="Sidebar_Buttons ViewUrlsBtn">
                            </form>  
                            
                            <form method="post" action="View_Trends.php">
                            <input type="submit" name="ButtonTrends" value="View Trends" class="Sidebar_Buttons ViewTrendsBtn">
                            </form>
                            
                            <form method="post" action="Upload_CSV.php">
                            <input type="submit" name="ButtonNotes" value="Upload CSV" class="Sidebar_Buttons ViewNotesBtn">
                            </form>
                           
                            <form method="post" action="Settings.php">
                            <input type="submit" name="ButtonSettings" value="View Settings" class="Sidebar_Buttons SettingsBtn">
                            </form>
                            
                            <form method="post" action="Logout.php">
                            <input type="submit" name="ButtonNotes" value="Log Out" class="Sidebar_Buttons LogoutBtn">
                            </form>
                            
                            </div>
                    </div>
                </div>
            </div>
            <div class="MainContainer">
                <div class="MainInsideTop"></div>
                <div class="MainInsideRest">
                    <div>
                        <div>
                       
                        <div class="DashboardRightInfoContainer">
                         
                         <div class="DashboardNumRetBoxPieChartTrends">
                                 <h2> Your trends this month </h2>
                                 <h3 class="TrendsText"> Results taken from your customer questionnaire - click a segment to view what people had to say! </h3>
                       
                        
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                    </div> 
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </body>
</html>
