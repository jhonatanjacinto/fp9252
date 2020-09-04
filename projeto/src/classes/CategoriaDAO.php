<?php


class CategoriaDAO
{
    public static function adicionar(Categoria $categoria) : bool
    {
        $db = new DB();
        $sql = "INSERT INTO categorias (nome_categoria) VALUES(?)";
        $params = array( $categoria->getNome() );
        return $db->execute($sql, 's', $params);
    }

    public static function atualizar(Categoria $categoria) : bool
    {
        $db = new DB();
        $sql = "UPDATE categorias SET nome_categoria = ? WHERE categoria_id = ?";
        $params = array (
            $categoria->getNome(),
            $categoria->getId()
        );
        return $db->execute($sql, 'si', $params);
    }

    public static function excluir(int $categoria_id) : bool 
    {        
        $db = new DB();
        $sql = "DELETE FROM categorias WHERE categoria_id = ?";
        $params = array($categoria_id);
        return $db->execute($sql, "i", $params);
    }

    /**
     * @return Categoria[]
     */
    public static function getCategorias() : array 
    {
        $lista_categorias = array();
        $db = new DB();
        $sql = "SELECT * FROM categorias ORDER BY nome_categoria ASC";
        $categorias_db = $db->query($sql);

        if ($categorias_db)
        {
            foreach ($categorias_db as $categoria_info)
            {
                $categoria = new Categoria();
                $categoria->setId((int) $categoria_info['categoria_id']);
                $categoria->setNome($categoria_info['nome_categoria']);
                array_push($lista_categorias, $categoria);
            }
        }

        return $lista_categorias;
    }

    public static function getCategoriaPorId(int $categoria_id) : ?Categoria 
    {
        $db = new DB();
        $sql = "SELECT * FROM categorias WHERE categoria_id = ?";
        $params = array( $categoria_id );
        $categoria_info = $db->query($sql, 'i', $params, true);

        if ($categoria_info)
        {
            $categoria = new Categoria();
            $categoria->setId((int)$categoria_info['categoria_id']);
            $categoria->setNome($categoria_info['nome_categoria']);
            return $categoria;
        }

        return null;
    }
}