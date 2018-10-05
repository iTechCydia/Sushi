<?php

namespace MiniFast\Controller\Questions;

use \MiniFast\Container;

class Choose
{
    public function index()
    {
        $json = json_decode(file_get_contents(__DIR__ . '/../../questions.json'), true);
        
        if (isset($_SESSION['user'])) {
            $container = new Container();
            $storage = $container->getStorage();
            
            $index = $storage->getAttribute('route.storage')['question'];
            
            $rep = [];
            foreach ($json['questions'][$index - 1]['reponses'] as $reponses) {
                $rep[] = $reponses[0];
            }
            
            $storage->setAttribute('question', $json['questions'][intval($index) - 1]['question']);
            $storage->setAttribute('reponses', $rep);
            $storage->setAttribute('index', $index);
        } else {
            header('Location: /game');
            exit;
        }
    }
}