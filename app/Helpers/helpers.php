<?php

// PEGA UMA DATA NO FORMATO AMERICANO E COLOCA O MÊS POR EXTENSO
if(!function_exists('formatarDataHoraExtensoUSA')){
    function formatarDataHoraExtensoUSA($data_americana){
        return date('Y-m-d H:i', strtotime(date('d F Y H:i', strtotime($data_americana))));
    }
}