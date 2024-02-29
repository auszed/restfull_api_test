<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter{

    // protected == Esto significa que esta propiedad solo puede ser accedida desde la misma clase o desde clases hijas que hereden de esta.
    // parametro para filtrar modelos
    protected $safeParams = [];

    // Mapear a posta_code
    protected $columnMap = [];

    // mapear los simbolos para escoger elementos que son mayores o menores que
    protected $operatorMap = [];

    public function transform(Request $request){
        $eloQuery = [];

        /*
        $parm == contendrá la clave de cada elemento del array
        $operators ==  contendrá el valor asociado a esa clave.
        */
        foreach($this->safeParams as $parm =>$operators){
            // Request, que representa la solicitud HTTP actual y contiene información sobre la solicitud entrante, como los parámetros de la URL,
            // se utiliza para obtener los parámetros de consulta (también conocidos como parámetros de URL o parámetros GET
            $query = $request->query($parm);

            // !isset = Checks if the variable does not exist or its value is null.
            if(!isset($query)){
                continue;
            }

            /*
            columnMap[$parm] = regresa el valor si no es null
            ?? $parm; == si es null regresa el valor parm*/
            // $columns = $this->columnMap[$parm] ?? $parm; <------- this its working code

            // option to show that values where not found
            $columns = $this->columnMap[$parm] ?? "not found any value";


            foreach($operators as $operator){
                // isset == Checks if the variable has been declared and its value is not null.
                if(isset($query[$operator])){

                    $eloQuery[] = [$columns, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
