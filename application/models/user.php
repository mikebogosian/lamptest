<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User extends CI_Model {
		function getUsers() {
			return $this->db->query("SELECT * FROM user ORDER BY name")->result_array();
		}

		function getUser($getUser) {
			return $this->db->query("SELECT * FROM user WHERE id = ?", array($getUser))->row_array();
		}

		function registerUser($newUser) {
			$query = "INSERT INTO user (name, alias, email, password, dob) VALUES (?,?,?,?, ?)";
			$password = md5($newUser['password']);

			$values = array($newUser['name'], $newUser['alias'], $newUser['email'], $password, $newUser['dob']);

			$this->db->query($query, $values);
			$newUserID = $this->db->insert_id();

			if ($newUserID) {
				$query = "SELECT * FROM user WHERE id=$newUserID";

				return $this->db->query($query)->row_array();
			}

			return FALSE;
		}

		function login($loginInfo) {
			$query = "SELECT * FROM user WHERE email=? AND password=?";
			$password = md5($loginInfo['password']);
			$values = array($loginInfo['email'], $password);

			return $this->db->query($query, $values)->row_array();
		}

		function allFriendList($currentUserID) {
            $sqlStr = "SELECT * FROM friendship  LEFT JOIN user ON friendship.friend_id = user.id WHERE friendship.user_id = ?";

            return $this->db->query($sqlStr, $currentUserID)->result_array();
        }

        function noFriendList($currentUserID) {
        	$sqlStr = "SELECT * FROM user WHERE id != ? AND id NOT IN (SELECT friend_id FROM friendship WHERE user_id = ?)";

        	return $this->db->query($sqlStr, [$currentUserID, $currentUserID])->result_array();
        }

        function userDetail($currentUserID) {
        	$sqlStr = "SELECT * FROM user WHERE id = ?";

        	return $this->db->query($sqlStr, $currentUserID)->row_array();
        }

        function addFriend($addFriendID) {
        	$sqlStr = "INSERT INTO friendship(user_id, friend_id) VALUES(?, ?)";

        	$this->db->query($sqlStr, [$this->session->userdata("currentUser")['id'], $addFriendID]);

            $this->db->query($sqlStr, [$addFriendID, $this->session->userdata("currentUser")['id']]);
        }

        function removeFriendship($removeFriendID) {
        	$sqlStr = "DELETE FROM friendship WHERE user_id = ? AND friend_id = ?";

        	$this->db->query($sqlStr, [$this->session->userdata("currentUser")['id'], $removeFriendID]);

            $this->db->query($sqlStr, [$removeFriendID, $this->session->userdata("currentUser")['id']]);
        }
	}