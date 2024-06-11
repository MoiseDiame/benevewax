<?php

namespace App\Enum;

enum OrderStatusEnum: string
{

    case INACHEVE = 'INACHEVE/NON PAYÉ';
    case EN_COURS = 'EN COURS DE PREPARATION';
    case PRETE = 'PRETE';
    case EXPEDIEE = 'EXPEDIEE';
    case LIVREE = 'LIVREE';
}
