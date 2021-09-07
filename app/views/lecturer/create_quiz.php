<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="/public/img/logo1.png">
    <title>Create Quiz</title>

    <link rel="stylesheet" href="../../../public/css/create_quiz.css">
    <script src="../../../public/js/create_quiz.js"></script>

    <link rel="stylesheet" href="../../../public/css/2_navigation_bar.css">
    <link rel="stylesheet" href="../../../public/css/3_notification.css">
    <link rel="stylesheet" href="../../../public/css/4_footer.css">

</head>
<body>
<div class="sidebar">
    <!-- NAVIGATION BAR - START -->
    <div class="sidebar-container">
        <div class="siderbar ">
            <div class="logo_content">
                <div class="logo">
                    <div class="logo_name">ALec</div>
                </div>
                <i class="fas fa-bars" id="btn"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question-circle"></i>
                        <span class="links_name">Ask Question</span>
                    </a>
                    <span class="tooltip">Ask Question</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i>
                        <span class="links_name">My Courses</span>
                    </a>
                    <span class="tooltip">My Courses</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span class="links_name">Review</span>
                    </a>
                    <span class="tooltip">Review</span>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-comment-alt"></i>
                        <span class="links_name">Forum</span>
                    </a>
                    <span class="tooltip">Forum</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-medal"></i>
                        <span class="links_name">Leaderboard</span>
                    </a>
                    <span class="tooltip">Leaderboard</span>
                </li>


                <div class="profile_content">
                        <div class="profile profile_details">
                            <img src="/public/img/profile-picture.jpg" alt="">
                            <div class="name_job">
                                <div class="name">Louella Rhodes</div>
                                <div class="job">Lecturer</div>
                            </div>
                        </div>
                        <i class="fas fa-sign-out-alt" id="log_out"></i>
                </div>
            </ul>
        </div>
    </div>
    <!-- NAVIGATION BAR - END -->

</div>
<div class="quiz-content">
    <header><h1>Create Quiz</h1></header>
    <div class="form-content">
        <form class="details" method="post">
            <label for="quiz-name">Quiz name : </label>
            <input type="text" class="text" placeholder="Quiz name" name="quiz-name"><br>
            <label for="quiz-dur">Quiz duration : </label>
            <input type="number" class="time" name="quiz-dur" min="0" max="60"> hrs
            <input type="number" class="time" name="quiz-dur" min="0" max="60"> mins
            <input type="number" class="time" name="quiz-dur" min="0" max="60"> secs
        </form>

        <!--    First default question-->
        <div id="form">
            <div class="form-header">
                <h4 id="qname" >Question 01</h4>
                <input type="radio" name="select-one" value="MCQ"  checked onchange="return onMcq()">
                <label for="MCQ">MCQ</label><br>
                <input type="radio" name="select-one" value="SHORT" onchange="return onMcq()">
                <label for="SHORT">Short Answer</label><br>
            </div>
            <form class="question-content " id="mcq" method="post">
                <input type="text" class="form-question" placeholder="Enter your question here"><br>

                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points" name="point-quantity-2" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points" name="point-quantity-2" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points" name="point-quantity-2" min="-100"
                                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points" name="point-quantity-2" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points" name="point-quantity-2" min="-100"
                           max="100">points<br>
                </div>

            </form>

            <form class="question-content " id="shortans" method="post">
                <input type="text" class="form-question" placeholder="Enter your question here"><br>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter answer here"><br>
                    <input type="number" class="points"  min="-100"
                           max="100">points<br>
                </div>
            </form>
        </div>

        <!--    Questions that get newly added-->
        <div id="form1">
            <div class="form-header">
                <h4 id="qname1"></h4>
                <input type="radio" name="select-one2" value="MCQ" id = "select-mcq2" onchange="onMcq1()" checked>
                <label for="MCQ">MCQ</label><br>
                <input type="radio" name="select-one2" value="SHORT" id = "select-short2" onchange="onMcq1()">
                <label for="SHORT">Short Answer</label><br>
            </div>
            <form class="question-content " id="mcq2" method="post">
                <input type="text" class="form-question" placeholder="Enter your question here"><br>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-1"><br>
                    <input type="number" class="points" name="point-quantity-1" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-2"><br>
                    <input type="number" class="points"  name="point-quantity-2" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-3"><br>
                    <input type="number" class="points" name="point-quantity-3" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-4"><br>
                    <input type="number" class="points" name="point-quantity-4" min="-100"
                           max="100">points<br>
                </div>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter your answer here" name="answer-5"><br>
                    <input type="number" class="points" name="point-quantity-5" min="-100"
                           max="100">points<br>
                </div>

            </form>
            <!---->
            <form class="question-content " id="shortans2" method="post">
                <input type="text" class="form-question" placeholder="Enter your question here"><br>
                <div class="answer">
                    <input type="text" class="form-answer" placeholder="Enter answer here"><br>
                    <input type="number" class="points" name="quantity" min="-100"
                           max="100">points<br>
                </div>
            </form>
        </div>

        <div id="new-question"></div>
        <input type="submit" name="submit" class="save" value="+ Add question" onclick="getQuestions()">
        <div class="buttonset">
            <button class="finish"> Save as draft </button>

            <!-- Trigger/Open The Modal -->
            <button class="finish" id="createquiz" onclick="getPopup()"> Create quiz </button>
        </div>
    </div>

    <!-- NOTIFICATION - START -->
    <div class="pop-up"> </div>

    <div class="notification-container" onclick="showNotifycation()">
        <i class="fas fa-bell bell-notification"></i>
    </div>
    <!-- NOTIFICATION - END -->

    <!-- POP-UP WINDOW - START -->

    <!-- The Modal -->
    <div id="savedetails" class="savedetails">

        <!-- Modal content -->
        <div class="savedetails-content">
            <div class="savedetails-header">
                <span class="close">&times;</span>
                <h2> Quiz details</h2>
            </div>
            <div class="savedetails-body">
                <p><strong> Course name : </strong> SCS 2201 <br>
                </p>
                <br>
                <p><strong> Topic : </strong> <br>
                    <input type="radio" id="topic1" name="fav_language" value="topic1">
                    <label for="topic1">SCS 2201</label><br>
                    <input type="radio" id="topic2" name="fav_language" value="topic2">
                    <label for="topic2">SCS 2202</label><br>
                    <input type="radio" id="topic3" name="fav_language" value="topic3">
                    <label for="topic3">SCS 2203</label> <br>
                    <input type="radio" id="optional" name="fav_language" value="Other">
                    <label for="optional">Other</label>
                    <input type="text" class="topic-text" placeholder="Enter topic name" name="optional"><br>
                </p>
                <button class="save" value="done"> Done </button>
            </div>
        </div>

    </div>

    <!-- POP-UP WINDOW - END -->

    <!-- FOOTER - START -->

    <footer class="sticky-footer">
        <p> © Copyright ALec 2021.</p>
    </footer>

    <!-- FOOTER - END -->

</div>



<!-- FontAwesome Icon -->
<script src="https://kit.fontawesome.com/3220c9480a.js" crossorigin="anonymous"></script>

<!-- **********JavaScript START********** -->
<script src="/public/js/basic.js"></script>
<!-- **********JavaScript END********** -->

</body>
</html>