<?php

namespace App\Enum;

class OrderStatusEnum
{

    const INACHEVE = 'INACHEVE/NON PAYÉ';
    const FRAUDE = 'FRAUDE SUSPECTEE/OU LITIGE DURANT LE PAIEMENT';
    const EN_COURS = 'EN COURS DE PREPARATION';
    const PRETE = 'PRETE';
    const EXPEDIEE = 'EXPEDIEE';
    const LIVREE = 'LIVREE';
}
