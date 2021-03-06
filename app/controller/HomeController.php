<?php
namespace app\controller;
use \lib\Entities\User;
use \lib\Entities\Conversation;
use \lib\Entities\ConversationUser;
use \lib\Entities\ConversationMessage;
use \lib\Entities\File;
use \lib\Entities\FileDownload;
use \lib\HTTPRequest;
use \lib\HTTPResponse;
class HomeController extends \lib\Controller {

  /**
	 * Return list of data for the home page
	 * @uri    	/home
	 * @method 	GET
	 * @return 	JSON List of home data
	 */
	public function get() {
		$json['succeed'] = false;

		// Get Manager
		$userManager = $this->getManagerof('User');
		$fileManager = $this->getManagerof('File');
		$conversationManager = $this->getManagerof('Conversation');
		$conversationUserManager = $this->getManagerof('ConversationUser');
		$conversationMessageManager = $this->getManagerof('ConversationMessage');

		// Get User
		$id_user = $this->_app->_config->getId_user();
		$user = $userManager->getById($id_user);

		// Get parameters
		$id_file_parent = -1;
		if(HTTPRequest::getExist('id_file_parent'))
			$id_file_parent = HTTPRequest::getData('id_file_parent');

		// Get data from database
		$my_recent_files = [];
		$public_recent_files = [];
		$recent_messages = [];
		$list_my_recent_files = $fileManager->getByParentId($id_user, $id_file_parent);
		$list_public_recent_files = $fileManager->getPublic();
		$list_conversationMessage = $conversationMessageManager->getAllByConversationId($id);

		// Format data
		foreach ($list_my_recent_files as $file) {
			$my_recent_files[] = $file->toArray();
		}
		foreach ($list_public_recent_files as $file) {
			$public_recent_files[] = $file->toArray();
		}
		foreach ($list_messages as $message) {
			$recent_messages[] = $message->toArray();
		}
		foreach ($list_conversationMessage as $conversationMessage) {
			$tmp_array = $conversationMessage->toArray();
			$tmp_array['user'] = $userManager->getById($conversationMessage->getId_user())->toArray();
			$recent_messages[] = $tmp_array;
		}
		$result = array(
			"my_recent_files" => $my_recent_files,
			"public_recent_files" => $public_recent_files,
			"recent_messages"  => $recent_messages
		);

		if($user->isAdmin()) {

		}

		// Return data
		$json['result'] = $result;
		$json['succeed'] = true;
		HTTPResponse::send(json_encode($json));
	}
	
}
