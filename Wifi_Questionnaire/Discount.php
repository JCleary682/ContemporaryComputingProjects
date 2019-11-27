<?php
include ("Secure/connect.php");
session_start();


 $TextboxSocialMedia = $_POST['TxtSocial'];
 $TextboxSports = $_POST['TxtSports'];
 $TextboxNews =  $_POST['TxtNews'];
 $TextboxStream = $_POST['TxtStream'];
 $TextboxOther = $_POST['TxtOther'];

 $TextboxYes = $_POST['TxtYes'];
$TextboxNo =  $_POST['TxtNo'];

 $ChkBoxSocial = $_POST['chkSocialbox'];
$ChkBoxSport = $_POST['chkSportbox'];
$ChkBoxNews = $_POST['chkNewsbox'];
$ChkBoxStream = $_POST['chkStreambox'];
 $ChkBoxOther = $_POST['chkOtherbox'];
 
 $ChkBoxYes = $_POST['chkyes'];
 $ChkBoxNo = $_POST['chkno'];

 $BusinessId = 1;
 $macaddress = 'D4:5C:B0:66:59:1A';
 $sqlDate = date('Y-m-d');
 
 if(!empty($ChkBoxYes)){
     $satisfied = 1;
     
      $sql = "INSERT into Feedback (Business_Id, Satisfied, SatisfiedComment, MAC_Address, DateSubmitted) 
                   values ('$BusinessId','$satisfied','$TextboxYes', '$macaddress', '$sqlDate')";
    
        mysqli_query($conn, $sql);
         $last_id = mysqli_insert_id($conn);
         
                 if(!empty($TextboxSocialMedia)){
                         $newsql = "INSERT into SocialMedia (Feedback_Id, Comment) VALUES ('$last_id','$TextboxSocialMedia')";
    
                           mysqli_query($conn, $newsql);
                     } else if(empty($TextboxSocialMedia)){
                         
                     } else{
                         
                     }
                     
                      if(!empty($TextboxSports)){
                         $newsql1 = "INSERT into Sport (Feedback_Id, Comment) VALUES ('$last_id','$TextboxSports')";
    
                           mysqli_query($conn, $newsql1);
                     }  else if(empty($TextboxSports)){
                         
                     } else{
                         
                     }
                     
                     if(!empty($TextboxNews)){
                         $newsql2 = "INSERT into News (Feedback_Id, Comment) VALUES ('$last_id','$TextboxNews')";
    
                           mysqli_query($conn, $newsql2);
                     }  else if(empty($TextboxNews)){
                         
                     } else{
                         
                     }
                     
                     if(!empty($TextboxStream)){
                         $newsql3 = "INSERT into StreamMedia (Feedback_Id, Comment) VALUES ('$last_id','$TextboxStream')";
    
                           mysqli_query($conn, $newsql3);
                     }  else if(empty($TextboxStream)){
                         
                     } else{
                         
                     }
                     
                      if(!empty($TextboxOther)){
                         $newsql4 = "INSERT into Other (Feedback_Id, Comment) VALUES ('$last_id','$TextboxOther')";
    
                           mysqli_query($conn, $newsql4);
                     }  else if(empty($TextboxOther)){
                         
                     } else{
                         
                     }
     
     
 }else if(!empty($ChkBoxNo)){
    $satisfied = 0;
     
      $sql = "INSERT into Feedback (Business_Id, Satisfied, SatisfiedComment, MAC_Address, DateSubmitted) 
                   values ('$BusinessId','$satisfied','$TextboxNo', '$macaddress', '$sqlDate')";
    
        mysqli_query($conn, $sql);
         $last_id = mysqli_insert_id($conn);
         
          if(!empty($TextboxSocialMedia)){
                         $newsql = "INSERT into SocialMedia (Feedback_Id, Comment) VALUES ('$last_id','$TextboxSocialMedia')";
    
                           mysqli_query($conn, $newsql);
                     } else if(empty($TextboxSocialMedia)){
                         
                     } else{
                         
                     }
                     
                      if(!empty($TextboxSports)){
                         $newsql1 = "INSERT into Sport (Feedback_Id, Comment) VALUES ('$last_id','$TextboxSports')";
    
                           mysqli_query($conn, $newsql1);
                     } else if(empty($TextboxSports)){
                         
                     } else{
                         
                     }
                     
                     if(!empty($TextboxNews)){
                         $newsql2 = "INSERT into News (Feedback_Id, Comment) VALUES ('$last_id','$TextboxNews')";
    
                           mysqli_query($conn, $newsql2);
                     } else if(empty($TextboxNews)){
                         
                     } else{
                         
                     }
                     
                     if(!empty($TextboxStream)){
                         $newsql3 = "INSERT into StreamMedia (Feedback_Id, Comment) VALUES ('$last_id','$TextboxStream')";
    
                           mysqli_query($conn, $newsql3);
                     } else if(empty($TextboxStream)){
                         
                     } else{
                         
                     }
                     
                      if(!empty($TextboxOther)){
                         $newsql4 = "INSERT into Other (Feedback_Id, Comment) VALUES ('$last_id','$TextboxOther')";
    
                           mysqli_query($conn, $newsql4);
                     } else if(empty($TextboxOther)){
                         
                     } else{
                         
                     }
     
 }else{
 
 }
 


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link rel="stylesheet" type="text/css" href="/Wifi_Questionnaire/Style/Wifi_Questionnaire.css">
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <script src="Script/WifiQuestionnaire.js"></script>
    </head>
    <body>
        <div class="DiscountContainer" >
            
            <div class="DiscountInsideContainer" >
                   <form method="post" action="?">
                <div class="QuizTitle">
                    <div class="MainImgDiv"><div class="BusinessImg"></div></div>
                    
                    <div class="MainTextDiv"><h1>Coffee Cafe- Wifi User Questionnaire</h1></div>
                </div>
                <div>
                    
                   
                    <div class="DiscountDiv">
                        <h2>Here's your Discount:</h2>
                         <?php 
                         
                         $disSql = "SELECT Id, Amount, DiscountCode FROM `Discounts` Where Business_Id = 1 AND Used = 0 AND Allocated = 0 ORDER BY RAND()
LIMIT 1;";
    
                        $Discount =   mysqli_query($conn, $disSql);
                        
                      
//                                                  $get_id = $row1['Id'];
                                                  
                        
   
 echo "<div>";
while($row = mysqli_fetch_assoc($Discount))
{

echo "<p>Amount: <b>" . $row['Amount'] . "</b></p>" . "<br>";
echo "<p>Discount Code: <b>" . $row['DiscountCode'] . "</b></p>";
$RowId = $row["Id"];

echo "</tr>";
$x++;
}

 echo "</div>";
 $UpdateSql = "UPDATE Discounts SET Allocated = 1 WHERE Id = $RowId";
    
                   mysqli_query($conn, $UpdateSql);
                         ?>
                    </div>
                  
                </div>
                   </form>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

