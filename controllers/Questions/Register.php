<?php

namespace MiniFast\Controller\Questions;

class Register
{
    public function index()
    {
        if (isset($_POST['reponse']) and isset($_POST['index']) and isset($_SESSION['user']['question'])) {
            $index = intval($_POST['index']);
            $reponse = $_POST['reponse'];
            $questions = $this->getJSON('questions.json');
            
            $_SESSION['user']['question'][$index - 1] = intval($reponse);
            
            if ($index == sizeof($questions['questions'])) {
                $controller = new \MiniFast\Controller();
                $controller->useController('Questions.Finish');
            } else {
                header('Location: /game/' . ($index + 1));
                exit;
            }
        }
    }

    protected function getJSON(string $file)
    {
        return json_decode(file_get_contents(__DIR__ . '/../../' . $file), true);
    }
}