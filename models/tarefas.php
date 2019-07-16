<?php
class Tarefas extends model {

	public function listar() {
		$array = array();

		$sql = "SELECT * FROM tarefas";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function addTarefa($titulo) {
		$sql = "INSERT INTO tarefas (titulo) VALUES (:titulo)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":titulo", $titulo);
		$sql->execute();

	}

	public function delTarefa($id) {
		$sql = "DELETE FROM tarefas WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function updateStatus($status, $id) {
		$sql = "UPDATE tarefas SET status = :status WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

}