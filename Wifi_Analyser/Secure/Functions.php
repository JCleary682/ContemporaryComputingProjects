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
    
  $NumReturningQuery= "select count(*) As 'Customers Returned' from (SELECT MAC_Address, count(MAC_Address) as 'Number of Visits' FROM MacAddress WHERE Business_Id = 1 AND YEARWEEK(DateConnected, 1) = YEARWEEK(CURDATE(), 1) group by MAC_Address
order by count(MAC_Address) desc ) as x;";
  
$Returningresult = mysqli_query($conn, $NumReturningQuery) or die(mysqli_error($conn));

$row = mysqli_fetch_assoc($Returningresult);

 $NumCustReturned = $row["Customers Returned"];

 return $NumCustReturned;
 
}


