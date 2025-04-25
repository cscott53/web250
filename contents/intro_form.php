<form>
    <div class="formrow"><label for="name">Name:</label>
    <input type="text" id="name" value="Charles W. Scott"></div>
    <div class="formrow"><label for="img">Photo:</label><input type="file" id="img"></div>
    <div class="formrow"><label for="caption">Caption:</label><input type="text" id="caption" value="One of my favorite bible verses"></div>
    <div class="formrow"><label for="pBack">Personal background:</label>
    <textarea id="pBack">I was born in Grand Rapids, MI but was adopted and raised in Charlotte, NC</textarea></div>
    <div class="formrow"><label for="aBack">Academic background:</label>
    <textarea id="aBack">I graduated from Myers Park HS mid-year (Jan 2022), was going to try Year Up at CPCC but had some issues so I started at CPCC in general in summer 2022 taking some general courses (like bio and psych) and started getting interested in computer science and my current major is computer programming (might be "full stack")</textarea></div>
    <div class="formrow"><label for="prBack">Professional background:</label>
    <textarea id="prBack">A church friend who (I think) works with applied data tech hooked me up with one of his friends who works for the Dept of defense and takes one man helicopters and puts computers in them and turns them into robotic autonomous/unmanned helicopters (kind of like drones but instead of running off a controller they work off a computer program using ROS (robot operating system)) and he wants me to program a couple of the sensors for one of those helicopters (starting after this spring semester)</textarea></div>
    <div class="formrow"><label for="bkgdInSubj">Background in this subject:</label>
    <textarea id="bkgdInSubj">I started with CTI110 which got) me into web dev and programming and I wanted to learn CSS so I took WEB110 which also introduced JS which got me into WEB115 and a major in FSD</textarea></div>
    <div class="formrow"><label for="pPlat">Primary computer platform:</label>
    <input type="text" id="pPlat" value="Intel Macbook air 2020"></div>
    <fieldset>
        <legend>Courses I'm taking and why</legend>
        <?php
            $courses = [
                'WEB250 Database driven websites'=>"required for my major",
                'CTS240 Project Management'=>"also required for my major",
                'CTS118 Information System Professional Communications '=>"also requirement for my major",
                'MUS110 Music appreciation'=>"for some reason I had to choose a gen-ed class (either music or art or philosophy or some other course I can't remember)",
                'CSC114 Artificial Intelligence'=>"had to have another 'elective' class in order to have a full 12+ credit hour semester for sponsorship by the DSB (division of services for the blind/visually impaired) and one of these classes was only 2 credits…also I wanted to learn a bit about AI"
            ];
            foreach ($courses as $cours(e) => $reason) {
                echo "<div class='course'>
                    <input type='text' value=\"$course\" placeholder='Course'>
                    <textarea placeholder='Reason'>$reason</textarea>
                    <button class='imgBtn'>
                        <img src='images/del.svg' alt='-'>
                    </button>
                </div>";
            }
        ?>
        <button class="imgBtn" id="addCourse" type="button"><img src="images/add.svg" alt="+"></button>
    </fieldset>
    <div class="formrow"><label for="funnyItem">Funny/interesting item about yourself:</label>
    <input type="text" id="funnyItem" value="I know a bunch of jokes"></div>
    <div class="formrow"><label for="alsoShare">I'd also like to share:</label>
    <textarea id="alsoShare">
    I'm on the autism spectrum (aspergers)
    I recently rediscovered my faith in Christ (i think in October 2024)
    </textarea></div>
    <button type="button" id="submit">Submit</button>
</form>
<script src="scripts/introForm.js"></script>
<!-- <ul>
    <li><strong>Courses I'm Taking &amp; Why:</strong>
        <ul>
            <li>WEB250 Database driven websites - required for my major</li>
            <li>CTS240 Project Management - also required for my major</li>
            <li>CTS118 Information System Professional Communications
                - also requirement for my major</li>
            <li>MUS110 Music appreciation - for some reason I had to choose
                a gen-ed class (either music or art or philosophy or some
                other course I can't remember)</li>
            <li>CSC114 Artificial Intelligence - had to have another 'elective' class in order
                to have a full 12+ credit hour semester for sponsorship by the DSB (division of
                services for the blind/visually impaired) and one of these classes was only 2
                credits…also I wanted to learn a bit about AI</li>
        </ul>
    </li>
</ul> -->