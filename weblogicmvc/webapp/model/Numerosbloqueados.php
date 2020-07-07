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



    public function bloquearNumero($numeroEscolhido){
        \Tracy\Debugger::barDump($numeroEscolhido);
        $this->numerosBloqueados[$numeroEscolhido]=true;
        \Tracy\Debugger::barDump($this->numerosBloqueados);

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
            //CODIGO PARA A SOMA DOS NUMEROS DAR A VARIAVEL $somadado
            if ($somaDados == 2) {

            }
            if ($somaDados == 3) {

            }
            if ($somaDados == 4) {

            }
            if ($somaDados == 5) {

            }
            if ($somaDados == 6) {

            }
            if ($somaDados == 7) {

            }
            if ($somaDados == 8) {

            }
            if ($somaDados == 9) {

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