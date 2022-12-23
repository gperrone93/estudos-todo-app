<?php
namespace src\models;
use \core\Model;

class Todo extends Model {

    private $id; 
    private $tarefa; 

    /**
     * Retorna o ID
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Configura o ID
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Retorna a tarefa
     */ 
    public function getTarefa()
    {
        return $this->tarefa;
    }

    /**
     * Configura a Tarefa
     */ 
    public function setTarefa($tarefa)
    {
        $this->tarefa = $tarefa;

        return $this;
    }

    /**
     * Função responsavel por cadastrar uma tarefa
     */
    public function create()
    {
        $data = self::insert([
            'tarefa' => $this->tarefa
        ])->execute(); 
        
        if(isset($data) and !empty($data)) {

            $this->setId($data);
            return true;

        }

        return false;
        
    }

    /**
     * Função responsavel por trazer todas as tarefas cadastradas e setadas como ativas
     */
    public function getAll() {
        return self::select()
                    ->where('ativo', 1)
                    ->orderBy('id', 'desc')
                    ->get();
    }

    /**
     * Método responsavel por setar uma tarefa como concluída. 
     */
    public function excluir($id) {

        return self::update()->set('ativo', 0)->where('id', $id)->execute();
        
    }
}