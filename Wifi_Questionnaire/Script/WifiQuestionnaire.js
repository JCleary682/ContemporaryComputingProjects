 var chkbxSoc = false;
 var chkbxsport = false;
 var chkbxnews = false;
 var chkbxstream = false;
 var chkbxother = false;
 var chkbxyes = false;
 var chkbxno = false;
  
  function chkShowSubmit(){   
          
//          var ChkSocial = document.getElementById('ChkBoxSocialMedia').checked;
//    var ChkSport = document.getElementById('ChkBoxSport').checked;
//    var ChkNews = document.getElementById('ChkBoxNews').checked;
//    var ChkStream = document.getElementById('ChkBoxStreamMedia').checked;
//    var ChkOther = document.getElementById('ChkBoxOther').checked;
//    var ChkYes = document.getElementById('ChkBoxServiceYes').checked;
//    var ChkNo = document.getElementById('ChkBoxServiceNo').checked;
  
 if (chkbxSoc || chkbxsport || chkbxnews || chkbxstream || chkbxother == true) {
            
     if (chkbxyes || chkbxno == true) {
         document.getElementById('SubmitBtn').style.display = "block";
        } else {
            document.getElementById('SubmitBtn').style.display = "none";
        }
  
} else {
 document.getElementById('SubmitBtn').style.display = "none";
}
  }
  
  function extendPage(){
      if (chkbxSoc && chkbxsport && chkbxnews && chkbxstream && chkbxother == true) {
 document.getElementById('QuestCont').style.height = "1170px";
 document.getElementById('InsideCont').style.height = "1020px";
} else {
 document.getElementById('QuestCont').style.height = "970px";
 document.getElementById('InsideCont').style.height = "820px";
}
  }
  
      

function chkSocialMedia(){
{
  if (document.getElementById('ChkBoxSocialMedia').checked) 
  {
      chkbxSoc = true;     
      document.getElementById('TxtboxSocialMediaDiv').style.display = "block";
      document.getElementById('TxtboxSocialMediaDiv').classList.add("fadeIn");
      chkShowSubmit();
      extendPage();
  } else {
      chkbxSoc = false;    
     document.getElementById('TxtboxSocialMediaDiv').style.display = "none";
      chkShowSubmit();
      extendPage();
  }
}

          }
          
function chkSport(){
{
  if (document.getElementById('ChkBoxSport').checked) 
  {
      chkbxsport = true;
      document.getElementById('TxtboxSportDiv').style.display = "block";
      document.getElementById('TxtboxSportDiv').classList.add("fadeIn");
      chkShowSubmit();
      extendPage();
  } else {
      chkbxsport = false;     
     document.getElementById('TxtboxSportDiv').style.display = "none";
     chkShowSubmit();
     extendPage();
  }
}
          }
          
function chkNews(){
{
  if (document.getElementById('ChkBoxNews').checked) 
  {
      chkbxnews = true;
      
      document.getElementById('TxtboxNewsDiv').style.display = "block";
       document.getElementById('TxtboxNewsDiv').classList.add("fadeIn");
       chkShowSubmit();
       extendPage();
  } else {
      chkbxnews = false;
     
     document.getElementById('TxtboxNewsDiv').style.display = "none";
     chkShowSubmit();
     extendPage();
  }
}
          }
          
function chkStreamMedia(){
{
  if (document.getElementById('ChkBoxStreamMedia').checked) 
  {
      chkbxstream = true;
      
      document.getElementById('TxtboxStreamMediaDiv').style.display = "block";
      document.getElementById('TxtboxStreamMediaDiv').classList.add("fadeIn");
      chkShowSubmit();
      extendPage();
  } else {
      chkbxstream = false;
      
     document.getElementById('TxtboxStreamMediaDiv').style.display = "none";
     chkShowSubmit();
     extendPage();
  }
}
          }
          
function chkOther(){
{
  if (document.getElementById('ChkBoxOther').checked) 
  {
      chkbxother = true;
      
      document.getElementById('TxtboxOtherDiv').style.display = "block";
      document.getElementById('TxtboxOtherDiv').classList.add("fadeIn");
      chkShowSubmit();
      extendPage();
  } else {
      chkbxother = false;
     
     document.getElementById('TxtboxOtherDiv').style.display = "none";
     chkShowSubmit();
     extendPage();
  }
}
          }
          
          
function chkServiceYes(){

  if (document.getElementById('ChkBoxServiceYes').checked) 
  {
      chkbxyes = true;
     
       document.getElementById('ChkBoxServiceNo') .checked = false;
       document.getElementById('TxtboxServiceNoDiv').style.display = "none";
      document.getElementById('TxtboxServiceYesDiv').style.display = "block";
      document.getElementById('TxtboxServiceYesDiv').classList.add("fadeIn");
      chkShowSubmit();
  } else {
      chkbxyes = false;
    
     document.getElementById('TxtboxServiceYesDiv').style.display = "none";
     chkShowSubmit();
    
  }

}
          
          
function chkServiceNo(){

  if (document.getElementById('ChkBoxServiceNo').checked) 
  {
      chkbxno = true;
      
       document.getElementById('ChkBoxServiceYes') .checked = false;
       document.getElementById('TxtboxServiceYesDiv').style.display = "none";
      document.getElementById('TxtboxServiceNoDiv').style.display = "block";
        document.getElementById('TxtboxServiceNoDiv').classList.add("fadeIn");
        chkShowSubmit();
  } else {
      chkbxno =false;
     
     document.getElementById('TxtboxServiceNoDiv').style.display = "none";
     chkShowSubmit();
    
  }

    
}
         