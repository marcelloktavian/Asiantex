<?php

class UserModel extends Model{

	public function get_data($user, $pass)
	{
		$sql = "SELECT du.id, du.nama, du.pass, du.group_id, gp.nama as role FROM `data_user` du JOIN `group` gp on gp.id = du.group_id WHERE du.deleted=0 and (du.nama='".$user."' and du.pass='".$pass."')";

		$this->db->query($sql);

		return $this->db->execute()->toObject();
	}

	// public function get_menu($group)
	// {
	// 	$sql="SELECT m.*,COALESCE(ga.policy,'') as ga_policy FROM menu m LEFT JOIN group_access ga ON m.menu_id = ga.menu_id AND ga.group_id ='".$group."' WHERE m.hide = 0 ORDER BY m.menu_id";
	// }
}