<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $texto = $_POST['texto'];
    $texto2 = $_POST['texto2'];
    $rate = $_POST['rate'];
    $linktrailer = $_POST['linktrailer'];
    $classificacao = $_POST['classificação'];

    date_default_timezone_set('America/Sao_Paulo');
    $dataHoraServidor = date('d/m/Y H:i');

    switch ($classificacao) {
        case '18+':
            $backgroundColor = 'black';
            break;
        case '16':
            $backgroundColor = 'red';
            break;
        case '12':
            $backgroundColor = 'yellow';
            break;
        case '14':
            $backgroundColor = 'orange';
            break;
        default:
            $backgroundColor = 'green'; 
    }

    // Processa a imagem enviada
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $photoName = basename($photo['name']);
        $targetDir = "imagens/";
        $targetFile = $targetDir . $photoName;

        // Verifica se o diretório existe, caso contrário, cria-o
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($photo['tmp_name'], $targetFile)) {
            $photoPath = $targetFile;
        } else {
            echo "Erro ao fazer upload da imagem.";
            $photoPath = "Sem img";
        }
    } else {
        $photoPath = "Sem img";
    }

    // Formata o nome do arquivo removendo espaços e caracteres especiais
    $fileName = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', $title)) . ".html";

    // Cria o conteúdo do novo arquivo HTML com a estrutura e estilo desejados
    $content = "

    <html>\n
    <meta charset='UTF-8'>\n
    <head>\n
    <title>$title</title>\n
    <link rel='stylesheet' href='style-page.css'>
    
    <div class='sidebar'>\n
    <a href='../index.php'>Home</a>\n
    </div>";
    $content .= "<div class='main'>\n";
    $content .= "<div class='imagem'><img src='$photoPath' alt='$title'></div>\n
    <br><br>
    ";
    $content .= "
    <h1>$title</h1>\n
    <br>
    <div style='background-color: $backgroundColor;' class='classificacao'>$classificacao</div>
    <br>
    <p>Avaliação: $rate</p>\n 
    <p class='texto'>$texto</p>\n

    <iframe width='560' height='315' src='$linktrailer' frameborder='0' allow='accelerometer;clipboard-write; encrypted-media' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen>
    </iframe>\n

    <p class='texto'>$texto2</p>\n

    <p>Publicado em: $dataHoraServidor</p>\n

    </div>\n
    </body>\n
    </html>
    ";

    $filePath = "movies/" . $fileName;

    // Salva o novo arquivo HTML
    if (file_put_contents($filePath, $content)) {
        echo "Arquivo criado com sucesso! <a href='$filePath'>Ver Arquivo</a>";

    } else {
        echo "Erro ao criar o arquivo.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>