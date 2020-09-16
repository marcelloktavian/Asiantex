<?php

class ArmadaModel extends Model{

	public function get_data()
	{
		$sql = "SELECT * FROM `tblarmada` ORDER BY status DESC, substring(id_ar,6,2) ASC, substring(id_ar,4,2) ASC, substring(id_ar,9,4) ASC";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function getID($id)
	{
		$sql = "SELECT * FROM `tblarmada` WHERE id_ar='".$id."'";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function kodeauto()
	{
		$sql = "SELECT CONCAT('MA/', IF(MONTH(CURRENT_DATE)<10, CONCAT('0',MONTH(CURRENT_DATE)), MONTH(CURRENT_DATE)), SUBSTRING(YEAR(CURRENT_DATE),3,2),'/', (CASE WHEN length(IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) = '1' THEN CONCAT('000', IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) WHEN length(IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) = '2' THEN CONCAT('00', IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) WHEN length(IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) = '3' THEN CONCAT('0', IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) WHEN length(IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1)) = '4' THEN IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1) END)) as awal ,IFNULL(MAX(SUBSTRING(id_ar, 9, 4))+1, 1) AS id FROM tblarmada WHERE (SUBSTRING(id_ar,6,2)=SUBSTRING(YEAR(CURRENT_DATE),3,2)) and (SUBSTRING(id_ar,4,2)=MONTH(CURRENT_DATE))";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function deleteData($id, $stat)
	{
		if ($stat=="Y") {
			//Menonaktifkan
			$query = $this->db->update('tblarmada', array('status' => 'N'), array('id_ar' => $id));
		} else {
			//Mengaktifkan
			$query = $this->db->update('tblarmada', array('status' => 'Y'), array('id_ar' => $id));
		}
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