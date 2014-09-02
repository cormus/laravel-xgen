<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameModel
 *
 * @author Stoledo
 */
class GameModel 
{
    public function generos()
    {
        return array(
            1 => 'Ação',
            2 => 'Aventura',
            3 => 'Arcade',
            4 => 'Corrida',
            5 => 'Cartas',
            6 => 'Esporte',
            7 => 'Estratégia',
            8 => 'Educacional',
            9 => 'Exercício',
           10 => 'Luta',
           11 => 'Plataforma',
           12 => 'Quebra-cabeça',
           13 => 'RPG',
           14 => 'Ritmo',
           15 => 'Simulador',
           16 => 'Survival Horro',
           17 => 'Tabuleiro',
           18 => 'Tiro primeira pessoa',
           19 => 'Tiro terceira pessoa',
           20 => 'outros'
        );
    }
    public function regions()
    {
        return array(
            1 => 'Americano',
            2 => 'Japones',
            3 => 'Europeu',
            4 => 'Outros',
        );
    }
    public function conditions()
    {
        return array(
            1 => 'Novo',
            2 => 'Usado',
            3 => 'Lacrado',
            4 => 'Velho',
            5 => 'Exelente estado'
        );
    }
}
