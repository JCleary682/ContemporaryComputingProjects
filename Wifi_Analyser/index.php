<?php
include ("Secure/Functions.php");
include ("Secure/connect.php");
//$queryMain= "SELECT * FROM Wifi_Users WHERE Id= '1'";
//
//$result = mysqli_query($conn, $queryMain) or die(mysqli_error($conn));

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
                    <div>
                       
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
                       

          
          echo "<table border='1'>
<tr>
<th>Domain Name</th>
<th>Times Visited</th>
</tr>";

while($row = mysqli_fetch_assoc($domainresult))
{
echo "<tr>";
echo "<td>" . $row['DomainName'] . "</td>";
echo "<td>" . $row['Times Visited'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
        
            
  
    </body>
</html>
