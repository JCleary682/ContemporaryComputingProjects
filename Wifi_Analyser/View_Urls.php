<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include ("Secure/Functions.php");
include ("Secure/connect.php");
$URLQuery = "SELECT * FROM `Domains`";
$DropDownQuery = "SELECT * FROM `Domains` GROUP BY `DomainName`";
$DateVisitedQuery = "SELECT * FROM `Domains` GROUP BY `DateVisited`";
$BusinessQuery = "SELECT * FROM `Domains` GROUP BY `Business_Id`";

$URLResult = mysqli_query($conn, $URLQuery) or die(mysqli_error($conn));
$DropDownQueryResult = mysqli_query($conn, $DropDownQuery) or die(mysqli_error($conn));
$DateVisitedQueryResult = mysqli_query($conn, $DateVisitedQuery) or die(mysqli_error($conn));
$BusinessQueryResult = mysqli_query($conn, $BusinessQuery) or die(mysqli_error($conn));

//Filtering
if(isset($_POST['filterdomain'])){
    $valuetosearch = $_POST['domain'];
    //Check if posting is working
    //echo "$valuetosearch";
    $query = "SELECT `id`, `DomainName`, `DateVisited`
            FROM `Domains`
            WHERE `DomainName` LIKE '%$valuetosearch%'";
    $searchresult = filterurl($query);
    
}else if (isset($_POST['filterdate'])){
    $valuetosearch = $_POST['date'];
    //Check if posting is working
    //echo "$valuetosearch";
    
    $query = "SELECT `id`, `DomainName`, `DateVisited`
            FROM `Domains`
            WHERE `DateVisited` = '$valuetosearch'";
            
    $searchresult = filterurl($query);
    
} else {
    $query="SELECT * FROM `Domains`";
    $searchresult = filterurl($query);
    //echo $searchresult;
}

//Filter function
function filterurl($query)
{
    include("Secure/connect.php");
    $filterresult = mysqli_query($conn, $query);
    return $filterresult;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="/Wifi_Analyser/Style/Wifi_Analyser.css">
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <title>View URLS</title>
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
                <div class="MainInsideTop">
                </div>
                <div class="MainInsideRest">
                    <h3>Filter By:</h3>
                    <!-- Filter By Domain -->
                    <form method="post" name="filterdomain" action='View_Urls.php'>
                        <div class="domainfilter">
                            <!-- Filter By Domain -->
                            <select name = 'domain'>
                              <option selected>Domain</option>
                              <?php
                              if(mysqli_num_rows($DropDownQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($DropDownQueryResult)){
                                            $get_id = $row['Id'];
                                            $get_businessid = $row['Business_Id'];
                                            $get_domainname = $row['DomainName'];
                                            $get_DateVisited = $row['DateVisited'];

                                            //Drop down list for sorting

                                            echo" <option value='$get_domainname' name=''>$get_domainname</option>";
                                        }

                                    }
                                ?>
                            </select>

                            <button class="submit" type="submit" name="filterdomain" id="filterform">
                                Submit
                            </button>
                        </div>
                    </form>
                    <!-- Filter By Date -->
                    <form method="post" name="filterdate" action='View_Urls.php'>
                        <div class="domainfilter">
                            <!-- Filter by Date -->
                            <select name = 'date'>
                              <option selected>Date</option>
                              <?php
                              if(mysqli_num_rows($DateVisitedQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($DateVisitedQueryResult)){
                                            $get_id = $row['Id'];
                                            $get_businessid = $row['Business_Id'];
                                            $get_domainname = $row['DomainName'];
                                            $get_DateVisited = $row['DateVisited'];

                                            //Drop down list for sorting

                                            echo" <option value='$get_DateVisited' name=''>$get_DateVisited</option>";
                                        }

                                    }
                                ?>
                            </select>

                            <button class="submit" type="submit" name="filterdate" id="filterform">
                                Submit
                            </button>
                        </div>
                    </form>
                    

                    <div class = "UrlContainer">
                        <table class="DomainTable">
                            <thead class="DomainTableTopRow">
                                          <tr>
                                            <th scope="col">Domain Name</th>
                                            <th scope="col">Date Visited</th>
                                            <th scope="col"></th>
                                          </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                    if(mysqli_num_rows($searchresult)>0){

                                        while($row = mysqli_fetch_assoc($searchresult)){
                                                  $get_id = $row['Id'];
                                                  $get_businessid = $row['Business_Id'];
                                                  $get_domainname = $row['DomainName'];
                                                  $get_DateVisited = $row['DateVisited'];
                                                  echo "<tr class = 'UrlTableRows'>
                                                            <td>$get_domainname</td>
                                                            <td>$get_DateVisited</td>
                                                        </tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                       
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
