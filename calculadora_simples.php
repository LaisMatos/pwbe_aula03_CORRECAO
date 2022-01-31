<?php

/* ### EXERCICIO AULA 03###
No PHP:
	--> Recuperar valores (GET/POST) do radio e caixas
	--> Tratar erros para caixa vazia e String
*/

	//Declaração de variaveis
$valor1=(double)0;
$valor2=(double)0;
$resultado=(double)0;
$opcaoRadio=(String) null;

	//Validação do botão 
if(isset($_POST['btncalc'])){
		
	//Recebe dados do formulário
	$valor1=$_POST['txtn1'];
	$valor2=$_POST['txtn2'];
	
	
	//tratamento da caixa vazia
	if ($_POST['txtn1']==""||$_POST['txtn2']=="") {
		echo('<script>alert("Por favor preencher todas as caixas!");</script>');
	}else{
		
		//validação de tratamento de erro para radio sem escolha
		if(iseet($_POST['rdocalc'])){
			echo('<script>alert("Por favor, escolha uma opção valida!");</script>');
		}else{

			//só podemos receber o valor do radio quando ele existir
			$opcaoRadio=strtoupper($_POST['rdocalc']);

			//calculo
			if ($opcaoRadio=='SOMAR') {
				$resultado=$valor1+$valor2;

			}elseif($opcaoRadio=='SUBTRAIR') {
				$resultado=$valor1-$valor2;

			}elseif($opcaoRadio=='MULTIPLICAR') {
				$resultado=$valor1*$valor2;

			}elseif ($opcaoRadio=='DIVIDIR') {
				$resultado=$valor1/$valor2;
			}
		}
	}
}


/*

**************  RESOLUÇÃO DO EXERCICIO _ MODELO II  ******************

###### Anotações ######


@Passo-a-Passo:											
-Primeiro: tratamento da caixa vazia.					
-Segundo: usar tag <alert>	para exibir msg de erro.	
-Terceiro: tratar o radio caso ele não esteja selecionado e indicar com <alert>
-Quarto: <$opcaoRadio> vai para dentro do <else> dos <calculo>

Atenção! Todo elemento radio quando não é selecionado ele não será submetido.Pois ele não existirá para o sistema.
Atenção! Veja se html existe uma atributo checked na tag <radio>.

*/


/* **************  RESOLUÇÃO DO EXERCICIO _ MODELO I  ******************
<?php
		//Declaração de variaveis
	$valor1=(double)0;
	$valor2=(double)0;
	$resultado=(double)0;
	$opcaoRadio=(String) null;

		//Validação do botão 
	if(isset($_POST['btncalc'])){
			
		//Recebe dados do formulário
		$valor1=$_POST['txtn1'];
		$valor2=$_POST['txtn2'];
		$opcaoRadio=strtoupper($_POST['rdocalc']);
		
		//calculo
		if ($opcaoRadio=='SOMAR') {
			$resultado=$valor1+$valor2;

		}elseif($opcaoRadio=='SUBTRAIR') {
			$resultado=$valor1-$valor2;

		}elseif($opcaoRadio=='MULTIPLICAR') {
			$resultado=$valor1*$valor2;

		}elseif ($opcaoRadio=='DIVIDIR') {
			$resultado=$valor1/$valor2;
		}
	}
?>
	###### Anotações ######

	@Passo-a-Passo:
	-Primeiro: mudar  o valor do atributo method na tag <form> de get ou para post.
	-Segundo: declarar variveis.
	-Terceiro: tratar botão. Nome de acordo com o html.
	-Quarto: relizar os calculos das operações matemáticas. Usei <if...else>
	-Quinto: printar resultado na tag <form> ao fim do html.

	Atenção! Declaração de variavel: o radio tem que seguir o value. Se não iver valor colocar NULL.
	Atenção! O que difere cada radio são os <value>.
	Atenção! No php <elseif> é diferente de <else if>, são dois tipos de processamentos dierentes.
	
	..................................................
	.@Curiosidade_01:								 .
	.<gettype> verifica o tipo do dado               .
	.<settype> forçar a mudança do tipo do dado      .
	.		Exemplo: $nome=10; -->integer            .
	.				 echo(gettype($nome));           .
	.				 settype($nome,"string");        .
	.				 echo(gettype($nome)); -->String .
	..................................................
	
	.........................................................
	.@Curiosidade_02:										.
	.<action> colocar o nome do arquivo						.
	.<strtoupper> permite converter um texto para MAIUSCULO .
	.<strtolower> permite converter um texto para minusculo .	 
	.........................................................
	
	.................................................
	.@Passo-a-passo	:								.
	.Duas formas de printar resultado				.
	.	Exemplo:						 			.
	.	--> <?=$resultado;?>						. 
	.	--> Resultado:<?php echo($resultado);?>		.
	.................................................
	*/
?>

<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="0" > <br>
						Valor 2:<input type="text" name="txtn2" value="0" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar">Somar <br> <!--Unica tag com <checked>-->
							<input type="radio" name="rdocalc" value="subtrair" >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" >Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
							<?=$resultado;?>

						</div>
						
				</form>
            </div>
           
        </div>
        
		
	</body>

</html>