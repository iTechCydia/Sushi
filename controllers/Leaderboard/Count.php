<?php

namespace MiniFast\Controller\Leaderboard;

class Count extends \MiniFast\Controller\Questions\Register
{
    public function index()
    {
        $leaderboar = $this->getJSON('resultats.json');
        
        arsort($leaderboar);
        
        $container = new \MiniFast\Container();
        $container->getStorage()->setAttribute('leaderboard', $leaderboar);
    }
}