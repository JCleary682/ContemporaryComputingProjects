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
$DropDownQuery = "SELECT * FROM `Domains`";
$DateVisitedQuery = "SELECT * FROM `Domains`";
$BusinessQuery = "SELECT * FROM `Domains`";

$URLResult = mysqli_query($conn, $URLQuery) or die(mysqli_error($conn));
$DropDownQueryResult = mysqli_query($conn, $DropDownQuery) or die(mysqli_error($conn));
$DateVisitedQueryResult = mysqli_query($conn, $DateVisitedQuery) or die(mysqli_error($conn));
$BusinessQueryResult = mysqli_query($conn, $BusinessQuery) or die(mysqli_error($conn));


//Filtering
if(isset($_POST['filter'])){
    $valuetosearch = $_POST['domain'].''.$_POST['date'].''.$_POST['business'];
    //Check if posting is working
    echo "$valuetosearch";
    $query = "SELECT miiLearning_Users.id, miiLearning_Users.name ,miiLearning_Users.profile_pic , miiLearning_subjects.subject, miiLearning_level.level, miiLearning_Users.address
            FROM `miiLearning_Users`
            INNER JOIN miiLearning_Tutors
            ON miiLearning_Tutors.Tutor_id = miiLearning_Users.id
            INNER JOIN miiLearning_subjects
            ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
            INNER JOIN miiLearning_level
            ON miiLearning_level.level_id = miiLearning_Tutors.subject_level
            WHERE CONCAT(miiLearning_level.level, miiLearning_subjects.subject, miiLearning_Users.address) LIKE '%$valuetosearch%' AND miiLearning_Users.type_id=1";
    $searchresult = filterurl($query);
    
}else{
    $query="SELECT miiLearning_Users.id, miiLearning_Users.name ,miiLearning_Users.profile_pic , miiLearning_subjects.subject, miiLearning_level.level, miiLearning_Users.address
            FROM `miiLearning_Tutors`
            INNER JOIN miiLearning_Users
            ON miiLearning_Users.id = miiLearning_Tutors.Tutor_id
            INNER JOIN miiLearning_subjects
            ON miiLearning_Tutors.subjects = miiLearning_subjects.subject_id
            INNER JOIN miiLearning_level
            ON miiLearning_level.level_id = miiLearning_Tutors.subject_level
            WHERE miiLearning_Users.type_id=1
            GROUP BY miiLearning_Users.id";
    $searchresult = filterurl($query);
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
                <div class="MainInsideTop">
                </div>
                <div class="MainInsideRest">
                    <h3>Filter By:</h3>
                    <form action="" method="post" name="filter" action='View_URLS.php'>
                        <div class="domainfilter">
                            <select>
                              <option value="" name='domain' selected>Domain</option>
                              <?php
                              if(mysqli_num_rows($DropDownQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($DropDownQueryResult)){
                                            $get_id = $row['Id'];
                                            $get_businessid = $row['Business_Id'];
                                            $get_domainname = $row['DomainName'];
                                            $get_DateVisited = $row['DateVisited'];

                                            //Drop down list for sorting

                                            echo" <option value='$get_domainname' name='domain'>$get_domainname</option>";
                                        }

                                    }
                                ?>
                            </select>

                            <select>
                              <option value="" name='date' selected>Date Visited</option>
                              <?php
                              if(mysqli_num_rows($DateVisitedQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($DateVisitedQueryResult)){
                                            $get_id = $row['Id'];
                                            $get_businessid = $row['Business_Id'];
                                            $get_domainname = $row['DomainName'];
                                            $get_DateVisited = $row['DateVisited'];

                                            //Drop down list for sorting

                                            echo" <option value='$get_DateVisited' name='date'>$get_DateVisited</option>";
                                        }

                                    }
                                ?>
                            </select>

                            <select>
                              <option value="" name='business' selected>Business</option>
                              <?php
                              if(mysqli_num_rows($BusinessQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($BusinessQueryResult)){
                                            $get_id = $row['Id'];
                                            $get_businessid = $row['Business_Id'];
                                            $get_domainname = $row['DomainName'];
                                            $get_DateVisited = $row['DateVisited'];

                                            //Drop down list for sorting

                                            echo" <option value='$get_businessid' name='business'>$get_businessid</option>";
                                        }

                                    }
                                ?>
                            </select>
                            <button class="" class="submit" type="submit" name="filter" id="filterform">Submit</button>
                        </div>
                    </form>
                    

                    <div class = "UrlContainer">
                        <table class="DomainTable">
                            <thead class="DomainTableTopRow">
                                          <tr>
                                            <th scope="col">ID</th>
                                            <th scope='col'>Business ID</th>
                                            <th scope="col">Domain Name</th>
                                            <th scope="col">Date Visited</th>
                                            <th scope="col"></th>
                                          </tr>
                            </thead>
                            <tbody class="">
                                <?php
                                    if(mysqli_num_rows($URLResult)>0){

                                        while($row = mysqli_fetch_assoc($URLResult)){
                                                  $get_id = $row['Id'];
                                                  $get_businessid = $row['Business_Id'];
                                                  $get_domainname = $row['DomainName'];
                                                  $get_DateVisited = $row['DateVisited'];
                                                  echo "<tr class = 'UrlTableRows'>
                                                            <td>$get_id</td>
                                                            <td>$get_businessid</td>
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
