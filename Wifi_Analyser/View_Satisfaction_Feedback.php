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
        <title>View Satisfaction Feedback</title>
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
                    <h2>Customer Satisfaction Comments</h2>  
                    <h4>Comments made by your customers who were satisfied:</h4>
                    <div class="DashboardTableBox">

<?php                 
$satisfiedQuery= "SELECT SatisfiedComment FROM Feedback WHERE Satisfied = 1";

$satisfiedResult = mysqli_query($conn, $satisfiedQuery) or die(mysqli_error($conn));
                       

          
          echo "<table class='sportTable' border='1'>
<tr class='sportTopRow'>
<th>Comment</th>
</tr>";

 
while($row = mysqli_fetch_assoc($satisfiedResult))
{
 $TableClass = ($x%2 == 0)? 'sportFirstRows': 'sportTableSecondRows';
echo "<tr class='$TableClass'>";
echo "<td>" . $row['SatisfiedComment'] . "</td>";
echo "</tr>";
$x++;
}
echo "</table>";
?>
                    </div>
                    
                    <h4>Comments made by your customers who were unsatisfied:</h4>
                    <div class="DashboardTableBox">

<?php                 
$unsatisfiedQuery= "SELECT SatisfiedComment FROM Feedback WHERE Satisfied = 0";

$unsatisfiedResult = mysqli_query($conn, $unsatisfiedQuery) or die(mysqli_error($conn));
                       

          
          echo "<table class='sportTable' border='1'>
<tr class='sportTopRow'>
<th>Comment</th>
</tr>";

 
while($row = mysqli_fetch_assoc($unsatisfiedResult))
{
 $TableClass = ($x%2 == 0)? 'sportFirstRows': 'sportTableSecondRows';
echo "<tr class='$TableClass'>";
echo "<td>" . $row['SatisfiedComment'] . "</td>";
echo "</tr>";
$x++;
}
echo "</table>";
?>
                    </div>
                    </div>
                  
               
          
                    <br></br><button class="back-button" onclick="goBack()"><img width="40" height="40" class="pure-img-responsive" alt="Back" src="Images/App/back.png"></button>

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
