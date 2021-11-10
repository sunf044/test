<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_online
{
	var $CI;
	function __construct()
    {
		$this->CI = & get_instance();
    }
	function online()
	{
		$timeoutseconds = 300;
		$timeout = time() - $timeoutseconds;
		$this->CI->db->query("DELETE FROM tb_users_online WHERE last_activity < ".$timeout);
		$data = $this->CI->session->all_userdata();
		if (isset($data['login_system']))
		{
			$this->insert_data($data);
		}
	}

	function insert_data($data)
	{
		$this->CI->load->library('user_agent');
		if ($this->CI->agent->is_browser())
		{
			$agent = $this->CI->agent->browser().' '.$this->CI->agent->version();
		}
		else if ($this->CI->agent->is_robot())
		{
			$agent = $this->CI->agent->robot();
		}
		else if ($this->CI->agent->is_mobile())
		{
			$agent = $this->CI->agent->mobile();
		}
		else
		{
			$agent = 'Unidentified User Agent';
		}
		$type_id = $this->CI->session->userdata('type_id');
		if ( ! empty($type_id))
		{
			if ($type_id == 1 or $type_id == 2)
			{
				$array = array(
				   'uid' => $data['user_id'],
				   'username' => $data['username'],
				   'ip_address' => $this->CI->input->ip_address(),
				   'session_id' => session_id(),
				   'user_agent' => $agent,
				   'last_activity' => time(),
					 'platform' => $this->CI->agent->platform(),
					 'uri' => $_SERVER['REQUEST_URI']
				);
				$count = $this->CI->db->where('uid', $data['user_id'])->from('tb_users_online')->count_all_results();
				if ($count === 0)
				{
					$this->CI->db->insert('tb_users_online', $array);
				}
				else
				{
					$this->CI->db->update('tb_users_online', $array, array('uid' => $data['user_id']));
					$this->CI->db->update('tb_users', array('last_login' => time()), array('aid' => $data['user_id']));
				}
			}
		}
	}
}

/* End of file users_online.php */
/* Location: ./application/hooks/user_online.php */
