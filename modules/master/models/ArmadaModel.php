<?php

class ArmadaModel extends Model{

	public function get_data()
	{
		$sql = "SELECT * FROM `tblarmada` WHERE status='Y'";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function getID($id)
	{
		$sql = "SELECT * FROM `tblarmada` WHERE status='Y' and id_ar='".$id."'";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function kodeauto()
	{
		
	}

	public function deleteData($id)
	{
		$query = $this->db->update('tblarmada', array('status' => 'T'), array('id_ar' => $id));
		return $query;
	}

	public function saveData($data)
	{
		$query = $this->db->insert('tblarmada', $data);
		return $query;
	}

	public function updateData($data, $id)
	{
		$query = $this->db->update('tblarmada', $data, array('id_ar' => $id));
		return $query;
	}
}