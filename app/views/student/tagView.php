<?php

//$temp = $data["forumDetails"]["forum_name"];
//$courseCode = explode("-", $temp)[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Shortcut Icon -->
    <?php shortIcon("logo1.jpg"); ?>

    <title>Tags</title>

    <?php linkCSS("tag") ?>

    <?php linkCSS("modal") ?>

    <?php linkCSS("success_message"); ?>

</head>

<body>

    <input type="hidden" id="userId" value="<?php echo $data["userId"]; ?>">

    <?php linkPhp("navigationBarStudent"); ?>

    <!--    breadcrumb-->
    <ul class="breadcrumb">
        <li><a href="http://localhost/ALec/studentDashboard/index">Home</a></li>
        <li><a href="#">Tags</a></li>
    </ul>

    <div class="forum-container center">
        <div class="forum-message">
            <header>Tags</header>
        </div>

<!--        <span class="container-label">All Tags</span>-->
        <div class="tags-container">
            <?php
            while ($row = mysqli_fetch_assoc($data["tagNames"])) {
                echo
                "
                <p class='tag-element'>
                {$row["tag_name"]}
                <input type='hidden' value='{$row["tag_id"]}'>
                <i class='fa fa-times' aria-hidden='true'></i>
                </p>
                ";
            }
            ?>

            <!-- <p>machine learning<i class="fa fa-times" aria-hidden="true"></i></p> -->
        </div>

        <button id="add-tag-btn">
            <span class="button-title">
                <i class="fas fa-plus"></i>

                <span class="space-tag"></span>

                <span class="text">
                    Add New Tag
                </span>
            </span>
        </button>

        <!-- Course Selection Modal -->
        <div id="tag-details-modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span id="close" class="close">&times;</span>
                    <h2>Add New Tag</h2>
                </div>

                <div class="modal-body">
                    <form action="<?php echo BASEURL . "/tags/submit"; ?>" method="post" id="tag-form">
                        <div class="input-row">
                            <label class="tag-input-label" for="tag-name">Tag name:</label>
                            <input type="text" id="tag-name" name="tag-name" class="tag-input" onfocusout="validateAll()">
                            <div class="error"></div>
                        </div>

                        <input type="submit" value="Create Tag" class="btn" id="create-tag-btn">
                    </form>

                </div>
            </div>

        </div>

        <!--    Search bar     -->
        <form class="search-bar" id="search">
            <label for="search-tag"></label>
            <input type="text" placeholder="Search.. &#xF002;" name="search" id="search-tag" style="font-family: FontAwesome, Arial,sans-serif; font-style: normal">
        </form>

        <div class="discussion-list">
            <div class="discussion-table-container">
                <ul class="discussion-table">
                    <li class="table-header">
                        <div class="col col-1">Discussion</div>
                        <div class="col col-2">Started by</div>
                        <div class="col col-3">Last post</div>
                    </li>

                    <?php
                    while ($row = mysqli_fetch_assoc($data["topicDiscussionDetails"])) {
                        $replyRow = mysqli_fetch_assoc($data["replyDiscussionDetails"]);

                        $name = $row["name"];
                        $replyName = $replyRow["name"];

                        if ($row["user_type"] === "stu" and $row["user_id"] !== $data["userId"] and $row["random_status"] === "T") {
                            $name = $row["random_name"];
                        }

                        if ($replyRow["user_type"] === "stu" and $replyRow["user_id"] !== $data["userId"] and $replyRow["random_status"] === "T") {
                            $replyName = $replyRow["random_name"];
                        }

                        echo
                        "
                        <li class='table-row'>

                        <div class='col col-1' data-label='Discussion'>
                            <a href='" . BASEURL . "/studentForumTopicDiscussion/index/{$row['topic_id']}" . "'>
                                {$row['subject']}
                            </a>
                        </div>
                        <div class='col col-2' data-label='Started by'>
                            <div class='profile_img_info'>
                                <div class='img'>
                                    <img src='http://localhost/ALec/public/img/profile_pic.svg' alt='profile_pic'>
                                </div>
                                <div class='info'>
                                    <p class='name'>{$name}</p>
                                    <p class='place'>
                                        {$row['post_time']}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class='col col-3' data-label='Last post'>
                            <div class='profile_img_info'>
                                <div class='img'>
                                    <img src='http://localhost/ALec/public/img/profile_pic.svg' alt='profile_pic'>
                                </div>
                                <div class='info'>
                                    <p class='name'>{$replyName}</p>
                                    <p class='place'>
                                        {$replyRow['post_time']}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                        ";
                    }
                    ?>
                </ul>

            </div>
        </div>
    </div>

    <?php linkPhp("notificationView"); ?>

    <?php linkPhp("footer"); ?>

    <?php linkJS("lib/jquery-3.6.0.min"); ?>

    <?php linkJS("notification") ?>

    <?php linkJS("deleteMessage"); ?>

    <?php linkJS("add-tag-modal"); ?>

    <?php linkJS("tagValidation"); ?>

    <?php linkJS("forumSearch"); ?>

    <?php linkJS("deleteTag"); ?>

</body>

</html>