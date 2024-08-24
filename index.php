<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>FanFlix</title>
</head>

<body>
    <main class="pagina-principal">
        <div class="title">
            <h1 id="home">FanFlix</h1>
        </div>
        <div class="principal">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="movies/imagens/Furiosa+A+Mad+Max+Saga+Horizontal+2.jpeg" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="movies/imagens/ISO_600x400_Mobile.png" class="img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="movies/imagens/Joker-Folie-a-Deux-Coringa-2.jpg" class="img-fluid">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <h2 id="lancamento">Adicionado Recentemente</h2>

                <section>
                    <?php
                    $directory = 'movies/'; // Diretório onde estão os arquivos HTML

                    // Verifica se o diretório existe
                    if (is_dir($directory)) {
                        // Lê os arquivos do diretório
                        $files = scandir($directory);

                        // Filtra os arquivos HTML
                        $htmlFiles = array_filter($files, function ($file) use ($directory) {
                            return pathinfo($directory . $file, PATHINFO_EXTENSION) === 'html';
                        });

                        // Exibe a lista de arquivos HTML com título e imagem
                        if (!empty($htmlFiles)) {
                            echo "<ul>";
                            foreach ($htmlFiles as $file) {
                                $filePath = $directory . $file;
                                $fileContent = file_get_contents($filePath);

                                // Extrai o título usando regex para capturar o conteúdo entre <h1></h1>
                                preg_match('/<h1>(.*?)<\/h1>/', $fileContent, $titleMatches);
                                $title = $titleMatches[1] ?? 'Sem título';

                                // Extrai o caminho da imagem usando regex para capturar o atributo src da tag <img>
                                preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $fileContent, $imgMatches);
                                $imgSrc = $imgMatches[1] ?? 'Sem imagem';

                                // Verifica se o caminho da imagem é relativo e adiciona o diretório correto
                                if ($imgSrc !== 'Sem imagem' && strpos($imgSrc, 'http') !== 0) {
                                    $imgSrc = $directory . $imgSrc;
                                }

                                // Remove a extensão .html do nome do arquivo
                                $fileNameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);

                                // Exibe o título, imagem e link para o arquivo
                                echo "<li class='col'>";
                                echo "<a href='$filePath'><img src='$imgSrc'>$title</a>";

                                echo "</li><br>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Nenhum arquivo HTML encontrado na pasta $directory.";
                        }
                    } else {
                        echo "O diretório $directory não existe.";
                    }
                    ?>
                </section>
                <h2 id="series">Séries</h2>
                <section>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                </section>
                <h2 id="filmes">Filmes</h2>
                <section>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                </section>
                <h2 id="documentarios">Documentários</h2>
                <section>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                </section>
                <h2 id="TV">TV</h2>
                <section>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/joker.jpg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/furiosa.jpeg"></a>
                    </div>
                    <div class="col">
                        <a href=""><img src="movies/imagens/divertida.jpg"></a>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <nav class="nav">
        <ul class="navbar-nav">
            <li class="more">
                <section>+</section>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#lancamento">Lançamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#series">Séries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#filmes">Filmes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#documentarios">Documentários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#TV">TV</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastrarSite.html">Criar Page</a>
            </li>
        </ul>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>