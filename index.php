<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Notícias da ana</title>
</head>
<body class="body">
    <?php
        $conexao = mysqli_connect("127.0.0.1","root","");
        mysqli_select_db($conexao,"noticias");
        mysqli_set_charset($conexao, "UTF8");

        $query_manchete = mysqli_query($conexao,"SELECT imagens.nomeimagem, textos.corpo, textos.data, textos.titulo, textos.subtitulo FROM noticia INNER JOIN imagens ON noticia.codigo_imagens = imagens.codigo_imagem INNER JOIN textos ON noticia.codigo_texto = textos.codigo_texto ORDER BY cod_noticia ASC LIMIT 1;");
        $query_noticias = mysqli_query($conexao,"SELECT imagens.nomeimagem, textos.corpo, textos.data, textos.titulo, textos.subtitulo FROM noticia INNER JOIN imagens ON noticia.codigo_imagens = imagens.codigo_imagem INNER JOIN textos ON noticia.codigo_texto = textos.codigo_texto ORDER BY cod_noticia DESC LIMIT 2;");

        while($exibe_principal = mysqli_fetch_array($query_manchete)){
           echo ' <link href="css/style.css" rel="stylesheet" type="text/css">';
            echo 
            '<div class="wraaper">
                <div class="header">
                    <div><a class="text">Notícias d </a></div>
                </div>
                <div class="notice">
                    <div class="image">
                        <img src="./img/'.$exibe_principal[0].'" style= "width: 100%; border-radius: 1vw; height: 100%">
                    </div>
                    <div class="text-notice">
                        <b style="font-size: 2vw; font-family:"Georgia"">'.$exibe_principal[3].'</b><br>
                        <a style="font-size: 1.5vw">'.$exibe_principal[4].'</a><br>
                        <div style="margin-top: 10px; width: 35vw; text-align: justify; margin-left: 15px">
                        <a style="font-size: 1.5vw; padding: 10px">'.$exibe_principal[1].'</a>
                        </div>
                    </div>
                </div>
                <div class="other-notices">
                ';
                while($exibe_secundarias = mysqli_fetch_array($query_noticias)){
                echo '
                    <div class="information">
                        <img src="./img/'.$exibe_secundarias[0].'" style= "width: 30%; border-radius: 1vw; height: 100%">
                        <div style="display: flex; flex-direction: column; margin-left: 2%">
                            <b style="font-size: 2vw">'.$exibe_secundarias[3].'</b>
                            <a style="font-size: 1.5vw">'.$exibe_secundarias[4].'</a>
                        </div>
                    </div>';
                };
        echo '
            </div>
                </div>';      
            ;    
           
        }
    ?>
    
</body>
</html>