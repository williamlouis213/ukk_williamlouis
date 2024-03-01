<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\PostModel;


class post extends BaseController
{
  
    public function index()
    {
        $model=new M_model();
        $data['c']=$model->tampil('album');
      echo view('header');
      echo view('post',$data);
      echo view('footer');
    }
    public function aksi_tambah()
    { 
       
        $a= $this->request->getPost('deskripsi');
        $b= $this->request->getPost('album');
        $c = session()->get('id');
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getRandomName();
            $foto->move('images/', $imageName);
        } else {
            $imageName = 'default.jpg';
        }
    
        $data1=array(
            'deskripsi'=>$a,
            'fotop'=>$imageName,
            'album'=>$b,
            'user_maker'=>$c,
            'created_at'=>date('Y-m-d H:i:s')
    
        );
        
    
            $model=new M_model();
            $model->simpan('post', $data1);
            return redirect()->to('dashboard');
      
    }
    public function tambah_album()
    {
        
      echo view('header');
      echo view('tambah_album');
      echo view('footer');
    }
    public function aksi_tambah_album()
    { 
       
        $a= $this->request->getPost('nama_album');
        $c = session()->get('id');
        $foto = $this->request->getFile('cover');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $imageName = $foto->getRandomName();
            $foto->move('images/', $imageName);
        } else {
            $imageName = 'default.jpg';
        }
    
        $data1=array(
            'nama_album'=>$a,
            'cover'=>$imageName,
            'user_id'=>$c,
            'created_at'=>date('Y-m-d H:i:s')
    
        );
        
    
            $model=new M_model();
            $model->simpan('album', $data1);
            return redirect()->to('dashboard');
      
    }
    public function editPost($user)
	{
		
			$model=new M_model();
			$where=array('id_post'=>$user);
			$data['jojo']=$model->getWhere('post',$where);
            $data['a']=$model->tampil('album');
			echo view('header');        
			echo view('edit_post',$data);
			echo view('footer');
		
	}
	public function aksi_edit_post()
{
    $a=$this->request->getPost('deskripsi');
    $b=$this->request->getPost('album');
    $foto = $this->request->getFile('foto');
    $id=$this->request->getPost('id');

    $imageName = null; 

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $imageName = $foto->getName();
        $foto->move('images/', $imageName);
    }

    $where = array('id_post' => $id);
    $data1 = array(
        'deskripsi' => $a,
        'album' => $b
    );

    if ($imageName) {
        $data1['fotop'] = $imageName;
    }

    $darrel = new M_model();
    $darrel->qedit('post', $data1, $where);
    return redirect()->to('/dashboard');
}
public function deletePost($id)
{
    $model = new m_model();
    $model1 = new PostModel();

    // Dapatkan informasi post sebelum dihapus
    $post = $model1->getPostById($id);

    // Cek apakah ada foto yang akan dihapus
    if (!empty($post['fotop'])) {
        // Hapus foto dari direktori
        unlink(FCPATH . 'images/' . $post['fotop']);
    }

    // Hapus post dari database
    $where = array('id_post' => $id);
    $model->hapus('post', $where);

    return redirect()->to('/dashboard');
}

}