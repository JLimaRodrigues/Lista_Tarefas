<?php 

//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa){
		$this->conexao = $conexao->conectar();
		$this->tarefa  = $tarefa;
	}

	//MÉTODO RESPONSÁVEL POR INSERIR NOVAS TAREFAS NO BANCO
	public function inserir(){//create
		$query = 'INSERT INTO tb_tarefas(tarefa) VALUES (:tarefa)';
		//$query->bindValue('tarefa', $this->tarefa);
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar(){//read
		$query = 'SELECT t.id, t.id_status, t.tarefa, s.status FROM  tb_tarefas t LEFT JOIN tb_status s ON (t.id_status = s.id)';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function atualizar(){//update
		$query = 'UPDATE tb_tarefas SET tarefa =:tarefa WHERE id=:id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function remover(){//delete
		$query = 'DELETE FROM tb_tarefas WHERE id=:id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}


	public function marcarRealizada(){//update
		$query = 'UPDATE tb_tarefas SET id_status =:id_status WHERE id=:id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function recuperarTarefasPendentes(){
		$query = 'SELECT t.id, t.id_status, t.tarefa, s.status FROM  tb_tarefas t LEFT JOIN tb_status s ON (t.id_status = s.id) WHERE t.id_status = :id_status';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status',$this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll();
	}
}


?>