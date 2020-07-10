<?php


class Numerosbloqueados
{
    public $numerosBloqueados; /*TEM QUE SER ARRAY*/

    /*  Array associativo
     * ['chave' => 'valor', '1' => 'false', '2' => 'true']
     */

    public function __construct()
    {
        $this->iniciar();
    }

    //METE OS NUMEROS TODOS A FALSE
    public function iniciar()
    {
        $this->numerosBloqueados = array(1=>false, 2=>false, 3=>false,4=>false,5=>false,6=>false,
    7=>false,8=>false,9=>false);

    }



    public function bloquearNumero($numeroEscolhido){

        $this->numerosBloqueados[$numeroEscolhido]=true;


        }




    public function checkFinalJogada($somaDados,$numerosBloqueados)
    {

//FAZER CICLO PERCORRENDO SO COM 1 ver se algum valor faça o total dos
// dados dps outro ciclo percorrendo 2
// fazendo 2 a 2 usando o bloqueio numeros dps 3 em 3 e dps em 4

        //PARA 1 NUMERO SELECONADO
        For ($i=1; $i<=9; $i++) {
            if ($i == $somaDados and $i <> $numerosBloqueados) {
                return true;
            }


        }

        //PARA 2 NUMEROS SELECIONADOS
        For ($i=1; $i<=9; $i++){
            For ($i2=1;$i2<=9; $i2++){
                if ($i <>$numerosBloqueados and $i2 <>$numerosBloqueados) {
                    $totalvalor = $i + $i2;
                }
                    if ($totalvalor == $somaDados){
                        return true;
                    }


            }
        }
        //PARA 3 NUMEROS SELECIONADOS
        For ($i=1; $i<=9; $i++) {
            For ($i2 = 1; $i2 <= 9; $i2++) {
                 For ($i3 = 1; $i3 <= 9; $i3++) {
                    if ($i <> $numerosBloqueados and $i2 <> $numerosBloqueados and $i3 <> $numerosBloqueados) {
                $totalvalor = $i + $i2 + $i3;
                    }
                    if ($totalvalor == $somaDados) {
                        return true;
                     }
                }
            }
        }

        //PARA 4 NUMEROS SELECIONADOS
        For ($i=1; $i<=9; $i++) {
            For ($i2 = 1; $i2 <= 9; $i2++) {
                For ($i3 = 1; $i3 <= 9; $i3++) {
                    for ($i4 = 1; $i4 <= 9; $i4++) {
                        if ($i <> $numerosBloqueados and $i2 <> $numerosBloqueados and $i3 <> $numerosBloqueados and $i4<>$numerosBloqueados) {
                            $totalvalor = $i + $i2 + $i3+ $i4;
                        }
                        if ($totalvalor == $somaDados) {
                            return true;
                        }
                    }
                }
            }
        }


    }
    //SOMA OS NUMEROS ATIVOS
    public function somaNumerosAtivos()
    {
        $soma=0;
        foreach($this->numerosBloqueados as $numeroblock => $num_value) {

            if ($num_value == false) {

                $soma += $numeroblock;
            }
        }

        return $soma;
        //somar os que estão desbloqueados (portanto os que estão a false)
        //retornar o valor da soma para fora
    }

}