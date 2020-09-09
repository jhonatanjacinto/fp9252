<?php


class ProjetoDAO
{
    public static function adicionar(Projeto $projeto) : bool
    {
        $db = new DB();
        $sql = "INSERT INTO portfolio (categoria_id, titulo, descricao, imagem, ativo) VALUES(?, ?, ?, ?, ?)";
        $params = array( 
            $projeto->getCategoria()->getId(),
            $projeto->getTitulo(),
            $projeto->getDescricao(),
            $projeto->getImagem(),
            $projeto->isAtivo()
        );
        return $db->execute($sql, 'isssi', $params);
    }

    public static function atualizar(Projeto $projeto) : bool
    {
        $db = new DB();
        $sql = "UPDATE portfolio SET categoria_id = ?, titulo = ?, descricao = ?, imagem = ?, ativo = ? WHERE projeto_id = ?";
        $params = array (
            $projeto->getCategoria()->getId(),
            $projeto->getTitulo(),
            $projeto->getDescricao(),
            $projeto->getImagem(),
            $projeto->isAtivo(),
            $projeto->getId()
        );
        return $db->execute($sql, 'isssii', $params);
    }

    public static function excluir(int $projeto_id) : bool 
    {        
        $db = new DB();
        $sql = "DELETE FROM portfolio WHERE projeto_id = ?";
        $params = array($projeto_id);
        return $db->execute($sql, "i", $params);
    }

    /**
     * @return Projeto[]
     */
    public static function getProjetos(bool $ativos_only = false) : array 
    {
        $lista_projetos = array();
        $db = new DB();

        if ($ativos_only) {
            $sql = "SELECT p.*, c.nome_categoria FROM portfolio AS p
            LEFT JOIN categorias AS c ON p.categoria_id = c.categoria_id
            WHERE p.ativo = 1
            ORDER BY p.data_projeto DESC";
        }
        else {
            $sql = "SELECT p.*, c.nome_categoria FROM portfolio AS p
            LEFT JOIN categorias AS c ON p.categoria_id = c.categoria_id
            ORDER BY p.data_projeto DESC";
        }

        $projetos_db = $db->query($sql);

        if ($projetos_db)
        {
            foreach ($projetos_db as $projeto_info)
            {
                $projeto = new Projeto();
                $projeto->setId((int) $projeto_info['projeto_id']);
                $projeto->setTitulo($projeto_info['titulo']);
                $projeto->setDescricao($projeto_info['descricao']);
                $projeto->setAtivo((bool)$projeto_info['ativo']);
                $projeto->setImagem($projeto_info['imagem']);
                $projeto->setDataProjeto($projeto_info['data_projeto']);
                $projeto->getCategoria()->setNome($projeto_info['nome_categoria'] ?? 'SEM CATEGORIA');
                
                array_push($lista_projetos, $projeto);
            }
        }

        return $lista_projetos;
    }

    public static function getProjetoPorId(int $projeto_id) : ?Projeto 
    {
        $db = new DB();
        $sql = "SELECT * FROM portfolio WHERE projeto_id = ?";
        $params = array( $projeto_id );
        $projeto_info = $db->query($sql, 'i', $params, true);

        if ($projeto_info)
        {
            $projeto = new Projeto();
            $projeto->setId((int) $projeto_info['projeto_id']);
            $projeto->setTitulo($projeto_info['titulo']);
            $projeto->setDescricao($projeto_info['descricao']);
            $projeto->setAtivo((bool)$projeto_info['ativo']);
            $projeto->setImagem($projeto_info['imagem']);
            $projeto->setDataProjeto($projeto_info['data_projeto']);
            
            if ($projeto_info['categoria_id']) {
                $projeto->getCategoria()->setId((int) $projeto_info['categoria_id']);
            }

            return $projeto;
        }

        return null;
    }
}