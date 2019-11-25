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
                    <div class="AccountBox1">
                        <h1 class="AccountMainText">Account Settings</h1>
                        <form method="post">
                            <div class="AccountTextContainerDiv"><p class="AccountText">Business Name:</p> <input class="AccountTextBox" type="text" name="BusinessName"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Business Type:</p> <input class="AccountTextBox" type="text" name="BusinesType"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Address:</p> <input class="AccountTextBox" type="text" name="BusinessAddress"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Town:</p> <input class="AccountTextBoxSmall" type="text" name="BusinessTown"/></div>
                            <div class="AccountTextContainerDiv"><p class="AccountText">Post Code</p> <input class="AccountTextBoxSmall" type="text" name="BusinessPostCode"/></div>
                            <div class="AccountTextContainerDiv"> <p class="AccountText">Logo Image:</p> <input class="AccountTextBox" type="text" name="BusinessLogoImg"/></div>
                            <div><input class="AccountSubmitBtn" type="submit"  name="BusinessSubmit" value="Submit"/></div>
</form>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
        
            
            <?php
        // put your code here
        ?>
       
    </body>
</html>
