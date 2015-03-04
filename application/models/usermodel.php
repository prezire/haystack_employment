<?php	
  class UserModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('u.*');
			$this->db->from('users u');
			return $this->db->db->get();
		}
    public final function login()
    {
      $i = $this->input;
      $email = $i->post('email');
      $pwd = $i->post('password');
      $a = array('email' => $email, 'password' => $pwd, 'enabled' => 1);
      return $this->db->get_where('users', $a);
    }
    public final function enable($state, $enableToken)
    {
      $this->db->where('enable_token', $enableToken);
      $this->db->update('users', array('enabled' => $state));
      return $this->db->affected_rows();
    }
    public final function forgotPassword()
    {
      $o = $this->readByEmail($this->input->post('email'));
      if($o->num_rows() > 0)
      {
        $uId = $o->row()->id;
        $tok = generateToken($uId);
        $this->db->where('id', $uId);
        $this->db->update('users', array('password_reset_token' => $tok));
        return true;
      }
      return false;
    }
		public final function create()
		{
			$i = $this->input;
			if($i->post())
			{
				$this->db->insert
				(
					'users', 
					getPostValuePair(array('role'))
				);
        $id = $this->db->insert_id();
        $this->uploadAvatar($id);
				return $this->read($id);
			}
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'users', 
        array('id' => $id)
      );
		}
    public final function readByEmail($email)
    {
      return $this->db->get_where
      (
        'users', 
        array('email' => $email)
      );
    }
    public final function readByPasswordResetToken($passwordResetToken)
    {
      return $this->db->get_where
      (
        'users', 
        array('password_reset_token' => $passwordResetToken)
      );
    }
    public final function updatePassword()
    {
      $this->db->where('id', $this->input->post('id'));
      $a = array
      (
        'password' => $this->input->post('password'),
        //Prevent re-use of token.
        'password_reset_token' => ''
      );
      $this->db->update('users', $a);
    }
    private final function uploadAvatar($userId)
    {
      //TODO: Query and remove prev image file.
      $avatar = upload('image_path');
      if(isset($avatar))
      {
        $a = array
        (
          'image_path' => $avatar['file_name'],
          'image_filename' => $avatar['orig_name']
        );
        $this->db->where('id', $userId);
        $this->db->update('users', $a);
      }
    }
		public final function update()
		{
			$i = $this->input;
      $id = $i->post('id');
			$this->db->where('id', $id);
      $a = getPostValuePair();
			$this->db->update('users', $a);
      $this->uploadAvatar($i->post('id'));
      return $this->read($i->post('id'));
		}
		public final function delete($id)
    {
      $this->db->where('user.id', $id);
			return $this->db->delete();
    }
	}