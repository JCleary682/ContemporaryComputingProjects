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


        <title>Dashboard</title>
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
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
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
                            
                            <form method="post" action="View_Notes.php">
                            <input type="submit" name="ButtonNotes" value="View Notes" class="Sidebar_Buttons ViewNotesBtn">
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
                    <div class="DashboardLeftInfoContainer">
                    <div class="DashboardNumRetBox">
                        <div class="DashboardNumRetText"><p>Number of Returning Customers This Week</p></div>
                        <div class="DashboardNumRetCircle"><?php echo GetNumberofReturningCustomers($conn) ?></div>
                    </div>
                     <div class="DashboardNumRetBox">
                        
                        <div class="DashboardNumRetText"><p>Percentage of Satisfied Customers This Week</p></div>
                          

                      <div class="single-chart">
    <svg viewBox="0 0 36 36" class="circular-chart green">
      <path class="circle-bg"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path id="CustomerPercentage" runat="Server" class="circle <?php if(GetPercentageofSatisfiedCustomers($conn) >= 50){ echo 'PercentageAbove50';} else { echo 'PercentageBelow50';} ?>"
        stroke-dasharray="<?php echo GetPercentageofSatisfiedCustomers($conn)?>, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text id="CustomerPercentageText" runat="server" x="18" y="20.35" class="percentage"><?php echo GetPercentageofSatisfiedCustomers($conn) ?>%</text>
    </svg>
  </div>

                      
                    </div>
                             
                        <div class="DashboardTableBox">
                       
                       <?php                 
                       // How to get information from SQL //
                       //1. Call Function with mysqli_fetch_assoc and save as variable 
                       //2. Get individual row save as variable
                       //3. Call variable
                      
//       $row = mysqli_fetch_assoc(GetBusinessInformation($conn));
//         
//            $namedata = $row["Email"];
//        
//            echo $namedata;
//            

                       $domainQuery= "SELECT DomainName, count(DomainName) as 'Times Visited' FROM Domains INNER JOIN Business ON Domains.Business_Id = Business.Id WHERE Business_Id = 1 AND YEARWEEK(DateVisited, 1) = YEARWEEK(CURDATE(), 1) group by DomainName
order by count(DomainName) desc LIMIT 10";

$domainresult = mysqli_query($conn, $domainQuery) or die(mysqli_error($conn));
                       

          
          echo "<table class='DomainTable' border='1'>
<tr class='DomainTableTopRow'>
<th>Domain Name</th>
<th>Times Visited</th>
</tr>";

 




while($row = mysqli_fetch_assoc($domainresult))
{
 $TableClass = ($x%2 == 0)? 'DomainTableFirstRows': 'DomainTableSecondRows';
echo "<tr class='$TableClass'>";
echo "<td>" . $row['DomainName'] . "</td>";
echo "<td>" . $row['Times Visited'] . "</td>";
echo "</tr>";
$x++;
}
echo "</table>";
?>
                    </div>
                        
                    </div>
                    
                    <div class="DashboardRightInfoContainer">
                         <div class="DashboardNumRetBoxPieChart">
                        
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                    </div>
                    
                    <div></div>
                </div>
            </div>
        </div>
        
            
  
    </body>
</html>
