<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()	{
        $currentUserID = $this->session->userdata("currentUser")['id'];

		$this->load->model("User");

        $array['allFriends'] = $this->User->allFriendList($currentUserID);
        $array['noFriends'] = $this->User->noFriendList($currentUserID);

        $this->load->view('friendsView', $array);
	}

    public function userDetail($userID) {
        $this->load->model("User");

        $array['userData'] = $this->User->userDetail($userID);

        $this->load->view("userDetail", $array);
    }

    public function addFriendship($addFriendID) {
        $this->load->model("User");

        $this->User->addFriend($addFriendID);

        redirect("/users");
    }

    public function removeFriendship($removeFriendID) {
        $this->load->model("User");

        $this->User->removeFriendship($removeFriendID);

        redirect("/users");
    }
}























