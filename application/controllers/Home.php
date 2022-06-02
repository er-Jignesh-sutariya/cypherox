<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_modal', 'main');
		$this->load->helper('my');
	}

	public function index()
	{
		
		$data['tasks'] = $this->main->getTasks();
        
		return $this->template->load('template', 'home', $data);
	}

	public function add_task()
	{
        $this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
            $response = [
                'error' => true,
                'message' => form_error('t_name')
            ];
        else{
            if($this->main->checkTask()){
                $response = [
                    'error' => true,
                    'message' => "Old task in progress. Complete that first."
                ];
            }else{
                $post = [
                    't_name'      => $this->input->post('t_name'),
                    'start_time'  => date('Y-m-d H:i:s'),
                    'end_time'    => date('Y-m-d H:i:s'),
                ];

                $id = $this->main->addTask($post);

                if($id)
                    $this->session->set_flashdata('success', "Task added.");
                else
                    $this->session->set_flashdata('error', "Task not added. Try again.");

                $response = [
                    'error' => false,
                ];
            }
        }

        die(json_encode($response));
	}

    public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'required|is_natural');
        
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $id = $this->main->deleteTask($this->input->post('id'));
            flashMsg($id, "Task deleted.", "$this->title not deleted.", $this->redirect);
        }
    }

	protected $validate = [
        [
            'field' => 't_name',
            'label' => 'Task ',
            'rules' => 'required|max_length[100]|alpha_numeric_spaces|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 100 chars allowed.",
                'alpha_numeric_spaces' => "Only characters and numbers are allowed.",
            ],
        ]
    ];
}