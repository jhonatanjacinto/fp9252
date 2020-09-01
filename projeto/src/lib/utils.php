<?php

    /**
     * Função que auxilia no debug de variáveis da aplicação
     * @param mixed $variavel   Variável cuja estrutura deve ser exibida no debug
     * @return void
     */
    function custom_print($variavel)
    {
        print '<pre>';
        print_r($variavel);
        print '</pre>';
    }

    /**
     * Corrige o caminho dos links de navegação do site
     * @param string $pagina    Página que a URL deve ser corrigida
     * @return string
     */
    function get_url(string $pagina)
    {
        return SITE_URL . $pagina;
    }

    /**
     * Retorna a estrutura do menu da área administrativa
     * @return array
     */
    function get_menu_admin()
    {
        return array(
            'home' => array('Home', get_url('admin/index.php')),
            'contatos' => array('Contatos', get_url('admin/contatos')),
            'depoimentos' => array('Depoimentos', get_url('admin/depoimentos')),
            'newsletter' => array('Newsletter', get_url('admin/newsletter')),
            'portfolio' => array('Portfolio', get_url('admin/portfolio')),
            'servicos' => array('Serviços', get_url('admin/servicos')),
            'time' => array('Time', get_url('admin/time')),
            'usuarios' => array('Usuários', get_url('admin/usuarios')),
        );
    }

    /**
     * Configura a mensagem de erro ou de sucesso a ser exibida pela aplicação
     * @param string $msg       Mensagem a ser exibida pela aplicação
     * @param string $classe    Classe CSS a ser aplicada no elemento HTML da mensagem
     * @param string $url       URL de redirecionamento (Por padrão redireciona para a página atual)
     * @param string $id        ID da mensagem na Sessão
     * @return void
     */
    function set_mensagem(string $msg, string $classe, string $url = '', string $id = 'msg')
    {
        $_SESSION[ $id ] = array(
            'mensagem' => $msg,
            'classe' => $classe
        );

        $url = $url ? $url : $_SERVER['REQUEST_URI'];

        header("Location: $url");
        exit();
    }

    /**
     * Retorna a mensagem guardada na sessão da aplicação
     * @param string $id    ID da chave na Sessão que contém a mensagem
     * @return array|null
     */
    function get_mensagem(string $id = 'msg')
    {
        $msg = $_SESSION[$id] ?? null;
        unset($_SESSION[$id]); // remove o dado da sessão

        return $msg;
    }