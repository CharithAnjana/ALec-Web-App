<?php

class StudentTopicPage extends AlecFramework
{
    public function __construct()
    {
        $this->authorization("stu");
        $this->helper("linker");
        $this->lecturerTopicPageModel = $this->model("lecturerTopicPageModel");
        $this->previewQuizModel = $this->model("previewQuizModel");
        $this->studentTopicPageModel = $this->model("studentTopicPageModel");
    }

    public function index($courseId)
    {
        $data["bread"]["courseId"] = $courseId;

        $data["courseDetails"] = $this->lecturerTopicPageModel->getCourseDetails($courseId);
        $data["topicDetails"] = $this->lecturerTopicPageModel->getTopicDetails($courseId);
        $data["topicQuizSummary"] = $this->lecturerTopicPageModel->getQuizCount($courseId);
        $data["quizDetails"] = $this->lecturerTopicPageModel->getQuizDetails($courseId);

        $this->view("student/studentTopicPageView", $data);
    }

    public function previewQuiz($quizId)
    {
        $data["bread"]["courseDetails"] = $this->previewQuizModel->getCourseDetails($quizId);

        $data["courseName"] = $this->previewQuizModel->getCourseName($quizId);
        $data["quizDetails"] = $this->previewQuizModel->getQuizDetails($quizId);
        $data["questions"] = $this->previewQuizModel->getQuizQuestionsSummary($quizId);
        $data["questionChoices"] = $this->previewQuizModel->getQuizQuestionChoices($quizId);

        $this->view("student/previewQuizStudentView", $data);
    }
}
