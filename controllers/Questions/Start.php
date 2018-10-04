<?php

namespace MiniFast\Controller\Questions;

class Start
{
    public function index()
    {
        if (isset($_POST['pseudo'])) {
            session_start();
            $_SESSION['user'] = htmlspecialchars($_POST['pseudo']);
            header('Location: /game/1');
        } else {
            header('Location: /game');
            exit;
        }
    }
}