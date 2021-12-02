<?php 

class Overview extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$datasiswa = $this->db->count_all_results('siswa');
		$this->db->select_sum('jumlah_bayar');
		$this->db->where('tgl_bayar > ', date('Y-m').'-01');
		$sumuangbulanan = $this->db->get('pembayaran')->result();
		$totalpetugas = $this->db->count_all_results('petugas');
		

		$this->db->where('tgl_bayar >', date('Y-m').'-01');
		$total_transaksi_bulan_ini = $this->db->count_all_results('pembayaran');

		// var_dump($total_transaksi_bulan_ini);die;
		$data = [
			'datasiswa' => $datasiswa, 
			'sumuangbulanan' => $sumuangbulanan[0]->jumlah_bayar, 
			'totalpetugas' => $totalpetugas, 
			'total_transaksi_bulan_ini' => $total_transaksi_bulan_ini 
		];
		
		$this->load->view("admin/overview_view.php", $data);
	}

	

}

?>
