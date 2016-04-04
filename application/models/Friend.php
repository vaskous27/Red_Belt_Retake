<?php

class Friend extends CI_Model {

	function __construct() {

		parent::__construct();
	}

	public function InsertInfo($user_details) {

		$query = "INSERT INTO users(name, alias, email, password, dob, created_at, updated_at) VALUES(?,?,?,?,?,NOW(),NOW())";
		$values = array($user_details['name'], $user_details['alias'], $user_details['email'], $user_details['password'], $user_details['dob']);

	 	  return $this->db->query($query, $values); 		
	}

	public function RetrieveInfo($email) {

		return $this->db->query("SELECT * FROM users WHERE email = ?", array($email)) -> row_array();
	}

	public function GetFriends($id) {

		return $this->db->query("SELECT users.alias AS alias, friendships.friend_id AS friend_id FROM users LEFT JOIN friendships ON users.id = friendships.friend_id WHERE friendships.user_id = ?", array($id))->result_array();
	}

	public function getNotFriends($id) {
		return $this->db->query("SELECT * FROM users WHERE id != ? AND id NOT IN (SELECT friendships.friend_id FROM friendships WHERE friendships.user_id = ?)", array($id, $id))->result_array();

	}

	public function delete($friend_id) {

		$this->db->query("DELETE FROM friendships WHERE user_id = ? AND friend_id = ?", array($this->session->userdata['user_id'], $friend_id));

		$this->db->query("DELETE FROM friendships WHERE user_id = ? AND friend_id = ?", array($friend_id, $this->session->userdata['user_id']));
	}

	public function friendData($friend_id) {
		return $this->db->query("SELECT * FROM users WHERE id = ?", array($friend_id))->row_array();

	}

	function add($friend_id) {
		$query = "INSERT INTO friendships(user_id, friend_id) VALUES(?,?)";
		$values = array($friend_id, $this->session->userdata['user_id']);
		 $this->db->query($query, $values);

		 $values2 = array($this->session->userdata['user_id'], $friend_id);
		 $this->db->query($query, $values2);
        }
}

