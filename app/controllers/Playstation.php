<?php

class Playstation extends Controller
{


    public function index()
    {
        $data['title'] = 'Data Playstation';
        $data['ps'] = $this->model('PlaystationModel')->getAllPlaystation();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('playstation/index', $data);
        $this->view('templates/footer');
    }
    public function edit($id)
    {

        $data['title'] = 'Detail Playstation';
        $data['playstation'] = $this->model('PlaystationModel')->getPlaystationById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('playstation/edit', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Playstation';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('playstation/create', $data);
        $this->view('templates/footer');
    }
    public function simpanPlaystation()
    {

        if ($this->model('PlaystationModel')->tambahPlaystation($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/playstation');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/playstation');
            exit;
        }
    }

    public function updatePlaystation()
    {
        if ($this->model('PlaystationModel')->updateDataPlaystation($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/playstation');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/playstation');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('PlaystationModel')->deletePlaystation($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/playstation');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/playstation');
            exit;
        }
    }
}
