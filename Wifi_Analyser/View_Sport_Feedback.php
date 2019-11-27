<?php
include ("Secure/Functions.php");
include ("Secure/connect.php");
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
<<<<<<< Updated upstream
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
=======
        <title>View Sport Feedback</title>
>>>>>>> Stashed changes
                <script>
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
                    <h2>Sport Comments</h2>  
                    <h4>Comments made by your customers who chose "Sport"</h4>
                    <div class="DashboardTableBox">

<?php                 
$sportQuery= "SELECT Comment FROM Sport WHERE Comment !=''";

$sportResult = mysqli_query($conn, $sportQuery) or die(mysqli_error($conn));
                       

          
          echo "<table class='DomainTable' border='1'>
<tr class='DomainTableTopRow'>
<th>Comment</th>
</tr>";

 
while($row = mysqli_fetch_assoc($sportResult))
{
 $TableClass = ($x%2 == 0)? 'DomainTableFirstRows': 'DomainTableSecondRows';
echo "<tr class='$TableClass'>";
echo "<td>" . $row['Comment'] . "</td>";
echo "</tr>";
$x++;
}
echo "</table>";
?>
                    </div>
                    </div>
                  
               
          
<button class="back-button" onclick="goBack()"><img width="40" height="40" class="pure-img-responsive" alt="Back" src="Images/App/back.png"></button>

<script>
function goBack() {
    window.history.back();
}
</script>
    </div>
                 </div>
              </div>
        </div>
        
            
            <?php
        // put your code here
        ?>
       
    </body>
</html>
