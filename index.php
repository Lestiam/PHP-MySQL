<?php

require "src/conexao-bd.php";
$sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
$statement =  $pdo->query($sql1);
$produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC); //fetchAll: é o mesmo que falar, olha PHP, me retorna tudo que vc tem. FETCH_ASSOC = me retorna um array associativo, ou seja, a chave de cada valor vai ser correspondente a coluna no banco de dados, ou seja, a coluna tipo vai ser uma chave no array, nome outra chave, etc

$sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
$statement =  $pdo->query($sql2);
$produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
<main>
    <section class="container-banner">
        <div class="container-texto-banner">
            <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
        </div>
    </section>
    <h2>Cardápio Digital</h2>
    <section class="container-cafe-manha">
        <div class="container-cafe-manha-titulo">
            <h3>Opções para o Café</h3>
            <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
        </div>
        <div class="container-cafe-manha-produtos">
            <?php foreach ($produtosCafe as $cafe): //abre o foreach?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= "img/" . $cafe['imagem'] ?>">
                    </div>
                    <p><?php echo $cafe['nome'] ?></p>
                    <p><?= $cafe['descricao'] ?></p>
                    <p><?= "R$ " . $cafe['preco'] ?></p>
                </div>
            <?php endforeach;//fecha o foreach ?>
        </div>
    </section>
    <section class="container-almoco">
        <div class="container-almoco-titulo">
            <h3>Opções para o Almoço</h3>
            <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
        </div>
        <div class="container-almoco-produtos">
            <?php foreach ($produtosAlmoco as $almoco): ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= "img/" . $almoco['imagem'] ?>">
                    </div>
                    <p><?= $almoco['nome'] ?></p>
                    <p><?= $almoco['descricao'] ?></p>
                    <p><?= "R$ " . $almoco['preco'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
</main>
</body>
</html>