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
            $index = $storage->getAttribute('route.storage');
            var_dump($index);
            $storage->setAttribute('question', $json['question'][$index]['question']);
            $storage->setAttribute('responses', $json['question'][$index]['reponses']);
        }
    }
}