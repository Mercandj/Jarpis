<?php
namespace app;
use \app\controller\UserController;
use \app\controller\ServerDaemonController;

class RESTapi extends \lib\Application {

	public function run() {

		/*->authorize((new ServerDaemonController($this))->checkDaemon())*/

		$this->_router
			->get('/user','User#get')
			->post('/user','User#post')
			->post('/launchdaemon/:id','ServerDaemon#launchDaemon')
			->authorize((new UserController($this))->isUser())
			->get('/launchdaemon/:id','ServerDaemon#test')
			->get('/file','File#get')
			->post('/file','File#post')
			->get('/file/test','File#test')
			->get('/file/:id','File#download')
			->post('/file/:id','File#update')
			->delete('/file/:id','File#delete')
			->get('/home/:id','Home#get')
			->post('/home/:id','Home#post')
			->post('/user_message/:id','ConversationMessage#post')
			->get('/information','Information#get')
			->authorize((new UserController($this))->isAdmin())
			->get('/daemon','ServerDaemon#get')	
			->post('/daemon','ServerDaemon#post')
			->otherwise(function(){
				\lib\HTTPResponse::redirect404();
			});
		
		exit();
	}
}