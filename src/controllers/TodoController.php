<?php
namespace src\controllers;

use \core\Controller;
use src\models\Todo;

class TodoController extends Controller { 

    /**
     * Função responsavel por criar uma tarefa via post 
     */
    public function create()
    {
       $txtTarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_SPECIAL_CHARS);  
       
       $tarefa = new Todo;
       
       $tarefa->setTarefa($txtTarefa); 
       
       if($tarefa->create()){
            $this->redirect('/');
       } 

    }

    /**
     * Função responsavel por retornar todas as tarefas em aberto no sistema
     */
    public function index()
    {
        $tarefa = new Todo; 
        $data = $tarefa->getAll();

        $this->render('home', ['data' => $data]);
    }

    /**
     * Função responsavel excluir uma tarefa 
     */
    public function excluir($args)
    {
        $tarefa = new Todo; 
        $data = $tarefa->excluir($args);

        $this->redirect('/');


    }
}