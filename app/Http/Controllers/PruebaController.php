<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Muestra la página de inicio de la prueba.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $aplicante = [
            'puntos' => 0,
            'nivel' => 1, //Se modifica el nivel para comenzar en 1, y se agrega la coma faltante.
            'nombre' => 'Gonzalo Pacheco Zamorano', //Se cambia el nombre por el mío
            'aprobado' => false
        ];
        while ($aplicante['nivel'] < 10) { //Se cambia la condición para que la función entrenar se ejecute cuando el nivel sea menor que 10
            $aplicante = $this->entrenar($aplicante);
        }
        $aplicante['aprobado'] = $this->evaluar($aplicante);

        return view('prueba', ['aplicante' => $aplicante]); //Se envía el array completo del aplicante a la vista, para que esta pueda reconocerlo y manejar los atributos
    }

    /**
     * Entrena al aplicante para subir de nivel
     * @param array $aplicante
     * @reutrn array
     */
    private function entrenar($aplicante)
    {
        $aplicante['puntos'] += 10 / $aplicante['nivel'];
        if ($aplicante['puntos'] >= 100) 
            {
                $aplicante['nivel']++;
                $aplicante['puntos'] = 0;
            }
        return $aplicante;
    }

    /**
     * Valida el nivel del aplicante para saber si aprobo o no, el nivel de aprovacion es 10
     * @param array $aplicante
     * @return bool
     */
    private function evaluar(array $aplicante)
    {
        //Línea previa: return $aplicante->nivel >= 20;
        return $aplicante['nivel'] >= 10;
        //Se cambia la operación lógica para que su sintaxis sea correcta, y se baja la exigencia del nivel a 10, según lo solicitado.

    }
}
