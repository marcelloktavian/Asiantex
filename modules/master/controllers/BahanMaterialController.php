<?php

use \modules\dashboard\controllers\MainController;

class BahanMaterialController extends MainController {

	public function index() {
		$this->model('bahanmaterial','master');
		$model = new BahanMaterialModel();

		$data = $model->get_data();

		$this->template('master/bahanmaterial', array('material' => $data));
	}

	public function delete() {
		$id = isset($_GET["id"]) ? $_GET["id"] : 0;
		$stat = isset($_GET["stat"]) ? $_GET["stat"] : "Y";

		$this->model('bahanmaterial','master');
		$model = new BahanMaterialModel();

		$data = $model->deleteData($id, $stat);

		if($data) {
			$this->back();
		}
	}

	public function insert() {

		$this->model('bahanmaterial','master');
		$model = new BahanMaterialModel();

		$kode = $model->kodeauto();
		$satuan = $model->getSatuan();

		$isinya     = array();
		$error    	= null;
		$success    = null;
		$ex  		= null;

		if($_SERVER["REQUEST_METHOD"] == "POST") {

			// ID material
			if (trim($_POST["idmaterial"])!=="") {
				$id = $_POST["idmaterial"];
			} else {
				$id = "";
			};
			array_push($isinya, $id);

			// Merk
			if (trim($_POST["merk"])!=="") {
				$merk = $_POST["merk"];
			} else {
				$merk = "";
			};
			array_push($isinya, $merk);

			// Nama
			if (trim($_POST["nama"])!=="") {
				$nama = $_POST["nama"];
			} else {
				$nama = "";
			};
			array_push($isinya, $nama);

			// Satuan
			if (trim($_POST["satuan"])!=="") {
				$ex =  explode('/', $_POST["satuan"]);
				$satuan = $ex[1];
			} else {
				$satuan = "- Pilih Satuan -";
			};
			array_push($isinya, $satuan);

			// Harga
			if (trim($_POST["harga"])!=="") {
				$harga = $_POST["harga"];
			} else {
				$harga = "";
			};
			array_push($isinya, $harga);

			// Keterangan
			if (trim($_POST["keterangan"])!=="") {
				$ket = $_POST["keterangan"];
			} else {
				$ket = "";
			};
			array_push($isinya, $ket);

			$data = array(
				'id_mt'       	=> trim($_POST["idmaterial"]),
				'merk'			=> trim($_POST["merk"]),
				'nama'			=> trim($_POST["nama"]),
				'id_mu'			=> NULL,
				'id_sat'		=> $ex[0],
				'satuan'		=> $ex[1],
				'harga'			=> trim($_POST["harga"]),
				'keterangan'	=> trim($_POST["keterangan"]),
				'status'       	=> 'Y',
				'lastmodified' 	=> date("Y-m-d H:i:s"),
				'user'			=> trim($_POST["userName"]),
				'type'			=> 'G',
				'id_mttype'		=> 0,
				'tgl'			=> NULL,
				'stok'			=> 0,
			);

			$insert = $model->saveData($data);

			if($insert) {
				$success = "Data Berhasil di simpan.";
			}else{
				$error = "Data Gagal di simpan.";
			}

		}

		$this->template('master/frmBahanMaterial', array('kode' => $kode[0], 'satuan' => $satuan, 'success' => $success, 'error' => $error,'isinya' => $isinya, 'title' => 'Tambah Data'));

	}

	public function update() {

		$id = isset($_GET["id"]) ? $_GET["id"] : '0';

		$this->model('bahanmaterial','master');
		$model = new BahanMaterialModel();

		$data = $model->getID($id);
		$satuan = $model->getSatuan();

		$isinya     = array();
		$error    	= null;
		$success    = null;
		$ex  		= null;

		if($_SERVER["REQUEST_METHOD"] == "POST") {

		// ID material
			if (trim($_POST["idmaterial"])!=="") {
				$id = $_POST["idmaterial"];
			} else {
				$id = "";
			};
			array_push($isinya, $id);

			// Merk
			if (trim($_POST["merk"])!=="") {
				$merk = $_POST["merk"];
			} else {
				$merk = "";
			};
			array_push($isinya, $merk);

			// Nama
			if (trim($_POST["nama"])!=="") {
				$nama = $_POST["nama"];
			} else {
				$nama = "";
			};
			array_push($isinya, $nama);

			// Satuan
			if (trim($_POST["satuan"])!=="") {
				$ex =  explode('/', $_POST["satuan"]);
				$satuan = $ex[1];
			} else {
				$satuan = "- Pilih Satuan -";
			};
			array_push($isinya, $satuan);

			// Harga
			if (trim($_POST["harga"])!=="") {
				$harga = $_POST["harga"];
			} else {
				$harga = "";
			};
			array_push($isinya, $harga);

			// Keterangan
			if (trim($_POST["keterangan"])!=="") {
				$ket = $_POST["keterangan"];
			} else {
				$ket = "";
			};
			array_push($isinya, $ket);

			$dataUpdate = array(
				'id_mt'       	=> trim($_POST["idmaterial"]),
				'merk'			=> trim($_POST["merk"]),
				'nama'			=> trim($_POST["nama"]),
				'id_mu'			=> NULL,
				'id_sat'		=> $ex[0],
				'satuan'		=> $ex[1],
				'harga'			=> trim($_POST["harga"]),
				'keterangan'	=> trim($_POST["keterangan"]),
				'status'       	=> 'Y',
				'lastmodified' 	=> date("Y-m-d H:i:s"),
				'user'			=> trim($_POST["userName"]),
				'type'			=> 'G',
				'id_mttype'		=> 0,
				'tgl'			=> NULL,
				'stok'			=> 0,
			);

			$update = $model->updateData($dataUpdate, $id);

			if($update) {
				$success = "Data Berhasil di ubah.";
			}else{
				$error = "Data Gagal di simpan.";
			}

		}

		$this->template('master/frmBahanMaterial', array('material' => $data[0], 'satuan' => $satuan, 'success' => $success, 'error' => $error, 'isinya' => $isinya, 'title' => 'Ubah Data'));

	}

}
?>