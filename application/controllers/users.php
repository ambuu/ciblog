<?php 
    class users extends CI_Controller{
        
        //register user
        public function register(){
            //$this->output->enable_profiler(TRUE);
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
            $this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[25]|differs[name]
');
            $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('template/header');
                $this->load->view('users/register',$data);
                $this->load->view('template/footer');
            } else {
                //Encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                //set message
                $this->session->set_flashdata('user_registered','You are registered now can Log in');

                redirect('posts');
            }
        }

        //login user
        public function login(){
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('template/header');
                $this->load->view('users/login',$data);
                $this->load->view('template/footer');
            } else {
                //get username
                $username = $this->input->post('username');

                //get and encrypt password
                $password = md5($this->input->post('password'));
                //$password = $this->input->post('password');

                //Login user
                $user_id = $this->user_model->login($username,$password);

                //echo '<pre>'.print_r($user_id,1).'<pre>';
                 if ($user_id) {
                    //create session
                    $user_data = array(
                        'user_id' =>$user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    //set message
                    $this->session->set_flashdata('user_loggedin','You are registered now Logged in');
                    redirect('posts');
                } else {
                    //set message
                    $this->session->set_flashdata('login_failed','Login is invalid');
                    redirect('users/login');
                }   
            }  
        }
        //log out
        public function logout(){
            //unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            //set message
            $this->session->set_flashdata('user_loggedout','You are Logged out');
            redirect('users/login');
        }
        
        //check if username exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','That username is taken. Please choose diffrenent one');
            if ($this->user_model->check_username_exists($username)) {
                return true;
            } else {
                return false;
            }
        }

         //check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','That email is taken. Please choose diffrenent one');
            if ($this->user_model->check_email_exists($email)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>