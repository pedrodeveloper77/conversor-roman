<?php

class Matematica {

    private int $decimal = 0;
    private string $romano = '';

    public function convertToRomano($romano) {
            $new_array = [];

             // Itera sobre cada caractere da string $romano
            for ($i = 0; $i < strlen($romano); $i++) {
                 // Usa uma estrutura switch para verificar qual é o caractere atual e adicionar o valor correspondente ao array $new_array
                switch ($romano[$i]) {
                    case 'I':
                        $new_array[] = 1;
                        break;
                    case 'V':
                        $new_array[] = 5;
                        break;
                    case 'X':
                        $new_array[] = 10;
                        break;
                    case 'L':
                        $new_array[] = 50;
                        break;
                    case 'C':
                        $new_array[] = 100;
                        break;
                    case 'D':
                        $new_array[] = 500;
                        break;
                    case 'M':
                        $new_array[] = 1000;
                        break;
                    default:
                        // echo "Número romano inválido";
                        return;
                }
            }
        
            // Inicializa a variável $decimal que armazenará o resultado final
            $numeroReal = 0;
        
             // Percorre o array $new_array para calcular o valor decimal final
            for ($i = 0; $i < count($new_array); $i++) {
        
                // i = 0 |  x = 10 (10 >= 50 = - 10)
                // i = 1 |  l = 50 (50 >= 5 =  + 50)
                // i = 2 |  v = 5 (5 >= 1 = + 5)
                // i = 3 |  i = 1 (1 >= 1 = + 1)
                // i = 4 |  i = 1 (1 >= 1 = + 1)
                // i = 5 |  i = 1 (1 >= 1 = + 1)
        
                // [40, 45, 1, 1, 1 ]
        
                 // Se o valor atual é o último do array ou é maior ou igual ao próximo valor, adiciona ao total
                if ($i == count($new_array) - 1 || $new_array[$i] >= $new_array[$i + 1]) {
                    $numeroReal = $numeroReal + $new_array[$i]; // Pega o número do array e soma com o número real
                } else {
                    $numeroReal = $numeroReal - $new_array[$i]; // Pega o número do array e subtrai com o número real
                }
            }
            
            $this->decimal = $numeroReal;
        
    }

    public function getDecimal() {
        return $this->decimal;
    } 

    public function convertToReal($num) {

        // Explicação básica

        /*
        num recebe 48, então ele vai percorrer esse array até encontrar um número menor que 48, neste caso

        48 é maior que 40 então adiciona

        XL e subtrai 48 - 40 que da o resultado de 8

        8 é maior que 5 então adiciona o 

        V e subtrai 8 - 5 = 3

        dps ele vai subtraindo 3 maior que 1 recebe I, 2 é maior que 1 recebe I, 1 é maior ou igual a 1 recebe I

        Juntando as letras: XLVIII

        */

        $decimalMap = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I'
        ];

        $romano = '';

        foreach ($decimalMap as $value => $symbol) {
            while ($num >= $value) {
                $num = $num - $value;
                $romano .= $symbol;
            }
        }

        $this->romano = $romano;
    }

    public function getRomano() {
        return $this->romano;
    } 


}
