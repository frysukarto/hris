<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valdo | Typing Test </title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php echo $html['css']; ?>
        <style>
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="background-color:#808080;">
        <div style="background-color: #ebebe0;">
            <?php echo $template['header']; ?>
            <section class="content-header">
            </section>
            <section class="content">
                <div class="row">

                    <SCRIPT LANGUAGE="JavaScript">
//Holds whether or not we have already started the first typing test or now
//	True = The test has already started
//	False = The test hasn't started yet
                        var hasStarted = false;
//strToTest is an array object that holds various strings to be used as the base typing test
//	- If you update the array, be sure to update the intToTestCnt with the number of ACTIVE testing strings
                        var intToTestCnt = 4;
                        var strToTest = new Array(
                                "Innovative Technical Solutions, LLC (ITS) is a Native American owned business that was established in Paducah, Kentucky in April 2000. ITS is a certified and Small Disadvantaged Business by the U.S. Small Business Administration. Our headquarters are in Paducah, Kentucky and we have satellite offices located in Tennessee, Ohio, and Illinois. ITS is a leading edge Information Technology firm that is comprised of professionals with a broad range of experience in software development, high-speed imaging/scanning (TIFF, PDF, Text, and OCR capabilities), document management, records management, relevance management, information security, environmental management, fire services management, fire protection engineering, and protective force expertise.",
                                "The ITS Information Technology (IT) Team are experts in the identification, capture, indexing, microfilming, imaging, disposition, turnover, storage, and retrieval of records, and in the administration of records management databases. The types of records we have extensive experience in managing include waste management, hazardous waste, waste shipment, environmental compliance, environmental monitoring, feasibility studies, environmental work plans, cleanup actions, cemetery records, and various Federal laws such as CERCLA, Paper Reduction, Pollution Prevention, and Clean Water and Air.",
                                "Collectively, the professional background of key ITS personnel demonstrates Fortune 100 Company experience that includes, but is not limited to, DOE, the Department of Defense, EPA, the Tennessee Valley Authority (TVA), Lockheed Martin Utility Services, Lockheed Martin Energy Systems, British Nuclear Fuels Limited, various state and local agencies, and USEC. We consider the depth and magnitude of this experience as a proposition value to both our current and future customers.",
                                "With our years of experience, we completely understand document management and technology. We know the importance of deadlines and we know the importance of production without error.  We refuse to over-commit to deadlines that can not be met.  Dedication to excellence in providing quality products and services through innovative ideas and processes.  Steadfast resolve to a positive working environment that allows for the personal and professional development of all employees, while sustaining project service, and customer satisfaction.  Commitment to the highest ethical management practices that recognize client satisfaction as a top priority.")
                                var strToTestType = "";
                        var checkStatusInt;
//General functions to allow for left and right trimming / selection of a string
                        function Left(str, n){
                        if (n <= 0)
                                return "";
                        else if (n > String(str).length)
                                return str;
                        else
                                return String(str).substring(0, n);
                        }
                        function Right(str, n){
                        if (n <= 0)
                                return "";
                        else if (n > String(str).length)
                                return str;
                        else {
                        var iLen = String(str).length;
                        return String(str).substring(iLen, iLen - n);
                        }
                        }

//beginTest Function/Sub initializes the test and starts the timers to determine the WPM and Accuracy
                        function beginTest()
                        {
                        //We're starting the test, so set the variable to true
                        hasStarted = true;
                        //Generate a date value for the current time as a baseline
                        day = new Date();
                        //Count the number of valid words in the testing baseline string
                        cnt = strToTestType.split(" ").length;
                        //Set the total word count to the number of valid words that need to be typed
                        word = cnt;
                        //Set the exact time of day that the testing has started
                        startType = day.getTime();
                        //Disable the printing button (if used, in this download it's not included)
                        document.getElementById("printB").disabled = true;
                        calcStat();
                        //Initialize the testing objects by setting the values of the buttons, what to type, and what is typed
                        document.JobOp.start.value = "-- Typing Test Started --";
                        document.JobOp.start.disabled = true;
                        document.JobOp.given.value = strToTestType;
                        document.JobOp.typed.value = "";
                        //Apply focus to the text box the user will type the test into
                        document.JobOp.typed.focus();
                        document.JobOp.typed.select();
                        }

//User to deter from Copy and Paste, also acting as a testing protection system
//	Is fired when the user attempts to click or apply focus to the text box containing what needs to be typed
                        function deterCPProtect()
                        {
                        document.JobOp.typed.focus();
                        }

//The final call to end the test -- used when the user has completed their assignment
//	This function/sub is responsible for calculating the accuracy, and setting post-test variables
                        function endTest()
                        {
                        //Clear the timer that tracks the progress of the test, since it's complete
                        clearTimeout(checkStatusInt);
                        //Initialize an object with the current date/time so we can calculate the difference	
                        eDay = new Date();
                        endType = eDay.getTime();
                        totalTime = ((endType - startType) / 1000)

                                //Calculate the typing speed by taking the number of valid words typed by the total time taken and multiplying it by one minute in seconds (60)
                                //***** 1A *************************************************************************************************************************** 1A *****
                                //We also want to disregard if they used a double-space after a period, if we didn't then it would throw everything after the space off
                                //Since we are using the space as the seperator for words; it's the difference between "Hey.  This is me." versus "Hey. This is me." and
                                //Having the last three words reporting as wrong/errors due to the double space after the first period, see?
                                //*********************************************************************************************************************************************
                                wpmType = Math.round(((document.JobOp.typed.value.replace(/  /g, " ").split(" ").length) / totalTime) * 60)

                                //Set the start test button label and enabled state
                                document.JobOp.start.value = ">> Re-Start Typing Test <<";
                        document.JobOp.start.disabled = false;
                        //Flip the starting and stopping buttons around since the test is complete
                        document.JobOp.stop.style.display = "none";
                        document.JobOp.start.style.display = "block";
                        //Declare an array of valid words for what NEEDED to be typed and what WAS typed
                        //Again, refer to the above statement on removing the double spaces globally (1A)	
                        var typedValues = document.JobOp.typed.value.replace(/  /g, " ");
                        var neededValues = Left(document.JobOp.given.value, typedValues.length).replace(/  /g, " ").split(" ");
                        typedValues = typedValues.split(" ");
                        //Disable the area where the user types the test input
                        document.JobOp.typed.disabled = true;
                        //Declare variable references to various statistical layers
                        var tErr = document.getElementById("stat_errors");
                        var tscore = document.getElementById("stat_score");
                        var tStat = document.getElementById("stat_wpm");
                        var tTT = document.getElementById("stat_timeleft");
                        var tArea = document.getElementById("TypeArea");
                        var aArea = document.getElementById("AfterAction");
                        var eArea = document.getElementById("expectedArea");
                        //Initialize the counting variables for the good valid words and the bad valid words
                        var goodWords = 0;
                        var badWords = 0;
                        //Declare a variable to hold the error words we found and also a detailed after action report
                        var errWords = "";
                        var aftReport = "<b>Detailed Summary:</b><br><font color=\"DarkGreen\">";
                        //Enable the printing button
                        document.getElementById("printB").disabled = false;
                        //Loop through the valid words that were possible (those in the test baseline of needing to be typed)
                        var str;
                        var i = 0;
                        for (var i = 0; i < word; i++)
                        {
                        //If there is a word the user typed that is in the spot of the expected word, process it
                        if (typedValues.length > i)
                        {
                        //Declare the word we expect, and the word we recieved
                        var neededWord = neededValues[i];
                        var typedWord = typedValues[i];
                        //Determine if the user typed the correct word or incorrect
                        if (typedWord != neededWord)
                        {
                        //They typed it incorrectly, so increment the bad words counter
                        badWords = badWords + 1;
                        errWords += typedWord + " = " + neededWord + "\n";
                        aftReport += "<font color=\"Red\"><u>" + neededWord + "</u></font> ";
                        }
                        else
                        {
                        //They typed it correctly, so increment the good words counter
                        goodWords = goodWords + 1;
                        aftReport += neededWord + " ";
                        }
                        }
                        else
                        {
                        //They didn't even type this word, so increment the bad words counter
                        //Update: We don't want to apply this penalty because they may have chosen to end the test
                        //		  and we only want to track what they DID type and score off of it.
                        //badWords = badWords + 1;
                        }
                        }

                        //Finalize the after action report variable with the typing summary at the beginning (now that we have the final good and bad word counts)
                        aftReport += "</font>";
                        aftReport = "<b>Typing Summary:</b><br>You typed " + (document.JobOp.typed.value.replace(/  /g, " ").split(" ").length) + " words in " + totalTime + " seconds, a speed of about " + wpmType + " words per minute.\n\nYou also had " + badWords + " errors, and " + goodWords + " correct words, giving scoring of " + ((goodWords / (goodWords + badWords)) * 100).toFixed(2) + "%.<br><br>" + aftReport;
                        //Set the statistical label variables with what we found (errors, words per minute, time taken, etc)	
                        tErr.innerText = badWords + " Errors";
                        tStat.innerText = (wpmType - badWords) + " WPM / " + wpmType + " WPM";
                        tTT.innerText = totalTime.toFixed(2) + " sec. elapsed";
                        //Calculate the accuracy score based on good words typed versus total expected words -- and only show the percentage as ###.##
                        tscore.innerText = ((goodWords / (goodWords + badWords)) * 100).toFixed(2) + "%";
                        //Flip the display of the typing area and the expected area with the after action display area
                        aArea.style.display = "block";
                        tArea.style.display = "none";
                        eArea.style.display = "none";
                        //Set the after action details report to the summary as we found; and in case there are more words found than typed
                        //Set the undefined areas of the report to a space, otherwise we may get un-needed word holders
                        aArea.innerHTML = aftReport.replace(/undefined/g, " ");
                        //Notify the user of their testing status via a JavaScript Alert
                        //Update: There isn't any need in showing this popup now that we are hiding the typing area and showing a scoring area
                        //alert("You typed " + (document.JobOp.typed.value.split(" ").length) + " words in " + totalTime + " seconds, a speed of about " + wpmType + " words per minute.\n\nYou also had " + badWords + " errors, and " + goodWords + " correct words, giving scoring of " + ((goodWords / (goodWords+badWords)) * 100).toFixed(2) + "%.");
                        }

//calcStat is a function called as the user types to dynamically update the statistical information
                        function calcStat()
                        {
//If something goes wrong, we don't want to cancel the test -- so fallback error proection (in a way, just standard error handling)
                        try {
                        //Reset the timer to fire the statistical update function again in 250ms
                        //We do this here so that if the test has ended (below) we can cancel and stop it
                        checkStatusInt = setTimeout('calcStat();', 250);
                        //Declare reference variables to the statistical information labels
                        var tStat = document.getElementById("stat_wpm");
                        var tTT = document.getElementById("stat_timeleft");
                        var tProg = document.getElementById("stProg");
                        var tProgt = document.getElementById("thisProg");
                        var tArea = document.getElementById("TypeArea");
                        var aArea = document.getElementById("AfterAction");
                        var eArea = document.getElementById("expectedArea");
                        //Refer to 1A (above) for details on why we are removing the double space
                        var thisTyped = document.JobOp.typed.value.replace(/  /g, " ");
                        //Create a temp variable with the current time of day to calculate the WPM
                        eDay = new Date();
                        endType = eDay.getTime();
                        totalTime = ((endType - startType) / 1000)

                                //Calculate the typing speed by taking the number of valid words typed by the total time taken and multiplying it by one minute in seconds (60)
                                wpmType = Math.round(((thisTyped.split(" ").length) / totalTime) * 60)

                                //Set the words per minute variable on the statistical information block
                                tStat.innerText = wpmType + " WPM";
                        //The test has started apparantly, so disable the stop button
                        document.JobOp.stop.disabled = false;
                        //Flip the stop and start button display status
                        document.JobOp.stop.style.display = "block";
                        document.JobOp.start.style.display = "none";
                        //Calculate and show the time taken to reach this point of the test and also the remaining time left in the test
                        //Colorize it based on the time left (red if less than 5 seconds, orange if less than 15)
                        if (Number(60 - totalTime) < 5)
                        {
                        tTT.innerHTML = "<font color=\"Red\">" + String(totalTime.toFixed(2)) + " sec. / " + String(Number(60 - totalTime).toFixed(2)) + " sec.</font>";
                        }
                        else
                        {
                        if (Number(60 - totalTime) < 15)
                        {
                        tTT.innerHTML = "<font color=\"Orange\">" + String(totalTime.toFixed(2)) + " sec. / " + String(Number(60 - totalTime).toFixed(2)) + " sec.</font>";
                        }
                        else
                        {
                        tTT.innerHTML = String(totalTime.toFixed(2)) + " sec. / " + String(Number(60 - totalTime).toFixed(2)) + " sec.";
                        }
                        }
                        //Determine if the user has typed all of the words expected
                        if ((((thisTyped.split(" ").length) / word) * 100).toFixed(2) >= 100)
                        {
                        tProg.width = "100%";
                        tProgt.innerText = "100%";
                        }
                        else
                        {
                        //Set the progress bar with the exact percentage of the test completed
                        tProg.width = String((((thisTyped.split(" ").length) / word) * 100).toFixed(2)) + "%";
                        tProgt.innerText = tProg.width;
                        }
                        //Determine if the test is complete based on them having typed everything exactly as expected
                        if (thisTyped.value == document.JobOp.given.value)
                        {
                        endTest();
                        }
                        //Determine if the test is complete based on whether or not they have typed exactly or exceeded the number of valid words (determined by a space)
                        if (word <= (thisTyped.split(" ").length))
                        {
                        endTest();
                        }

                        //Check the timer; stop the test if we are at or exceeded 60 seconds
                        if (totalTime >= 60)
                        {
                        endTest();
                        }

                        //Our handy error handling
                        } catch (e){};
                        }
                        //Simply does a check on focus to determine if the test has started
                        function doCheck()
                        {
                        if (hasStarted == false)
                        {
                        //The test has not started, but the user is typing already -- maybe we should start?
                        beginTest(); //Yes, we should -- consider it done!
                        }
                        }
                    </SCRIPT>
                    <div align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td >

                                    <div class="col-xs-3" >
                                        <input type="text" placeholder="Nama Lengkap" class="form-control">
                                        <input type="text" value="<?php echo date("d-m-Y ") ?>" class="form-control">
                                    </div>
                                    <input disabled id="printB" onclick="window.print();" type="text" class="btn btn-primary" value="Print Results" name="printB"></td>
                            </tr>
                        </table>
                    </div>

                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td style="padding: 4px" class="bodya" colspan="2">
                                <FORM name="JobOp">
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="5" width="100%">
                                                    <tr>
                                                        <td align="center" style="border-left: 1px solid #344270; border-right: 2px solid #344270; border-top: 1px solid #344270; border-bottom: 2px solid #344270; padding: 5px; background-color: #CED3E8" background="Images/Blue_Back.gif">
                                                            <b><font  size="4" color="#000000">Word Per Minutes(WPM)</font></b></td>
                                                        <td align="center" style="border-left: 1px solid #344270; border-right: 2px solid #344270; border-top: 1px solid #344270; border-bottom: 2px solid #344270; padding: 5px; background-color: #CED3E8" background="Images/Blue_Back.gif">
                                                            <b><font size="4" color="#000000">Entry Errors</font></b></td>
                                                        <td align="center" style="border-left: 1px solid #344270; border-right: 2px solid #344270; border-top: 1px solid #344270; border-bottom: 2px solid #344270; padding: 5px; background-color: #CED3E8" background="Images/Blue_Back.gif">
                                                            <b><font  size="4" color="#000000">Accuracy</font></b></td>
                                                        <td align="center" style="border-left: 1px solid #344270; border-right: 2px solid #344270; border-top: 1px solid #344270; border-bottom: 2px solid #344270; padding: 5px; background-color: #CED3E8" background="Images/Blue_Back.gif">
                                                            <b><font size="5" color="#000000">Elapsed / 
                                                                Remaining</font></b></td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center"><font size="2" face="Arial">
                                                            <div id="stat_wpm">Not Started</div></font></td>
                                                        <td style="border-left: 1px dotted #8794C7; border-right: 1px dotted #8794C7; border-top-width: 1px; border-bottom-width: 1px" align="center">
                                                            <font size="2" face="Arial"><div id="stat_errors">Waiting...</div></font></td>
                                                        <td style="border-left-width: 1px; border-right: 1px dotted #8794C7; border-top-width: 1px; border-bottom-width: 1px" align="center">
                                                            <font size="2" face="Arial"><div id="stat_score">Waiting...</div></font></td>
                                                        <td align="center"><font size="2" face="Arial">
                                                            <div id="stat_timeleft">0:00</div></font></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left-width: 1px; border-right-width: 1px; border-top: 1px solid #000000; border-bottom-width: 1px">
                                                <div id="expectedArea" style="display:block">
                                                    <p style="margin-top: 0; margin-bottom: 0">
                                                        <font color="#000000" face="Arial" size="4">
                                                        <textarea name="given" cols=53 rows=10 wrap=on onFocus="deterCPProtect();" style="width: 100%; border: 1px solid #000000; padding: 2px; font-family:Arial; font-size:15pt">Click on the button below to start the typing test.  What you will be expected to type will appear here.</textarea></font>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p align="center" style="margin-top: 0; margin-bottom: 2px">
                                                <input type=button value="&gt;&gt; Start Typing Test &lt;&lt;" name="start" onClick="beginTest()" style="display:block; border-left:1px solid #293358; border-right:2px solid #293358; border-top:1px solid #293358; border-bottom:2px solid #293358; width: 100%; background-color: #9BB892; color:#FFFFFF; background-image:url('Images/Green_Back.gif')"><p align="center" style="margin-top: 0; margin-bottom: 0">
                                                <input disabled type=button value="&gt;&gt; End Typing Test &lt;&lt;" name="stop" onClick="endTest()" style="display:none; border-left:1px solid #293358; border-right:2px solid #293358; border-top:1px solid #293358; border-bottom:2px solid #293358; width: 100%; background-color: #F05959; color:#FFFFFF; background-image:url('Images/Red_Back.gif')"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: Arial; font-size: 16pt; ">
                                                <div id="typeArea" style="display:block">
                                                    <table border="0" width="100%" cellspacing="1">
                                                        <tr>
                                                            <td style="border: 1px solid #9CA8D1; background-color: #EAECF4">
                                                                <div align="left">
                                                                    <table id="stProg" border="0" width="0%" cellspacing="2">
                                                                        <tr>
                                                                            <td style="border: 1px solid #344270; background-color: #8F9BCB; font-family:Arial; font-size:16pt; color:#FFFFFF" align="right" background="Images/Blue_Back.gif">
                                                                                <div id="thisProg">0%</div></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <p style="margin-top: 0; margin-bottom: 0">
                                                        <font color="#000000" face="Arial" size="1">
                                                        <textarea onkeypress="doCheck();" onkeydown="//calcStat()" name="typed" cols=53 rows=10 wrap=on style="width: 100%; border: 1px solid #344270; padding: 2px; font-family:Arial; font-size:16pt"></textarea></font>
                                                </div>
                                                <div id="afterAction" style="display:none">
                                                </div>
                                            </td>
                                        </tr>
                                        <script>
                                            randNum = Math.floor((Math.random() * 10)) % intToTestCnt;
                                            strToTestType = strToTest[randNum];
                                            document.JobOp.given.value = strToTestType;
                                            document.JobOp.typed.focus();
                                        </script>
                                    </table>
                                </FORM>
                            </td>
                        </tr>
                    </table>
                </div>
            </section> 
        </div>
        <?php echo $html['js']; ?>
    </body>
</html>