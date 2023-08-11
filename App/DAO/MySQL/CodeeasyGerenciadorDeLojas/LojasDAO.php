<?php

namespace App\DAO\MySQL\CodeeasyGerenciadorDeLojas;

use App\Models\MySQL\CodeeasyGerenciadorDeLojas\LojaModel;

class LojasDAO extends Conexao
{
    public function __construct()
    {
        // parent::__construct(); = EXECUTAR O CONSTRUTOR DA CLASSE PAI
        /**
         * COMO CONEXÃO NÃO PODE SER INSTANCIADA, O CONSTRUTOR DELA NUNCA VAI SER EXECUTADO
         * ENTÃO DEVEMOS CHAMAR O "parent::__construct();" EM TODOS OS DAOS QUE FORMOS CONSTRUIR
         * CHAMANDO O parent::__construct(); ELE VAI EXECUTAR TODO O CÓDIGO DO CONSTRUTOR DA CLASSE EXTENDIDA
         * E COM ISSO VAI CONFIGURAR O PDO PARA UTILIZARMOS
         */
        parent::__construct();

        $this->pdo;
    }

    public function getAllLojas(): array
    {
        $lojas = $this->pdo
            ->query('SELECT 
                            id, 
                            nome,
                            telefone,
                            endereco
                        FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }

                        // $loja = PARÂMETROS DO MODEL 
    public function insertLojas(LojaModel $loja): void // void pq nao retorna nada, apenas insere
    {
        $stmt = $this->pdo
            ->prepare('INSERT INTO lojas VALUES(
                        null, 
                        :nome,
                        :telefone,
                        :endereco
                    )');
        $stmt->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }
}
