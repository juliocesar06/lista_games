<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Jogos</title>

</head>
<body>
    <?php require_once "includes/banco.php";
          require_once "includes/funcoes.php";
          $ordem =$_GET['o'] ?? 'n';
          
          ?>
    <div id="corpo">
        <h1>Escolha seu Jogo:</h1>
        <form method="get" id="busca" action="index.php">
            Ordenar:
            <a href="index.php?o=n">Nome</a>|
            <a href="index.php?o=p">Produtora</a>|
            <a href="index.php?o=n1">Maior Nota</a>|
            <a href="index.php?o=n2">Menor nota</a>|
        
            Buscar: <input type='texto' name='c' size='10' maxlength='40'/>
                    <input type="submit" value='ok'/>
            
        </form>
        <table class='listagem'>
            <?php 
               $q = "select  j.cod,j.nome,g.genero,p.produtora,j.capa from jogos j join genero g on j.genero =g.cod join produtora p on j.produtora = p.cod  ";
               switch ($ordem)
               {
                   case 'p':
                   {
                        $q .="order by p.produtora";
                        break;
                   }
                   case 'n1':
                   {
                        $q .= "order by j.nota desc";
                        break;
                   }
                    case 'n2':
                    {
                        $q .= "order by j.nota asc";
                        break;
                    }
                    default:
                    {   
                        $q .= "order by j.nome";
                        break;
                    }
               }
               
               $busca=$banco->query($q);
               if(!$busca)
               {
                   echo("<tr><td>Infelizmente a busca  deu errado");
               }
               else
               {
                   if($busca->num_rows == 0)
                   {
                       echo "<tr><td>Nenhum registro encontrado";
                   }
                   else
                   {
                        while($reg = $busca->fetch_object())
                        {
                            $t = thumb($reg->capa);
                            echo "<tr><td><img src='fotos/$reg->capa' class='mini'>";
                            echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            echo "[$reg->genero]";
                            echo "<br>$reg->produtora";
                            echo "<td>Adm";

                        }
                   }
               }
            ?>
      
        </table>
    </div>
    <?php $banco->close();?>
</body>
</html>