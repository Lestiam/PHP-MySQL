<?php

class ProdutoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['preco']);
    }

    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC); //fetchAll: é o mesmo que falar, olha PHP, me retorna tudo que vc tem. FETCH_ASSOC = me retorna um array associativo, ou seja, a chave de cada valor vai ser correspondente a coluna no banco de dados, ou seja, a coluna tipo vai ser uma chave no array, nome outra chave, etc

        $dadosCafe = array_map(function ($cafe){
            return $this->formarObjeto($cafe);
        }, $produtosCafe);

        //ensinamos ao array_map o que ele vai fazer para cada um dos elementos desse array. O primeiro parmetro dele é um callback(return), o segundo parametro é qual array que irá receber essa manipulação. Ele cria um array de objetos

        return $dadosCafe;
    }

    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function ($almoco){
            return $this->formarObjeto($almoco);
        },$produtosAlmoco);

        return  $dadosAlmoco;
    }
}