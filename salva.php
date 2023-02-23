<?php 
    //Recebe os dados com as alterações feitas
    $id = filter_input(INPUT_POST, 'ID');
    $novoNomeLivro = filter_input(INPUT_POST, 'LIVRO');
    $novoNomeAutor = filter_input(INPUT_POST, 'AUTOR');
    $novoNomeEditora = filter_input(INPUT_POST, 'EDITORA');

    //Estabelece a conexão com o mysql
    $conexao = mysqli_connect("localhost","root","","integracao");
    
    if( $conexao ){
        // Codigo sql que faz a alteração no banco de dados
        $sql = mysqli_query($conexao, "UPDATE livros SET LIVRO='$novoNomeLivro', AUTOR='$novoNomeAutor', EDITORA='$novoNomeEditora' where id='$id';");
        if($sql){
            //se tudo deu certo, redireciona pra consulta.php com alteracao igual a true
            header("Location:consulta.php?alteracao=true");
        }else{
             //Se não deu certo, redireciona pra consulta.php com alteracao igual a false
            header("Location:consulta.php?alteracao=false");
            exit;
        }
    } else {
         //Se não deu certo, redireciona pra consulta.php com alteracao igual a false
        header("Location:consulta.php?alteracao=false");
        exit;
    }
?>
