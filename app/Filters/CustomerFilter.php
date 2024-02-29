<?php

namespace App\Filters;

use Illuminate\Http\Request;
// importamos el filtro
use App\Filters\ApiFilters;


class CustomerFilter extends ApiFilter{

    // protected == Esto significa que esta propiedad solo puede ser accedida desde la misma clase o desde clases hijas que hereden de esta.
    // parametro para filtrar modelos
    protected $safeParams = [
        'name' => ['equal'],
        'type' => ['equal'],
        'email' => ['equal'],
        'address' => ['equal'],
        'city' => ['equal'],
        'state' => ['equal'],
        'postalCode' => ['equal', 'mayor_que', 'menor_que']
    ];

    // Mapear a posta_code
    protected $columnMap = [
        'postalCode' => 'postalcode'
    ];

    // mapear los simbolos para escoger elementos que son mayores o menores que
    protected $operatorMap = [
        'equal'         =>'=',
        'mayor_que'      =>'>',
        'mayor_igual_que'=>'>=',
        'menor_que'      =>'<',
        'menor_igual_que'=>'<='
    ];

}
