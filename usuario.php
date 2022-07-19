<?php

    if($_REQUEST["action"] == "save")
    {

        $formValid = TRUE;

        $tamanho_nome = strlen($_POST["campo_nome"]);
        if($tamanho_nome <5 || $tamanho_nome >64)
        {

                echo ("o campo 'Nome' deve ter entre 5 e 64 caracteres.".$tamanho_nome);
                $formValid = FALSE;


        }
        $idade = (int)$_POST["campo_idade"];
        if(is_NaN($idade) || $idade <4 || $idade > 120)
        {
            echo ("O campo 'Idade' deve ser preenchido corretamente. ");
            $formValid = FALSE;

        }
        $email = $_POST['campo_email'];
        $regex = "/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9]+\.[a-z]{2,30}$/";
        if(!preg_match($regex, $email))
        {
            echo("O campo 'E-mail' deve ter preenchido corretamente. ");
            $formValid = FALSE;

        }

        $sexo = $_POST["CAMPO_SEXO"];
        if($sexo != "masculino" && $sexo != "feminino")
        {

            echo("O campo 'Sexo' deve ser preenchido. ");
            $formValid = FALSE;
        }

        $curso = $_POST["campo_curso"];
        if($curso == "" || $curso == "Selecione...")
        {

            echo("O Campo 'Curso' deve ser preenchido. ");
            $formValid = FALSE;

        }

        $conhecimentos = $_POST['campo_conhecimentos'];
        if(sizeof($conhecimentos) != 2)
        {

            echo ("É necessário marcar 2 opções. ");
            $formValid = FALSE;

        }

        if($formValid)
        {

            echo "Formulario preenchido com sucesso...";
            exit();

        }

    }

?>
<html>

<head>
        <title>Formulario - exemplo 1 </title>
        <script language="JavaScript">
        
            function validaForm(){

                var tamanho_nome = document.forms["meuForm"].campo_nome.value.length;
                if(tamanho_nome < 5  || tamanho_nome > 64){

                        alert( " O campo 'Nome' deve estar entre 5 e 64 caracteres. ");
                        return FALSE;


                }
                
                var idade = document.forms["meuForm"].campo_idade.value;
                if(isNaN(idade) || idade < 4 || idade > 120)
                {

                    alert (" O campo 'Idade' deve ter preenchido corretamente. ");
                    return FALSE;

                }

                var email = document.forms["meuForm"].campo_email.value;
                if(email.length < 5 || email.length > 128 || email.indexOf('@') == -1 || email.indexOf('.') == -1)
                {

                    alert( " O campo 'E-mail' deve ter preenchimento corretamente. " );
                    return FALSE;
                }
                
              
                    var campo_sexo = document.forms["meuForm"].CAMPO_SEXO;
                    var sexo = FALSE;
                    for (i = 0; i<campo_sexo.length; i++)
                    {
                            if(campo_sexo[i].checked == TRUE)
                            {

                                sexo = campo_sexo[i].value;
                                break;

                            }
                    }
                    if(sexo == FALSE)
                    {
                        alert(" O campo 'Sexo' deve ser preenchido .");
                        return FALSE;
                    }
            
                var opcao_curso = document.forms["meuForm"].campo_curso.selectedIndex;
                if(opcao_curso == 0)
                {

                    alert(" O Campo 'Curso' deve ser preenchido. ");
                    return FAlSE;

                }
                
                var conhecimentos = document.forms["meuForm"].elements['campo_conhecimentos[]'];
                var conhecimentosMarcados =  0;
                for(i = 0; i < conhecimentos.length; i++)
                {
                    if(conhecimentos[i].checked == TRUE)
                    {

                        conhecimentosMarcados++;

                    }

                }
                if(conhecimentosMarcados != 2)
                {

                    alert(" É necessário marcar conhecimentos. ");
                    return FALSE;

                }

                document.forms["meuForm"].submit();
                //return TRUE;

            }
        
        </script>
</head>

<body>

    <form method="POST" action="?action=save" name="meuForm">

        Nome:   <input type="text" name="campo_nome"   value="<? echo $_POST['campo_nome'];    ?>"><br><br>
        Idade:  <input type="text" name="campo_idade"  value="<? echo $_POST['campo_idade'];   ?>"><br><br>
        E-mail: <input type="text" name="campo_email"  value="<? echo $_POST['campo_email'];   ?>"><br><br>
        Sexo:   <input type="radio" name="CAMPO_SEXO"  value="masculino" <?php if ($_POST['CAMPO_SEXO'] == 'masculino'){echo 'checked';}?>> Masculino
                <input type="radio" name="CAMPO_SEXO"  value="feminino" <?php if  ($_POST['CAMPO_SEXO'] == 'feminino') {echo 'checked';}?>> Feminino

        <br><br>
        Curso: <select name="campo_curso">
                <option selected>Selecione...</option>
                <option> Ciencia da computação </option>
                <option> Bacharelado em Informática </option>
                <option> Engenharia da computação </option>
               </select>

        <br><br>
        Conhecimentos:
        <input type="checkbox" name="campo_conhecimentos[]" value="word"> Microsoft word
        <input type="checkbox" name="campo_conhecimentos[]" value="html"> HTML
        <input type="checkbox" name="campo_conhecimentos[]" value="js"> Javascript
        <input type="checkbox" name="campo_conhecimentos[]" value="php"> PHP

        <br><br>
        <input type="reset" value="Limpar">&nbsp;
        <input type="button" onClick="validaForm();" value="Enviar">

    </form>

</body>

</html>
