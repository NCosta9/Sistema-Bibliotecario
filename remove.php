<?php 
    //recebe o id dos dados que serão apagados
    $id = filter_input(INPUT_GET, "id");

    //estabelece a conexão
    $conexao = mysqli_connect("localhost","root","","integracao");
    if( $conexao ){
        // Codigo sql que deleta  no banco de dados
        $sql = mysqli_query($conexao, "DELETE FROM LIVROS where id='$id';");
        if($sql){
            //se tudo deu certo, redireciona pra exibe.php com remove igual a true
            header("Location:consulta.php?remocao=true");
        }else{
             //Se não deu certo, redireciona pra consulta.php com alteracao igual a false
            header("Location:consulta.php?remove=false");
            exit;
        }
    } else {
         //Se não deu certo, redireciona pra consulta.php com alteracao igual a false
        header("Location:consulta.php?remove=false");
        exit;
    }
    
?>