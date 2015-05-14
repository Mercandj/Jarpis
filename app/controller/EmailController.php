<?php
namespace app\controller;
use \lib\Entities\User;
use \lib\HTTPRequest;
use \lib\HTTPResponse;
class EmailController extends \lib\Controller {

  /**
	 * Send an email
	 * @uri    	/email
	 * @method 	POST
	 * @return 	JSON result, sent or not
	 */
	public function post() {
	  $json['succeed'] = false;

	  // Get User
	  $userManager = $this->getManagerof('User');
	  $id_user = $this->_app->_config->getId_user();
	  $user = $userManager->getById($id_user);
	  
	  if($user->isAdmin()) {
  	  $to = 'nobody@example.com';
  		if(HTTPRequest::postExist('to'))
  			$to = HTTPRequest::postData('to');
  	  
  	  $subject = '[Server] Subject';
  		if(HTTPRequest::postExist('subject'))
  			$subject = HTTPRequest::postData('subject');
  		
  		$message = 'Hello!';
  		if(HTTPRequest::postExist('message'))
  			$message = HTTPRequest::postData('message');
  		
  		$from = 'toto@gmail.com';
  		if(HTTPRequest::postExist('from'))
  			$from = HTTPRequest::postData('from');
  			
			$replyto = '';
  		if(HTTPRequest::postExist('replyto'))
  			$replyto = HTTPRequest::postData('replyto');
  		
      $headers = 'From: ' . $from . "\r\n" .
          'Reply-To: ' . $replyto . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
      
      mail($to, $subject, $message, $headers);
      
      $json['succeed'] = true;
      $json['toast'] = 'Email sent.';
    }
    else {
      $json['toast'] = 'Denied access.';
    }
	  
    // Return data
	  HTTPResponse::send(json_encode($json));
  }
}