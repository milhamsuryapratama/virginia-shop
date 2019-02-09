<?php 
/**
 * 
 */
class App_model extends CI_Model
{
	
	public function dataProduk($perpage,$offset)
    {
        $query = $this->db->select('*')
                          ->from('produk')
                          ->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')
                          ->order_by('produk.id_produk', 'DESC')
                          ->get('',$perpage,$offset)->result_array();
        return $query;
    }

    public function dataProduk_byId($id)
    {
        $query = $this->db->select('*')
                          ->from('produk')
                          ->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')
                          ->where('produk.id_produk', $id)
                          ->order_by('produk.id_produk', 'DESC')
                          ->get()->row_array();
        return $query;
    }

    public function dataProduk_bySlug($slug,$perpage,$offset)
    {
        $query = $this->db->select('*')
                          ->from('produk')
                          ->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')
                          ->where('kategori_produk.kategori_slug', $slug)
                          ->order_by('produk.id_produk', 'DESC')
                          ->get('',$perpage,$offset)->result_array();
        return $query;
    }

    public function cari_produk($keyword,$kategori)
    {
        $query = $this->db->select('*')
                          ->from('produk')
                          ->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')
                          ->order_by('produk.id_produk', 'DESC')
                          ->or_like(array('produk.nama_produk' => $keyword,'produk.id_kategori_produk' => $kategori))
                          ->get()->result_array();
        return $query;
        // $query = $this->db->query("SELECT * FROM produk JOIN kategori_produk ON kategori_produk.id_kategori_produk = produk.id_kategori_produk WHERE produk.nama_produk LIKE '%".$keyword."%' ")->result_array();
    }

    public function data_produk_join_kategori_by_slug($slug)
    {
    	return $this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')->get_where('produk', array('produk_slug' => $slug))->row_array();
    }

    public function data_produk_join_kategori()
    {
        return $this->db->order_by('id_produk', 'DESC')->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')->get('produk')->result_array();
    }

    public function tambahKeranjang($data)
    {
    	return $this->db->insert('order_temp', $data);
    }

    public function dataCart($session)
    {
    	$this->db->select("*");
        $this->db->from('order_temp');
        $this->db->join('produk', 'order_temp.id_produk = produk.id_produk');
        $this->db->where('order_temp.id_session', $session);
        $this->db->where('order_temp.status', 'N');
        $this->db->order_by('order_temp.id_order_temp', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function totalBelanja($session)
    {
    	return $this->db->query("SELECT sum(total) as total FROM order_temp WHERE id_session = '".$session."' ")->row_array();
    }

    public function total_belanja_by_kode($kode)
    {
    	return $this->db->query("SELECT sum(total) as total FROM transaksi_detail WHERE kode_transaksi = '".$kode."' ")->row_array();
    }

    public function hapus_keranjang($id)
    {
    	return $this->db->delete('order_temp', array('id_order_temp' => $id));
    }

    public function hapus_keranjang_by_session($session)
    {
    	return $this->db->delete('order_temp', array('id_session' => $session));
    }

    public function registerUser($data) 
    {
    	return $this->db->insert('user', $data);
    }

    public function user_login($table, $where)
	{
		return $this->db->get_where($table,$where);
	}

	public function data_user($table, $where)
	{
		return $this->db->get_where($table,array('id_session' => $where))->row_array();
	}

	public function simpan_transaksi($data)
	{
		return $this->db->insert('transaksi', $data);
	}

	public function data_rekening()
	{
		return $this->db->get('rekening')->result_array();
	}

	public function history_user($session)
	{
		return $this->db->order_by('id_transaksi', 'DESC')->get_where('transaksi', array('id_pembeli' => $session))->result_array();
	}

	public function data_trx_by_kode($kode)
	{
		return $this->db->get_where('transaksi', array('kode_transaksi' => $kode))->row_array();		
	}

	public function data_trx_detail_by_kode($kode)
	{
		return $this->db->join('produk', 'produk.id_produk = transaksi_detail.id_produk')->get_where('transaksi_detail', array('kode_transaksi' => $kode))->result_array();
	}

	public function simpan_konfirmasi($data)
	{
		return $this->db->insert('konfirmasi', $data);
	}

	public function data_kategori()
	{
		return $this->db->order_by('id_kategori_produk', 'DESC')->get('kategori_produk')->result_array();
	}

    public function data_kategori_by_slug()
    {
        return $this->db->order_by('id_kategori_produk', 'DESC')->get('kategori_produk')->result_array();
    }

	public function update_status_transaksi($table,$field,$where)
	{
		return $this->db->update($table, $field, $where);
	}

  public function update_stok($id,$jumlah)
  {
    return $this->db->query("UPDATE produk set stok = stok-'$jumlah' WHERE id_produk = '$id'");
  }

  public function get_data_by_params($slug)
  {
    return $this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')->get_where('produk', array('kategori_slug' => $slug))->result_array();
  }

}
?>