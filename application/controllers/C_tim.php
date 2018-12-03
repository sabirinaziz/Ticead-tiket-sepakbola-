 <?php 
/**
* 
*/
class C_tim extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tim');
	}
	public function index()
	{
        $data = array(
            'title' => 'apalah',
            'isian' => $this->M_tim->get_data()
        );
        $this->load->view('tim',$data);
	}


    public function edit()
    {
        $data = $this->input->post(null,TRUE);
        $edit = $this->M_tim->edit_data($data);
        if($edit){
            echo "<script>alert('berhasil Edit Data');</script>";
            redirect('C_tim/index');
        }else{
            echo "<script>alert('Gagal Edit Data');</script>";
        }
    }
    public function add()
    {
        $data = $this->input->post(null,TRUE);
        $add = $this->M_tim->add_data($data);
        if($add){
            echo "<script>alert('berhasil Menambahkan Data');</script>";
            redirect('C_tim/index');
        }else{
            echo "<script>alert('Gagal Menambahkan Data');</script>";
        }
    }
    public function delete()
    {
        $urutan = $this->input->post('nm_tim');
        $hapus = $this->m_profilecalon->delete_data($urutan);
        if($hapus){
            echo "<script>alert('berhasil Menambahkan Data');</script>";
            redirect('C_tim/index');
        }else{
            echo "<script>alert('Gagal Delete Data');</script>";
        }
    }
}
