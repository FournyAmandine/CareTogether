<?php

namespace App\Enums;

enum PostType : string
{
    case Sale = 'Vente';
    case Rental = 'Location';

/*    case Donation = 'Don';
    case Loan = 'Prêt';*/
}
