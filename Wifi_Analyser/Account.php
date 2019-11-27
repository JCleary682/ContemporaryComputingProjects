<!DOCTYPE html>

<?PHP

include ("Secure/connect.php");



?>

<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="/Wifi_Analyser/Style/Wifi_Analyser.css">
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <?php
                                 
        
        
          $TextboxName = $_POST['BusinessName'];
 $TextboxType = $_POST['BusinesType'];
  $TextboxEmail = $_POST['BusinesEmail'];
 $TextboxAddress =  $_POST['BusinessAddress'];
 $TextboxTown = $_POST['BusinessTown'];
 $TextboxPostcode = $_POST['BusinessPostCode'];
  $TextboxImgUrl = $_POST['BusinessLogoImg'];
  
  if(isset($_POST['BusinessSubmit'])){
 $UpdateSql = "UPDATE Business SET Name = '$TextboxName', Type = '$TextboxType', Email= '$TextboxEmail', Address='$TextboxAddress', Town= '$TextboxTown', Postcode='$TextboxPostcode', Img='$TextboxImgUrl' WHERE Id = 1;";
    
                   mysqli_query($conn, $UpdateSql);
  }
  
  $AccountQuery= "SELECT * FROM Business WHERE Id = 1";

$Accresult = mysqli_query($conn, $AccountQuery) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($Accresult);
                        ?>

        <title>Account</title>
    </head>
    <body>
        <div class="OverallContainer">
            <div class="SidebarContainer">
                <div class="SidebarInsideTop"></div>
                <div class="SidebarInsideRest">
                    <div class="SidebarImgContainer">
                        <form name="AccountDetails" action="Account.php">
                       <div onclick="AccountDetails.submit();" class="SidebarImg"  style="background-image: url(<?php echo $row['Img']; ?>)">                            
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
                    <div class="AccountBox1">
                        <h1 class="AccountMainText">Account Settings</h1>
                      
                        <form method="post" action="?">
                            <div class="AccountTextContainerDiv"><p class="AccountText">Business Name:</p> <input class="AccountTextBox" type="text" name="BusinessName" value="<?php echo $row['Name']; ?>"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Business Type:</p> <input class="AccountTextBox" type="text" name="BusinesType" value="<?php echo $row['Type']; ?>"/></div>
                          <div class="AccountTextContainerDiv"><p class="AccountText">Email:</p> <input class="AccountTextBox" type="text" name="BusinesEmail" value="<?php echo $row['Email']; ?>"/></div>                        
                            <div class="AccountTextContainerDiv"><p class="AccountText">Address:</p> <input class="AccountTextBox" type="text" name="BusinessAddress" value="<?php echo $row['Address']; ?>"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Town:</p> <input class="AccountTextBoxSmall" type="text" name="BusinessTown" value="<?php echo $row['Town']; ?>"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Post Code</p> <input class="AccountTextBoxSmall" type="text" name="BusinessPostCode" value="<?php echo $row['Postcode']; ?>"/></div>
                            <div class="AccountTextContainerDiv"> <p class="AccountText">Logo Image:</p> <input class="AccountTextBox" type="text" name="BusinessLogoImg" value="<?php echo $row['Img']; ?>"/></div>
                            <div><input class="AccountSubmitBtn" type="submit"  name="BusinessSubmit" value="Submit"/></div>
</form>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
        
            
            <?php
     
        ?>
       
    </body>
</html>
