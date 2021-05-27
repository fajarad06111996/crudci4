<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel; // load model PegawaiModel

class Pegawai extends BaseController
{

	protected $pegawai;

	function __construct(){
		$this->pegawai = new PegawaiModel(); // buat objek dari model PegawaiModel
	}

	public function index()
	{
		echo view('layout/header');
		// echo view('layout/sidebar');
		$data['pegawai']	= $this->pegawai->findAll();
		echo view('main', $data);
		echo view('layout/footer');
	}

	public function tambah(){
		echo view('layout/header');
		// echo view('');
		echo view('tambah');
		echo view('layout/footer');
	}

	public function prosestambah(){
		if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->pegawai->insert([
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('message', 'Tambah Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
	}

	public function ubah($id_pegawai){
		echo view('layout/header');
		$dataPegawai	= $this->pegawai->find($id_pegawai);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $data['pegawai'] = $dataPegawai;
		
		echo view('ubah', $data);
		echo view('layout/footer');
	}

	public function simpanubah($id_pegawai){
		if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Email Harus Valid'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->pegawai->update($id_pegawai, [
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('message', 'Update Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
	}

    function hapus($id_pegawai)
    {
        $dataPegawai = $this->pegawai->find($id);
        if (empty($dataPegawai)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak ditemukan !');
        }
        $this->pegawai->delete($id);
        session()->setFlashdata('message', 'Delete Data Pegawai Berhasil');
        return redirect()->to('/pegawai');
    }

    public function cetak(){
        $db = \Config\Database::connect();
        $builder = $db->table('pegawai'); 
        $query = $builder->get();

        $table ='';
        $no=1;
        foreach ($data->getResult('array') as $row)
        {           
            $table .='<tr>
                                <td>'.$no++.'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['jenis_kelamin'].'</td>
                                <td>'.$row['no_telp'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['alamat'].'</td>                             
                            </tr>';
        }
        $mpdf = new Mpdf(['debug'=>FALSE,'mode' => 'utf-8', 'orientation' => 'L']);
        $mpdf->WriteHTML('<table border="1" id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                    '.$table.'                       
                    </tbody>
                </table>');
        $mpdf->Output('Laporan_data_pegawai.pdf','I');
        exit;
    }
}
