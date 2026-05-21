<?php

namespace App\Enums;

enum PostState :string
{
    case Damaged = 'Très abîmé';
    case Wear = 'Trace d’usure';
    case Good = 'Bon état';
    case New = 'Neuf';

}
