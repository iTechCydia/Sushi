<?php

namespace MiniFast\Controller\Questions;

class Finish extends Register
{
    public function index()
    {
        $questions = $this->getJSON('questions.json');
        $leaderboard = $this->getJSON('resultats.json');
        
        if (isset($_SESSION['user']) and isset($_SESSION['user']['question'])) {
            $reponses = $_SESSION['user']['question'];
            $score = 0;
            
            if (sizeof($reponses) == sizeof($questions['questions'])) {
                foreach ($reponses as $key => $reponse) {
                    if ($questions['questions'][$key]['reponses'][$reponse][1]) {
                        $score++;
                    }
                }
                
                $leaderboard[$_SESSION['user']['pseudo']] = $score;
                
                file_put_contents(__DIR__ . '/../../resultats.json', json_encode($leaderboard));
                
                header('Location: /game');
                exit;
            } else {
                header('Location: /game');
                exit;
            }
        }
    }
}