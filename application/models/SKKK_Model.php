<?php
class SKKK_Model extends CI_Model
{
    public function getAll()
    {
        $this->db->select(
            'tbl_skkk.*,
                tbl_kesepahaman.no_kesepahaman,
                tbl_anggota.nama_anggota,
                tbl_kendaraan.nomor_kendaraan,
                tbl_kendaraan.no_mesin,
                tbl_trayek.nama_trayek,
                '
        );
        $this->db->from('tbl_skkk');
        $this->db->join('tbl_kesepahaman', 'tbl_kesepahaman.id_kesepahaman=tbl_skkk.id_kesepahaman');
        // $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kepemilikan=tbl_skkk.id_kepemilikan');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan=tbl_skkk.id_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->where('tbl_skkk.deleted_at =', null);
        return  $this->db->get()->result();
    }

    public function getRiwayat()
    {
        $this->db->select(
            'tbl_skkk.*,
                tbl_kesepahaman.no_kesepahaman,
                tbl_anggota.nama_anggota,
                tbl_kendaraan.nomor_kendaraan,
                tbl_kendaraan.no_mesin,
                tbl_trayek.nama_trayek,
                '
        );
        $this->db->from('tbl_skkk');
        $this->db->join('tbl_kesepahaman', 'tbl_kesepahaman.id_kesepahaman=tbl_skkk.id_kesepahaman');
        // $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kepemilikan=tbl_skkk.id_kepemilikan');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan=tbl_skkk.id_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->where('tbl_skkk.deleted_at !=', null);
        return  $this->db->get()->result();
    }

    public function search_anggota($key)
    {
        $this->db->like('nama_anggota', $key);
        $this->db->or_like('kode_anggota', $key);
        return $this->db->get('tbl_anggota')->row_array();
    }

    public function search_kesepahaman($key)
    {
        $this->db->select('no_kesepahaman,id_kesepahaman');
        $this->db->from('tbl_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->where('tbl_kesepahaman.id_anggota', $key);
        return $this->db->get()->row_array();
    }

    public function search_kendaraan($key)
    {
        $this->db->select('tbl_kendaraan.nomor_kendaraan, tbl_kendaraan.id_kendaraan');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kendaraan=tbl_kendaraan.id_kendaraan');
        $this->db->where('tbl_kepemilikan.deleted_at =', null);
        $this->db->where('tbl_kendaraan.deleted_at =', null);
        $this->db->where('tbl_kepemilikan.id_anggota', $key);
        return $this->db->get()->result_array();
    }

    public function KendaraanByID($id)
    {
        return $this->db->get_where('tbL_kendaraan', ['id_kendaraan' => $id])->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_skkk', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }

    public function printlagi($id)
    {
        $this->db->select(
            'tbl_skkk.*,
            tbl_kesepahaman.no_kesepahaman,
            tbl_anggota.nama_anggota,
            tbl_anggota.nik_anggota,
            tbl_anggota.alamat,
            tbl_anggota.kelurahan,
            tbl_anggota.kecamatan,
            tbl_kendaraan.nomor_kendaraan,
            tbl_kendaraan.merk_type,
            tbl_kendaraan.no_rangka,
            tbl_kendaraan.no_mesin,
            tbl_kendaraan.warna,
        '
        );

        $this->db->from('tbl_skkk');
        $this->db->join('tbl_kesepahaman', 'tbl_kesepahaman.id_kesepahaman=tbl_skkk.id_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan=tbl_skkk.id_kendaraan');
        $this->db->where('id_skkk', $id);
        return $this->db->get()->row_array();
    }
}
