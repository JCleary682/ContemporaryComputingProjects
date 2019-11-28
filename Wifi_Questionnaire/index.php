
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
        <div class="QuestionnaireContainer" id="QuestCont">
            
            <div class="InsideContainer" id="InsideCont">
                <form method="post" action="Discount.php">
                <div class="QuizTitle">
                    <div class="MainImgDiv"><div class="BusinessImg"></div></div>
                    
                    <div class="MainTextDiv"><h1>Coffee Cafe- Wifi User Questionnaire</h1></div>
                </div>
                <div>
                    <div class="InfoContainer">
                        <p class="InfoText">Hey! We have recognised you as a returning customer and want to hear from you. Filling out this short questionnaire will earn you a <b>discount code</b>, don't worry though - we don't collect any personal information and anything you enter will only be used by us.</p>
                    </div>
                    <div class="FirstQustionDiv">
                        <h2 class="QuestionText">Q1: What do you search whilst using the public Wi-Fi?</h2>
                     
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxSocialMedia">Social Media</label>
                            <input type="checkbox" id="ChkBoxSocialMedia" class="option-input checkbox" name="chkSocialbox" value="SocialMediaChkBox" onclick="chkSocialMedia();">
                        </div>
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxSport">Sport</label>
                            <input type="checkbox" id="ChkBoxSport" class="option-input checkbox" name="chkSportbox" value="SportChkBox" onclick="chkSport();">
                        </div>
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxNews">News</label>
                            <input type="checkbox" id="ChkBoxNews" class="option-input checkbox" name="chkNewsbox" value="NewsChkBox" onclick="chkNews();">
                        </div>
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxStreamMedia">Stream Media</label>
                            <input type="checkbox" id="ChkBoxStreamMedia" class="option-input checkbox" name="chkStreambox" value="StramMediaChkBox" onclick="chkStreamMedia();">
                        </div>
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxOther">Other</label>
                            <input type="checkbox" id="ChkBoxOther" class="option-input checkbox" name="chkOtherbox" value="OtherChkBox" onclick="chkOther();">
                        </div>
                    </div>
                    <div class="TextBoxesDiv">
                        <div class="IndividualTextBoxDiv" id="TxtboxSocialMediaDiv">
                          <p>Please Elaborate on Social Media</p>
                          <textarea  type="text" class="TextBox" name="TxtSocial" id="TxtboxSocialMedia" ></textarea>  
                        </div>     
                        <div class="IndividualTextBoxDiv" id="TxtboxSportDiv">
                          <p>Please Elaborate on Sport</p>
                          <textarea type="text" class="TextBox" name="TxtSports" id="TxtboxSport" > </textarea> 
                        </div>  
                        <div class="IndividualTextBoxDiv" id="TxtboxNewsDiv">
                          <p>Please Elaborate on News</p>
                          <textarea type="text" class="TextBox" name="TxtNews" id="TxtboxNews" > </textarea> 
                        </div>  
                        <div class="IndividualTextBoxDiv" id="TxtboxStreamMediaDiv">
                          <p>Please Elaborate on Stream Media</p>
                          <textarea type="text" class="TextBox" name="TxtStream" id="TxtboxStreamMedia">  </textarea>
                        </div>  
                        <div class="IndividualTextBoxDiv" id="TxtboxOtherDiv">
                          <p>Please Elaborate on Other</p>
                          <textarea type="text" class="TextBox" name="TxtOther" id="TxtboxOther" > </textarea> 
                        </div>  
                    </div>
                    <div class="FirstQustionDiv">
                         <h2 class="QuestionText">Q2: Are you currently satisfied with the service?</h2>
                         <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxSocialMedia">Yes</label>
                            <input type="checkbox" id="ChkBoxServiceYes" name="chkyes" class="option-input checkbox" value="SocialMediaChkBox" onclick="chkServiceYes();">
                        </div>
                        <div class="ChkBoxContainer">
                            <label class="ChkBoxLabel" for="ChkBoxSocialMedia">No</label>
                            <input type="checkbox" id="ChkBoxServiceNo" name="chkno" class="option-input checkbox" value="SportChkBox" onclick="chkServiceNo();">
                        </div>
                    </div>
                    <div class="TextBoxesDiv">
                         <div class="IndividualTextBoxDiv" id="TxtboxServiceYesDiv">
                          <p>Please Explain</p>
                          <textarea  type="text" class="TextBox" name="TxtYes" id="TxtboxServiceYes" ></textarea>  
                        </div>     
                        <div class="IndividualTextBoxDiv" id="TxtboxServiceNoDiv">
                          <p>What were you not satisfied with?</p>
                          <textarea type="text" class="TextBox" name="TxtNo" id="TxtboxServiceNo" > </textarea> 
                        </div> 
                        <div class="BtnExtra">
                            <input type="submit" id="SubmitBtn" class="SubmitBtn">
                        </div>
                   
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
