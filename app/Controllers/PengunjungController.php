<?php

namespace App\Controllers;
use App\Models\Pengunjung;

class PengunjungController extends BaseController
{
    protected $pengunjung;

    function __construct()
    {
        $this->pengunjung= new Pengunjung;
    }

    public function index()
    {
        $data['pengunjung'] = $this->pengunjung->findAll();

        return view('pengunjung',$data);
    }

    public function create()
    
    {
        $this->pengunjung->insert(
            [
        'name' => $this->request->getPost('nama'),
        'nim' => $this->request->getPost('nim'),
        'no_hp' => $this->request->getPost('no_hp'),
        'prodi' => $this->request->getPost('prodi'),

            ]);
       return redirect('/')->with('Selamat','Data Berhasil di input');
    }

    
    public function edit($id)
    {
        
        $this->pengunjung->update($id, [
                'name' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'no_hp' => $this->request->getPost('no_hp'),
                'prodi' => $this->request->getPost('prodi'),
            ]);

            return redirect('/')->with('success', 'Data Berhasil diperbarui!');
    }

    public function delete($id)
{
    $this->pengunjung->delete($id);

    return redirect('/')->with('success', 'Data Berhasil dihapus!');
}

}
