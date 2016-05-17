<?php

class ServerName
{
    public $adjectives = [
        'unsightly', 
        'mushy', 
        'hairy', 
        'sweaty', 
        'colossal', 
        'teeny-tiny', 
        'purring', 
        'eager', 
        'repulsive', 
        'hard',
        'greasy',
        'burnt',
        'wrinkly',
        'furry'
    ];

    public $nouns = [
        'alpaca', 
        'grandpa', 
        'balls', 
        'dingle-berry', 
        'noggin', 
        'rumpus', 
        'kermudgin', 
        'man-scape', 
        'stick-figures',
        'llamamoramma',
        'egg-roll'
    ];

    public function randomElementInArray($array){
        return $array[mt_rand(0, count($array) - 1)];
    };

    public function randomServerName($adjectives, $nouns){
        return randomElementInArray($this->adjectives) . '-' . randomElementInArray($this->nouns);
    };
}