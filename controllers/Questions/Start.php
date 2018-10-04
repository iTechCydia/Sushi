<?php

namespace MiniFast\Controller\Questions;

class Start
{
    public function index()
    {
        if (isset($_POST['pseudo'])) {
            if (isset($_COOKIE[session_name()])) {
                $_SESSION = [];
                session_destroy();
                session_start();
            } else {
                session_start();
            }
            
            $_SESSION['user'] = htmlspecialchars($_POST['pseudo']);
            $_SESSION['user'] = [
                'question' => []
            ];
            
            header('Location: /game/1');
        } else {
            header('Location: /game');
            exit;
        }
    }
}