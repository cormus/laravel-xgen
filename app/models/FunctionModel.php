<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FunctionModel
 *
 * @author Alex
 */
class FunctionModel {

    public static function formatDate($data) 
    {
        $meses = array(
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro');

        $arrayData['d'] = date('d', strtotime($data)); //dia do mêr
        $arrayData['H'] = date('H', strtotime($data)); //hora
        $arrayData['i'] = date('i', strtotime($data)); //minutos
        $arrayData['s'] = date('s', strtotime($data)); //segundos
        $arrayData['F'] = date('m', strtotime($data)); //mes em inteiro de 2 digitos ex: 05
        $arrayData['m'] = $meses[$arrayData['F']];     //mês em string de palavra inteira ex: 'Janeiro'
        $arrayData['Y'] = date('Y', strtotime($data)); //ano com formata��o de 4 digitos

        return $arrayData;
    }

}
