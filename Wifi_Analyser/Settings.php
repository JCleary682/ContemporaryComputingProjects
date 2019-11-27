<!DOCTYPE html>
<?php
include ("Secure/connect.php");
session_start();
//
//
$TextboxAmount = $_POST['DiscountsAmount'];
 $TextboxCode = $_POST['DiscountsCode'];
 
 if(!empty($TextboxAmount) && !empty($TextboxCode)){
     $sql = "INSERT INTO Discounts(Business_Id, Amount, DiscountCode, Used, Allocated, DateUsed)"
        . " VALUES ('1','$TextboxAmount', '$TextboxCode', '0', '0', '0000-00-00')";   
       mysqli_query($conn, $sql);
 }else{
 }
     
 



?>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="/Wifi_Analyser/Style/Wifi_Analyser.css">
          <link rel="stylesheet" type="text/css" href="/Wifi_Analyser/Style/newCss.css">
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <title>Settings</title>
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
                     <form method="post" action="?">
                    <div>
                        <div class="DiscountDiv">    
                        <h2>Enter Discount Details</h2>
                        <div class="SpaceTop">
                        <p>Enter Amount:</p>
                        <input type="text" class="TextBoxSettings" name="DiscountsAmount">
                        <p>Enter Discount Code:</p>
                        <input type="text" class="TextBoxSettings" name="DiscountsCode">
                           <input type="submit" id="SubmitBtn" class="SubmitBtn">
                            </div>
                        </div>
                        <div class="SettingsTableDiv">
                            <h2>Discount Codes Currently Available:</h2>
                            <?php
                            $SelectSQL = "SELECT Amount, DiscountCode FROM `Discounts` "
            . "    LEFT JOIN Business ON Discounts.Id = Business.Id WHERE Business_Id = 1 AND Used = 0 ORDER BY Amount ASC";

$DiscountAvailable = mysqli_query($conn, $SelectSQL);
                              echo "<table class='SettingsTable' border='1'>
<tr class='DomainTableTopRow'>
<th>Amount</th>
<th>Discount Codes</th>
</tr>";

 




while($row = mysqli_fetch_assoc($DiscountAvailable))
{
 $TableClass = ($x%2 == 0)? 'DomainTableFirstRows': 'DomainTableSecondRows';
echo "<tr class='$TableClass'>";
echo "<td>" . $row['Amount'] . "</td>";
echo "<td>" . $row['DiscountCode'] . "</td>";
echo "</tr>";
$x++;
}
echo "</table>";
                            ?>                         
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
            
            <?php
        // put your code here
        ?>
       
    </body>
</html>
