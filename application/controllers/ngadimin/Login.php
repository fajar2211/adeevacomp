<?php
class Login extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Login_model');
  }
 
  public function index(){
//    $data['captcha'] = $this->getCaptcha(4).' '.$this->getCaptcha(3).' '.$this->getCaptcha(2);
    if($this->input->post('submit')) {
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captcha_word');
            if($inputCaptcha === $sessCaptcha){
                $data['msg'] = '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Captcha code matched.
                </div>';
            }else{
                 $data['msg'] = '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Captcha does not match, please try again.
                </div>  ';
            }
        }
    // Captcha configuration
        $config = array(
            'img_path'      => './upload/captcha/',
            'img_url'       => base_url().'upload/captcha/',
//            'font_path'     => BASH_PATH.'system/fonts/texb.ttf',
            'img_width'     => 120,
            'img_height'    => 34,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captcha_word');
        $this->session->set_userdata('captcha_word', $captcha['word']);
        // Pass captcha image to view
        $data['captcha'] = $captcha['image'];
        // Load the view
//    $data['captcha'] = $this->createCaptcha();
//    $data['captcha1'] = $this->refreshCaptcha(); 
    $this->load->view('ngadimin/login',$data);
//    $this->load->view('ngadimin/login');
  }
 
  public function auth(){
//    if (strtolower($this->input->post('captcha_real')) == strtolower($this->input->post('captcha')))
    if ($this->input->post('captcha') == $this->session->userdata('captcha_word'))
    {
    $username = $this->input->post('username',TRUE);
    $password = md5($this->input->post('password',TRUE));                              
    $validate1 = $this->Login_model->validate1($username,$password);
    if($validate1->num_rows() > 0){
        $data               = $validate1->row_array();
        $name               = $data['name'];
        $username           = $data['username'];
        $ngadimin_id        = $data['ngadimin_id'];
        $ngadimin_role_id   = $data['ngadimin_role_id'];
        $sesdata            = array(
            'name'                  => $name,
            'username'              => $username,
            'ngadimin_id'           => $ngadimin_id,
            'ngadimin_role_id'      => $ngadimin_role_id,
            'logged_in'             => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($ngadimin_role_id === '1'){
            redirect('ngadimin/page');
 
        // access login for staff
        }elseif($ngadimin_role_id === '2'){
            redirect('ngadimin/page/admin');
 
        // access login for author
        }else{
            redirect('ngadimin/page/user');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username atau Password Salah');
        redirect('ngadimin/login');
    }
  } else {
      echo $this->session->set_flashdata('msg','Captcha is Wrong');
      redirect('ngadimin/login');
  }
  
  }
 
  public function logout(){
      $this->session->sess_destroy();
      redirect('ngadimin/login');
  }
  
//  private function getCaptcha($param) // method pembuat chapta
//       {
//        $alphabet   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//        $num        = range(0, 35);
//        $result     = '';
//         shuffle($num);
//         for ($x = 0; $x < $param; $x++)
//          {
//            $result .= substr($alphabet, $num[$x], 1);
//          }
//          return $result;
//      }
  
//  private function createCaptcha(){
//        $option = array(
//            'img_path' => './upload/captcha/',
//            'img_url' => base_url('/upload/captcha/'),
//            'word_length' => 5,
//            'img_width' => '200',
//            'img_height' => '30',
//            'expiration' => 3600,
//            'font_size' => 14
//        );
//        
//        $cap = create_captcha($option);
//        $image = $cap['image'];
//        $this->session->unset_userdata('captcha_word');
//        $this->session->set_userdata('captcha_word',$cap['word']); 
//        return $image;
//    }
    
//  private function refreshCaptcha()
//    {
//        $option = array(
//            'img_url' => base_url('/upload/captcha/'),
//            'img_path' => './upload/captcha/',
//            'word_length' => 5,
//            'img_width' => '200',
//            'img_height' => '30',
//            'expiration' => 3600,
//            'font_size' => 14
//        );
//        $cap = create_captcha($option);
//        $this->session->set_userdata('captcha_word',$cap['word']);
//        echo $cap['image'];
//        
////        $this->session->set_userdata('captcha_word',$cap['word']);
////        echo $image;
//    }
    
    public function refreshCaptcha(){
        // Captcha configuration
         $config = array(
            'img_path'      => './upload/captcha/',
            'img_url'       => base_url().'upload/captcha/',
//            'font_path'     => BASH_PATH.'system/fonts/texb.ttf',
            'img_width'     => 120,
            'img_height'    => 34,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177 ),
                'border' => array(10, 51, 115),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captcha_word');
//        $this->session->set_userdata('captchaCode',$captcha['word']);
        $this->session->set_userdata('captcha_word',$captcha['word']);
        // Display captcha image
        echo $captcha['image'];
    }

 
}