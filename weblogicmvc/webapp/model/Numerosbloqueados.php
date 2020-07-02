<?php


class Numerosbloqueados
{
    private $numerosBloqueados; /*TEM QUE SER ARRAY*/

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



    public function bloquearNumero($numeroEscolhido,$somaDados){
        //colocar os numeros a true
        //somaDados = 7
        //numeroEscolhido = [2,5]
        $valor=0;
        foreach($numeroEscolhido as $numero){
            \Tracy\Debugger::barDump($numero, "Dentro do NumerosBloqueado, primeiro foreach");
            //$numero = 5
            /*if ($numero<$somaDados)
            {
                $valor += $numero;
                continue;
            }
            else if ($numero>$somaDados)
            {
                return false;
            }
            else {
                $numerosBloqueados[$numero] = true;
            }*/
            if($numero<=$somaDados){
                $valor+=$numero;
            }
        }
        \Tracy\Debugger::barDump($valor, "Soma dos numerosEscolhidos");
        if($valor==$somaDados){
            foreach ($numeroEscolhido as $n){
                $this->numerosBloqueados[$n] = true;
            }
            \Tracy\Debugger::barDump($this->numerosBloqueados, "Dentro do NumerosBloqueado, primeiro foreach");
            return true;
        }else {
            \Tracy\Debugger::barDump("Dentro do NumerosBloqueado, no else");
            return false;
        }

    }


    public function checkFinalJogada($somaDados,$numerosBloqueados)
    {



        //CODIGO PARA A SOMA DOS NUMEROS DAR A VARIAVEL $somadado
        if ($somaDados==1){

        }
        if ($somaDados==2){

        }
        if ($somaDados==3){

        }
        if ($somaDados==4){

        }
        if ($somaDados==5){

        }
        if ($somaDados==6){

        }
        if ($somaDados==7){

        }
        if ($somaDados==8){

        }
        if ($somaDados==9){

        }

        //SOMA OS NUMEROS DO JOGADOR 1
       /* if ($Jogador1==true) {
            if ($somaDados > $numerosBloqueados) {
                $this->somaNumerosAtivos();
            }

            else
            {
                $this->tabuleiro->checkFinalJogadaP1();
            }
        }
        // SOMA OS NUMEROS DO JOGADOR 2
        if ($Jogador2==true) {
            if ($somaDados > $numerosBloqueados)
            {
                $this->somaNumerosAtivos();
            }
            else
                {
                    $this->tabuleiro->numerosBloqueadosP2();
                }
            //consoante os numeros que tenho desbloqueados e a soma dos dados verificar se ainda é possivel jogar.

        }*/


    }
    //SOMA OS NUMEROS ATIVOS
    public function somaNumerosAtivos()
    {
        $soma=0;
        foreach($this->numerosBloqueados as $numeroblock => $num_value) {
            \Tracy\Debugger::barDump($numeroblock, 'numeroBlock');
            if ($num_value == false) {
                \Tracy\Debugger::barDump($soma, 'soma dos numeros desbloqueados');
                $soma += $numeroblock;
            }
        }

        return $soma;
        //somar os que estão desbloqueados (portanto os que estão a false)
        //retornar o valor da soma para fora
    }

}