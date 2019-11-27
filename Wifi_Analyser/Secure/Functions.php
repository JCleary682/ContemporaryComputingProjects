<?php
include("connect.php");

function GetBusinessInformation($conn) {

$businessQuery= "SELECT * FROM Business WHERE Id= '1'";

$Businessresult = mysqli_query($conn, $businessQuery) or die(mysqli_error($conn));

return $Businessresult;
}

function GetDomainInformation($conn) {
    
$domainQuery= "SELECT DomainName, count(DomainName) as 'Times Visited' FROM Domains INNER JOIN Business ON Domains.Business_Id = Business.Id WHERE Business_Id = 1 AND YEARWEEK(DateVisited, 1) = YEARWEEK(CURDATE(), 1) group by DomainName
order by count(DomainName) desc LIMIT 10";

$domainresult = mysqli_query($conn, $domainQuery) or die(mysqli_error($conn));

return $domainresult;
    
}


function GetNumberofReturningCustomers($conn){
    
  $NumReturningQuery= "SELECT COUNT(*) as `Customers Returned` FROM (SELECT MAC_Address, COUNT(*) occurances FROM MacAddress 
          WHERE DateConnected >= CURRENT_DATE - 7 GROUP BY MAC_Address HAVING COUNT(*) > 1) AS B";
  
$Returningresult = mysqli_query($conn, $NumReturningQuery) or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($Returningresult);

 $NumCustReturned = $row["Customers Returned"];

 return $NumCustReturned;
 
}

function GetNumberofCustomers($conn){
    
  $NumCustomersQuery= "SELECT COUNT(DISTINCT MAC_Address) as `Number of Customers` from MacAddress WHERE DateConnected >= CURRENT_DATE - 7";
  
$NumCustomersresult = mysqli_query($conn, $NumCustomersQuery) or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($NumCustomersresult);

 $NumCustomers = $row["Number of Customers"];

 return $NumCustomers;
 
}

function GetPercentageofSatisfiedCustomers($conn){
    
  $Query= "select ROUND(avg(Satisfied = 0) * 100) as Percentage
from Feedback";
  
$result = mysqli_query($conn, $Query) or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($result);

 $Returned = $row["Percentage"];

 return $Returned;
 
}


//function GetarryPie($conn){
//   
////    $user = "swallace574";
////$password = "jjwfc4mdz1v2y18v";
////$webserver = "lamp.eeecs.qub.ac.uk";
////$db = "team12";
////
////$conn = mysqli_connect($webserver, $user, $password, $db);
//
//  $Query= "SELECT COUNT(News.Feedback_Id) as 'News', COUNT(Other.Feedback_Id) as 'Other',
//COUNT(SocialMedia.Feedback_Id) as 'Social Media', COUNT(Sport.Feedback_Id) as 'Sport',
//COUNT(StreamMedia.Feedback_Id) as 'Stream Media'
//FROM Feedback 
//LEFT JOIN News ON Feedback.Id = News.Feedback_Id 
//LEFT JOIN Other ON Feedback.Id = Other.Feedback_Id 
//LEFT JOIN SocialMedia ON Feedback.Id = SocialMedia.Feedback_Id
//LEFT JOIN Sport ON Feedback.Id = Sport.Feedback_Id 
//LEFT JOIN StreamMedia ON Feedback.Id = StreamMedia.Feedback_Id";
//  
//$result = mysqli_query($conn, $Query) or die(mysqli_error($conn));
//
//$new_array = array();
//
//$row = mysql_fetch_assoc($result);
//   $new_array['a'] = $row['News'];
//   $new_array['b'] = $row['Other'];
//   $new_array['c'] = $row['Social Media'];
//   $new_array['d'] = $row['Sport'];
//   $new_array['e'] = $row['Stream Media'];
//
//
// return $new_array[];
// 
//}


//
//function newpie($conn){
//  $Query= "SELECT COUNT(News.Feedback_Id) as 'News', COUNT(Other.Feedback_Id) as 'Other',
//COUNT(SocialMedia.Feedback_Id) as 'Social Media', COUNT(Sport.Feedback_Id) as 'Sport',
//COUNT(StreamMedia.Feedback_Id) as 'Stream Media'
//FROM Feedback 
//LEFT JOIN News ON Feedback.Id = News.Feedback_Id 
//LEFT JOIN Other ON Feedback.Id = Other.Feedback_Id 
//LEFT JOIN SocialMedia ON Feedback.Id = SocialMedia.Feedback_Id
//LEFT JOIN Sport ON Feedback.Id = Sport.Feedback_Id 
//LEFT JOIN StreamMedia ON Feedback.Id = StreamMedia.Feedback_Id";
//  
//$result = mysqli_query($conn, $Query) or die(mysqli_error($conn));
//   while ($row = mysql_fetch_array($result))
//   {
//      $res_return[] = $row;
//   }
//   return $res_return;
//}
//
//
//function getXYZ($conn)
//{
//      $Query= "SELECT COUNT(News.Feedback_Id) as 'News', COUNT(Other.Feedback_Id) as 'Other',
//COUNT(SocialMedia.Feedback_Id) as 'Social Media', COUNT(Sport.Feedback_Id) as 'Sport',
//COUNT(StreamMedia.Feedback_Id) as 'Stream Media'
//FROM Feedback 
//LEFT JOIN News ON Feedback.Id = News.Feedback_Id 
//LEFT JOIN Other ON Feedback.Id = Other.Feedback_Id 
//LEFT JOIN SocialMedia ON Feedback.Id = SocialMedia.Feedback_Id
//LEFT JOIN Sport ON Feedback.Id = Sport.Feedback_Id 
//LEFT JOIN StreamMedia ON Feedback.Id = StreamMedia.Feedback_Id";
//  
//$result = mysqli_query($conn, $Query) or die(mysqli_error($conn));
//   $row = mysql_fetch_array($result);
//    
//   $ret = Array();
//   
//    $ret[0] = $row['News'];
//    $ret[1] = $row['Other'];
//    $ret[2] = $row['Social Media'];
//    $ret[3] = $row['Sport'];
//    $ret[4] = $row['Stream Media'];
//
//    return $ret;
//}
//
//
//function getSomeArray(){
//    
//    $user = "swallace574";
//$password = "jjwfc4mdz1v2y18v";
//$webserver = "lamp.eeecs.qub.ac.uk";
//$db = "team12";
//
//$conn = mysqli_connect($webserver, $user, $password, $db);
//
//    
//    $Query= "SELECT COUNT(News.Feedback_Id) as 'News', COUNT(Other.Feedback_Id) as 'Other',
//COUNT(SocialMedia.Feedback_Id) as 'Social Media', COUNT(Sport.Feedback_Id) as 'Sport',
//COUNT(StreamMedia.Feedback_Id) as 'Stream Media'
//FROM Feedback 
//LEFT JOIN News ON Feedback.Id = News.Feedback_Id 
//LEFT JOIN Other ON Feedback.Id = Other.Feedback_Id 
//LEFT JOIN SocialMedia ON Feedback.Id = SocialMedia.Feedback_Id
//LEFT JOIN Sport ON Feedback.Id = Sport.Feedback_Id 
//LEFT JOIN StreamMedia ON Feedback.Id = StreamMedia.Feedback_Id";
//  
//$result = mysqli_query($conn, $Query) or die(mysqli_error($conn));
//   $row = mysql_fetch_assoc($result);
//    
//    
//    $ret = Array();
//    $ret[0] = $row['News'];
//    $ret[1] = $row['Sport'];
//    return $ret;
//}



function GetTopicResults($conn){
    $PieQuery= "SELECT (COUNT(News.Feedback_Id) + COUNT(Other.Feedback_Id) + COUNT(SocialMedia.Feedback_Id)+ COUNT(Sport.Feedback_Id) + COUNT(StreamMedia.Feedback_Id)) as 'Total Count',

 COUNT(News.Feedback_Id) as 'News' , COUNT(Other.Feedback_Id) as 'Other',
COUNT(SocialMedia.Feedback_Id) as 'Social Media', COUNT(Sport.Feedback_Id) as 'Sport',
COUNT(StreamMedia.Feedback_Id) as 'Stream Media'
FROM Feedback 
LEFT JOIN News ON Feedback.Id = News.Feedback_Id 
LEFT JOIN Other ON Feedback.Id = Other.Feedback_Id 
LEFT JOIN SocialMedia ON Feedback.Id = SocialMedia.Feedback_Id
LEFT JOIN Sport ON Feedback.Id = Sport.Feedback_Id 
LEFT JOIN StreamMedia ON Feedback.Id = StreamMedia.Feedback_Id WHERE Business_Id = 1";
$Pieresult = mysqli_query($conn, $PieQuery) or die(mysqli_error($conn));
   
$rowspie = mysqli_fetch_assoc($Pieresult);
 $TotalCount =$rowspie["Total Count"];
 $NewsCount = $rowspie["News"];
 $OtherCount = $rowspie["Other"];
 $SocialMediaCount = $rowspie["Social Media"];
 $SportCount = $rowspie["Sport"];
 $StreamMediaCount = $rowspie["Stream Media"];
 
 $Topics = array();
 
 
 $Topics['totalCount'] = $TotalCount;
 $Topics['news'] = $NewsCount;
 $Topics['other'] = $OtherCount;
 $Topics['socialMedia'] = $SocialMediaCount;
 $Topics['sport'] = $SportCount;
 $Topics['streamMedia'] = $StreamMediaCount;

 return $Topics;

}


function GetPercentageFromResults($conn){
     $TopicsArray = GetTopicResults($conn);

  $PieChartPercentages = array();
  

$percent1 = $TopicsArray['news']/$TopicsArray['totalCount'];
$NewsPercentage = number_format( $percent1 * 100, 2 );

$percent2 = $TopicsArray['other']/$TopicsArray['totalCount'];
$OtherPercentage = number_format( $percent2 * 100, 2 );

$percent3 = $TopicsArray['socialMedia']/$TopicsArray['totalCount'];
$SocialMediaPercentage = number_format( $percent3 * 100, 2 );

$percent4 = $TopicsArray['sport']/$TopicsArray['totalCount'];
$SportPercentage = number_format( $percent4 * 100, 2 );

$percent5 = $TopicsArray['streamMedia']/$TopicsArray['totalCount'];
$StreamMediaPercentage = number_format( $percent5 * 100, 2 );
  
$PieChartPercentages[0] = $NewsPercentage;
$PieChartPercentages[1] = $OtherPercentage;
$PieChartPercentages[2] = $SocialMediaPercentage;
$PieChartPercentages[3] = $SportPercentage;
$PieChartPercentages[4] = $StreamMediaPercentage;

return $PieChartPercentages;

}