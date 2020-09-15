<?php

use \modules\dashboard\controllers\MainController;

class ArmadaController extends MainController {

	public function index() {
		$this->model('armada','master');
		$model = new ArmadaModel();

		$data = $model->get_data();

		$this->template('master/armada', array('armada' => $data));
	}

	public function delete() {
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;

		$this->model('armada','master');
		$model = new ArmadaModel();

		$data = $model->deleteData($id);

		if($data) {
			$this->back();
		}
	}

	public function insert() {

		$this->model('armada','master');
		$model = new ArmadaModel();

		$isinya     = array();
		$error    	= null;
		$success    = null;

		if($_SERVER["REQUEST_METHOD"] == "POST") {

			// ID armada
			if (trim($_POST["idarmada"])!=="") {
				$id = $_POST["idarmada"];
			} else {
				$id = "";
			};
			array_push($isinya, $id);

			// No POL
			if (trim($_POST["nopol"])!=="") {
				$nopol = $_POST["nopol"];
			} else {
				$nopol = "";
			};
			array_push($isinya, $nopol);

			// Nama armada
			if (trim($_POST["nama"])!=="") {
				$nama = $_POST["nama"];
			} else {
				$nama = "";
			};
			array_push($isinya, $nama);

			// Keterangan
			if (trim($_POST["keterangan"])!=="") {
				$ket = $_POST["keterangan"];
			} else {
				$ket = "";
			};
			array_push($isinya, $ket);


			$data = array(
				'id_ar'       	=> trim($_POST["idarmada"]),
				'NoPOL'			=> trim($_POST["nopol"]),
				'Nama'			=> trim($_POST["nama"]),
				'Keterangan'	=> trim($_POST["keterangan"]),
				'status'       	=> 'Y',
				'lastmodified' 	=> date("Y-m-d H:i:s"),
				'user'			=> trim($_POST["userName"]),
			);
			$insert = $model->saveData($data);

			if($insert) {
				$success = "Data Berhasil di simpan.";
			}else{
				$error = "Data Gagal di simpan.";
			}

		}

		$this->template('master/frmArmada', array('success' => $success, 'error' => $error,'isinya' => $isinya, 'title' => 'Tambah Data'));

	}

	public function update() {

		$id = isset($_GET["id"]) ? $_GET["id"] : '0';

		$this->model('armada','master');
		$model = new ArmadaModel();

		$data = $model->getID($id);

		$isinya     = array();
		$error    	= null;
		$success    = null;

		if($_SERVER["REQUEST_METHOD"] == "POST") {

			// ID armada
			if (trim($_POST["idarmada"])!=="") {
				$id = $_POST["idarmada"];
			} else {
				$id = "";
			};
			array_push($isinya, $id);

			// No POL
			if (trim($_POST["nopol"])!=="") {
				$nopol = $_POST["nopol"];
			} else {
				$nopol = "";
			};
			array_push($isinya, $nopol);

			// Nama armada
			if (trim($_POST["nama"])!=="") {
				$nama = $_POST["nama"];
			} else {
				$nama = "";
			};
			array_push($isinya, $nama);

			// Keterangan
			if (trim($_POST["keterangan"])!=="") {
				$ket = $_POST["keterangan"];
			} else {
				$ket = "";
			};
			array_push($isinya, $ket);

			$dataUpdate = array(
				'NoPOL'			=> trim($_POST["nopol"]),
				'Nama'			=> trim($_POST["nama"]),
				'Keterangan'	=> trim($_POST["keterangan"]),
				'lastmodified' 	=> date("Y-m-d H:i:s"),
				'user'			=> trim($_POST["userName"]),
			);

			$update = $model->updateData($dataUpdate, $id);

			if($update) {
				$success = "Data Berhasil di ubah.";
			}else{
				$error = "Data Gagal di simpan.";
			}

		}

		$this->template('master/frmArmada', array('armada' => $data[0], 'success' => $success, 'error' => $error, 'isinya' => $isinya, 'title' => 'Edit Data'));

	}

}
?>