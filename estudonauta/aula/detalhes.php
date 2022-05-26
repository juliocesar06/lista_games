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
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <div id="corpo">
        <?php 
            $c = $_GET['cod'] ?? 0;
            $busca =  $banco->query("select * from jogos where cod='$c'");

        ?>
        <h1>Detalhes do Jogo </h1>
        <table class ='detalhes'>
            <?php 
                if(!$busca)
                {
                    echo "<tr><td>busca falhou $banco->error";
                } 
                else
                {
                    if ($busca->num_rows == 1)
                    {
                        $reg = $busca->fetch_object();
                        echo "<td>Nota: $reg->nota";
                        echo "<tr><td rowspan='3'><img src='fotos/$reg->capa' class='grande'>";
                        
                        echo "<td style='font-weight:bold; font-size:25px'>$reg->nome</strong>";
                        echo "<tr><td>$reg->descriçao";
                        echo "<tr><td>Admin";

                    }
                    else
                    {
                        echo "<tr><td>Busca falhou ";
                    }
                    
            }?>
      
            </table>
            <a href='index.php'><img src="icones/icoback.png" alt="voltar" class='icon'></a>
    </div>
</body>
</html>