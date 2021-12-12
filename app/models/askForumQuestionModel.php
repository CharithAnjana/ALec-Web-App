<?php

class askForumQuestionModel extends Database
{
    public function getSubjectCode($forumId)
    {
        $query = "SELECT course_name FROM course INNER JOIN forum ON course.course_Id=forum.course_Id
                    WHERE forum_id='$forumId'";

        $result = mysqli_query($GLOBALS["db"], $query);
        $name = mysqli_fetch_assoc($result)["course_name"];
        $code = explode("-", $name)[0];
        return $code;
    }

    public function addTopicDetails($subject, $question, $forumId, $userId, $randomStatus)
    {
        $subject = mysqli_real_escape_string($GLOBALS["db"], $subject);
        $question = mysqli_real_escape_string($GLOBALS["db"], $question);

        $query = "INSERT INTO forum_topic(subject, question, post_time, forum_Id, user_id, random_status, updated_time) VALUES
                    ('$subject', '$question', NOW(), '$forumId', '$userId', '$randomStatus', NOW())";
        mysqli_query($GLOBALS["db"], $query);

        $query = "SELECT topic_id, post_time FROM forum_topic ORDER BY topic_id DESC LIMIT 1";
        $result = mysqli_query($GLOBALS["db"], $query);

        return mysqli_fetch_assoc($result);
    }

    public function getCourseId($forumId)
    {
        $query = "SELECT course_Id FROM forum WHERE forum_id='$forumId' LIMIT 1";

        $result = mysqli_query($GLOBALS["db"], $query);
        return mysqli_fetch_assoc($result)["course_Id"];
    }

    public function getStudentRandomName($userId)
    {
        $query = "SELECT CONCAT(random_first_name, ' ', random_last_name) AS name FROM student WHERE user_id='$userId'";
        $result = mysqli_query($GLOBALS["db"], $query);

        return mysqli_fetch_assoc($result)["name"];
    }

    public function getUserRealName($userId)
    {
        $query = "SELECT CONCAT(first_name, ' ', last_name) AS name FROM user WHERE user_id='$userId'";
        $result = mysqli_query($GLOBALS["db"], $query);

        return mysqli_fetch_assoc($result)["name"];
    }

    public function getCourseName($courseId)
    {
        $query = "SELECT course_name FROM course WHERE course_id='$courseId'";
        $result = mysqli_query($GLOBALS["db"], $query);

        return mysqli_fetch_assoc($result)["course_name"];
    }

    public function setForumTopicNotificationStudent($userName, $courseName, $studentLink, $postTime, $courseId)
    {
        $message = $userName . " started a new forum discussion";

        $query = "INSERT INTO notification(notification_type, subject, description, url, date) VALUES('1', '$message', '$courseName', '$studentLink', '$postTime')";
        mysqli_query($GLOBALS["db"], $query);

        $query = "SELECT notification_id FROM notification ORDER BY notification_id DESC LIMIT 1";
        $result = mysqli_query($GLOBALS["db"], $query);
        $notificationId = mysqli_fetch_assoc($result)["notification_id"];

        $query = "SELECT DISTINCT student_id FROM course_registration_stu WHERE course_id='$courseId'";
        $result = mysqli_query($GLOBALS["db"], $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row["student_id"];
            $query = "INSERT INTO notification_user(user_id, notification_id) VALUES('$userId', '$notificationId')";
            mysqli_query($GLOBALS["db"], $query);
        }
    }

    public function setForumTopicNotificationLecturer($userName, $courseName, $lecturerLink, $postTime, $courseId)
    {
        $message = $userName . " started a new forum discussion";

        $query = "INSERT INTO notification(notification_type, subject, description, url, date) VALUES('1', '$message', '$courseName', '$lecturerLink', '$postTime')";
        mysqli_query($GLOBALS["db"], $query);

        $query = "SELECT notification_id FROM notification ORDER BY notification_id DESC LIMIT 1";
        $result = mysqli_query($GLOBALS["db"], $query);
        $notificationId = mysqli_fetch_assoc($result)["notification_id"];

        $query = "SELECT DISTINCT lecturer_id FROM course_registration_lec WHERE course_id='$courseId'";
        $result = mysqli_query($GLOBALS["db"], $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $userId = $row["lecturer_id"];
            $query = "INSERT INTO notification_user(user_id, notification_id) VALUES('$userId', '$notificationId')";
            mysqli_query($GLOBALS["db"], $query);
        }
    }
}
