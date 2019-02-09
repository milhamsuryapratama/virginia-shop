<?php 
/**
 * 
 */
class Admin_model extends CI_Model
{
	
	public function admin_login($table, $where)
	{
		return $this->db->get_where($table,$where);
	}

	public function tambah_data($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function get_data($table,$field)
	{
		return $this->db->order_by($field, 'DESC')->get($table)->result_array();
	}

	public function get_data_by_id($table,$id)
	{
		return $this->db->get_where($table, $id)->row_array();
	}

	public function edit_data($id, $data, $field, $table)
	{
		$this->db->where($field, $id);
        return $this->db->update($table, $data);
	}

	public function hapus_data($table,$field,$id)
	{
		return $this->db->delete($table, array($field => $id));
	}

	public function getProduk()
	{
		return $this->db->order_by('id_produk', 'DESC')->join('kategori_produk', 'kategori_produk.id_kategori_produk = produk.id_kategori_produk')->get('produk')->result();
	}

	public function getIdGambar($id_produk)
    {
        $this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$result = $this->db->get('');
		if ($result->num_rows() > 0) {
			return $result->row();
		}
    }

}
 ?>