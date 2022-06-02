<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Main_modal extends CI_Model
{
    public function getTasks()
    {
        return $this->db->select('id, t_name, start_time, end_time, is_deleted')
                        ->from('tasks')
                        ->order_by('id DESC')
                        ->get()
                        ->result();
    }

    public function checkTask()
    {
        return $this->db->select('id')
                        ->from('tasks')
                        ->where(['is_deleted' => 0])
                        ->get()
                        ->row();
    }

    public function deleteTask($id)
    {
        $task = $this->db->select('id')
                        ->from('tasks')
                        ->where('id', $id)
                        ->get()
                        ->row();
        if($task)
            return $this->db->where('id', $id)->update('tasks', ['is_deleted' => 1, 'end_time'  => date('Y-m-d H:i:s')]);
        else
            return false;
    }

    public function addTask($post)
    {
        if ($this->db->insert('tasks', $post)) {
			$id = $this->db->insert_id();
			return ($id) ? $id : true;
		}else
			return false;
    }
}