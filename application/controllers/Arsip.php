<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Arsip_model');
        $this->load->model('Rak_model');
    }

    function index()
    {
        $data["rak"] = $this->Rak_model->rak();
        $data["tahun"] = $this->Arsip_model->tahun();
        $data["skema"] = $this->Arsip_model->skema();
        $data["departemen"] = $this->Arsip_model->departemen();
        $data["fakultas"] = $this->Arsip_model->fakultas();
        $this->load->view('admin/arsip', $data);
    }

    function get_data()
    {
        $list = $this->Arsip_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $lihat = '';
            if (!empty($field->id_detail)) {
                $lihat = '<a class="btn btn-block btn-success btn-xs" onclick="lihatRak(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Lihat</a>';
            }

            $cetak = '<a class="btn btn-info btn-sm" onclick="cetakData(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff"><i class="fas fa-print"></i>Tanda Terima</a>';
            $no++;
            $row = array();
            $row[] = $field->id_arsip;
            $row[] = $field->tahun;
            $row[] = $field->skema;
            $row[] = $field->sumber;
            $row[] = $field->judul;
            $row[] = $field->nama_ketua;
            $row[] = $field->departemen;
            $row[] = $field->fakultas;
            $row[] = nominal($field->dana_disetujui);
            $row[] = nominal($field->sptb) . '<br><a class="btn btn-block btn-warning btn-xs" onclick="editDana(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Edit</a>';
            $row[] = nominal($field->dana_sisa);
            $row[] = $field->nomor_kontrak . $field->kode_kontrak;
            $row[] = $field->tgl_kontrak;
            $row[] = $field->nomor_sk . $field->kode_sk;
            $row[] = $field->tgl_sk;
            $row[] = $field->kode_unik;
            $row[] = '<a class="btn btn-block btn-info btn-xs" onclick="editRak(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Rak</a>&nbsp' . $lihat;
            $row[] = $cetak;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Arsip_model->count_all(),
            "recordsFiltered" => $this->Arsip_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
        exit();
    }

    function get_data2()
    {
        $list = $this->Arsip_model->get_datatables2($this->input->post());
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $lihat = '';
            if (!empty($field->id_detail)) {
                $lihat = '<a class="btn btn-block btn-success btn-xs" onclick="lihatRak(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Lihat</a>';
            }
            $cetak = '<a class="btn btn-info btn-sm" href="' . site_url() . 'arsip/cetak_tanda_terima/' . $field->id_arsip . '" target="_blank"><i class="fas fa-print"></i>Tanda Terima</a>';
            $no++;
            $row = array();
            $row[] = $field->id_arsip;
            $row[] = $field->tahun;
            $row[] = $field->skema;
            $row[] = $field->sumber;
            $row[] = $field->judul;
            $row[] = $field->nama_ketua;
            $row[] = $field->departemen;
            $row[] = $field->fakultas;
            $row[] = nominal($field->dana_disetujui);
            $row[] = nominal($field->sptb) . '<br><a class="btn btn-block btn-warning btn-xs" onclick="editDana(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Edit</a>';
            $row[] = nominal($field->dana_sisa);
            $row[] = $field->nomor_kontrak . $field->kode_kontrak;
            $row[] = $field->tgl_kontrak;
            $row[] = $field->nomor_sk . $field->kode_sk;
            $row[] = $field->tgl_sk;
            $row[] = $field->kode_unik;
            $row[] = '<a class="btn btn-block btn-info btn-xs" onclick="editRak(\'' . $field->id_arsip . '\')" data-toggle="modal" style="cursor:pointer;color:#ffffff">Rak</a>&nbsp' . $lihat;
            $row[] = $cetak;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Arsip_model->count_all2($this->input->post()),
            "recordsFiltered" => $this->Arsip_model->count_filtered2(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
        exit();
    }

    public function cekEdit()
    {
        $hasil = $this->Arsip_model->cekEdit();
        echo json_encode($hasil);
    }

    public function lihatRak()
    {
        $hasil = $this->Rak_model->lihatRak();
        echo json_encode($hasil);
    }

    public function cekRak()
    {
        $jumlah = $this->Rak_model->cekRak();
        $hasil["kolom"] = "";
        $hasil["kolom"] .= '<select class="form-control select2" name="kolom" id="kolom"><option value="">--- Pilih ---</option>';
        for ($i = 1; $i <= $jumlah->jumlah_kolom; $i++) {
            $hasil["kolom"] .= '<option value="' . $i . '">' . $i . '</option>';
        }
        $hasil["kolom"] .= '</select>';

        $hasil["baris"] = "";
        $hasil["baris"] .= '<select class="form-control select2" name="baris" id="baris"><option value="">--- Pilih ---</option>';
        for ($i = 1; $i <= $jumlah->jumlah_baris; $i++) {
            $hasil["baris"] .= '<option value="' . $i . '">' . $i . '</option>';
        }
        $hasil["baris"] .= '</select>';
        echo json_encode($hasil);
    }

    public function simpanDanaSisa()
    {
        $hasil = $this->Arsip_model->updateSisa();
        if ($hasil == 1) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
               Dana Terpakai berhasil update data.
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                      Dana Terpakai gagal update data.
                    </div>'
            );
        }
        redirect('arsip');
    }

    public function simpanRak()
    {
        $hasil = $this->Arsip_model->updateRak();
        if ($hasil == 1) {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-success col-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
               Rak berhasil update data.
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'hasil',
                '<div class="alert alert-warning alert-dismissible col-12">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal!</h5>
                      Rak gagal update data.
                    </div>'
            );
        }
        redirect('arsip');
    }

    public function cetak_tanda_terima()
    {

        $this->load->library('f_pdf');
        $id = $this->input->post('id_arsip3');
        $data['nama_pengirim'] = $this->input->post('nama_pengirim');
        $data['no_hp_pengirim'] = $this->input->post('no_hp_pengirim');
        $data['nama_penerima'] = $this->input->post('nama_penerima');
        $simpan = $this->Arsip_model->simpanPenerima();
        $data["arsip"] = $this->Arsip_model->data_arsip($id);
        $data["detail"] = $this->Arsip_model->detail_data_arsip($id);
        $data["tanda"] = $this->Arsip_model->tanda_terima($id);
        $this->load->view('admin/cetak_tanda_terima', $data);
    }

    public function modal()
    {
        $id_arsip = $this->input->post("id_arsip");
        $kategori = $this->Arsip_model->kategori();
        $tanda = $this->Arsip_model->tanda_terima($id_arsip);
        $nama_pengirim = "";
        $hp = "";
        $nama_penerima = "";
        if (!empty($tanda->nama_pengirim)) {
            $nama_pengirim = $tanda->nama_pengirim;
        }
        if (!empty($tanda->hp)) {
            $hp = $tanda->hp;
        }
        if (!empty($tanda->nama_penerima)) {
            $nama_penerima = $tanda->nama_penerima;
        }
        if (!empty($tanda)) {
            $edit = '<input type="hidden" name="editStatus" value="1">';
        } else {
            $edit = '<input type="hidden" name="editStatus" value="0">';
        }
        $form = $edit . '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead><tr><th>Kategori</th><th>Status</th><th>Status Unggahan</th></tr></thead>
                        <tbody>';
        foreach ($kategori as $key) {
            $status = "";
            if (cekStatusKategori($id_arsip, $key->id_kategori) == 1) {
                $status = "checked";
            }
            $status_upload = "";
            if(cekStatusUnggahan($id_arsip, $key->id_kategori) == 1)
            {
                $status_upload="checked";
            }
            $form .= '<tr>
                                        <td>' . $key->kategori . '</td>
                                        <td>
                                            <div class="form-check"><input type="checkbox" name="status[]" value="' . $key->id_kategori . '" class="form-check-input" ' . $status . '></div>
                                        </td>
                                        <td>
                                            <div class="form-check"><input type="checkbox" name="status_unggahan[]" value="' . $key->id_kategori . '" class="form-check-input" ' . $status_upload . '></div>
                                        </td>
                                        </tr>';
        }
        $form .= '</tbody></table></div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nama Pengirim :</label>
                                <input type="text" id="nama_pengirim" class="form-control" name="nama_pengirim" value="' . $nama_pengirim . '">
                            </div>';
        $form .= '<div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nomor HP Pengirim :</label>
                                <input type="text" id="no_hp_pengirim" class="form-control" onKeyUp="this.value=this.value.replace(/[^0-9]/g,\'' . '\')" name="no_hp_pengirim" value="' . $hp . '">
                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nama Penerima :</label>
                                <input type="text" id="nama_penerima" class="form-control" name="nama_penerima" value="' . $nama_penerima . '">
                            </div>';
        echo $form;
    }
}
