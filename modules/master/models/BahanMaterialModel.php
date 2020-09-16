<?php

class BahanMaterialModel extends Model{

	public function get_data()
	{
		$sql = "SELECT *, CONCAT('Rp.', REPLACE(FORMAT(`harga`,0),',','.')) AS harga2 FROM `tblmaterial`  ORDER BY STATUS DESC, SUBSTRING(id_mt,7,2) ASC, SUBSTRING(id_mt,5,2) ASC, SUBSTRING(id_mt,10,4) ASC";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function getID($id)
	{
		$sql = "SELECT * FROM `tblmaterial` WHERE id_mt='".$id."'";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function getSatuan()
	{
		$sql = "SELECT * FROM tblsat ORDER BY nama ASC";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}
	
	public function kodeauto()
	{
		$sql = "SELECT CONCAT('GSP/', IF(MONTH(CURRENT_DATE)<10, CONCAT('0',MONTH(CURRENT_DATE)), 
		MONTH(CURRENT_DATE)), SUBSTRING(YEAR(CURRENT_DATE),3,2),'/', 
		(CASE WHEN LENGTH(IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) = '1' 
		THEN CONCAT('000', IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) 
		WHEN LENGTH(IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) = '2' 
		THEN CONCAT('00', IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) 
		WHEN LENGTH(IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) = '3' 
		THEN CONCAT('0', IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) 
		WHEN LENGTH(IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1)) = '4' 
		THEN IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1) END)) AS awal ,
		IFNULL(MAX(SUBSTRING(id_mt, 10, 4))+1, 1) AS id 
		FROM tblmaterial 
		WHERE (SUBSTRING(id_mt,7,2)=SUBSTRING(YEAR(CURRENT_DATE),3,2)) AND (SUBSTRING(id_mt,5,2)=MONTH(CURRENT_DATE))";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	public function deleteData($id, $stat)
	{
		if ($stat=="Y") {
			//Menonaktifkan
			$query = $this->db->update('tblmaterial', array('status' => 'N'), array('id_mt' => $id));
		} else {
			//Mengaktifkan
			$query = $this->db->update('tblmaterial', array('status' => 'Y'), array('id_mt' => $id));
		}
		return $query;
	}

	public function saveData($data)
	{
		$query = $this->db->insert('tblmaterial', $data);
		return $query;
	}

	public function updateData($data, $id)
	{
		$query = $this->db->update('tblmaterial', $data, array('id_mt' => $id));
		return $query;
	}
}