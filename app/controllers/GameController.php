<?php

class GameController extends BaseController 
{
        public static function generos()
        {
            $gameModel =  new GameModel();
            return  $gameModel->generos();
        }
        public static function genero($i)
        {
            $generos = GameController::generos();
            return  isset($generos[$i])? $generos[$i]: null;
        }
        
        
        public static function regions()
        {
            $gameModel =  new GameModel();
            return  $gameModel->regions();
        }
        public static function region($i)
        {
            $regions = GameController::regions();
            return  isset($regions[$i])? $regions[$i]: null;
        }
        
        
        public static function conditions()
        {
            $gameModel =  new GameModel();
            return  $gameModel->conditions();
        }
        public static function condition($i)
        {
            $conditions = GameController::conditions();
            return  isset($conditions[$i])? $conditions[$i]: null;
        }
}
