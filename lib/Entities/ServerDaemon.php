<?php
namespace lib\Entities;

class ServerDaemon extends \lib\Entity {

	protected $_id,
		$_id_server_daemon,
		$_id_user,
		$_id_file,
		$_type,
		$_content,
		$_description,
		$_date_creation,
		$_size,
		$_visibility,
		$_public,
		$_running,
		$_activate,
		$_longitude,
		$_latitude,
		$_sleep_second;


	public function getId() {
		return $this->_id;
	}
	public function getId_server_daemon() {
		return $this->_id_server_daemon;
	}
	public function getId_user() {
		return $this->_id_user;
	}
	public function getId_file() {
		return $this->_id_file;
	}
	public function getType() {
		return $this->_type;
	}
	public function getContent() {
		return $this->_content;
	}
	public function getDescription() {
		return $this->_description;
	}
	public function getDate_creation() {
		return $this->_date_creation;
	}
	public function getSize() {
		return $this->_size;
	}
	public function getVisibility() {
		return $this->_visibility;
	}
	public function getPublic() {
		return $this->_public;
	}
	public function getRunning() {
		return $this->_running;
	}
	public function getActivate() {
		return $this->_activate;
	}
	public function getLongitude() {
		return $this->_longitude;
	}
	public function getLatitude() {
		return $this->_latitude;
	}
	public function getSleep_second() {
		return $this->_sleep_second;
	}


	public function setId($id){
		if(!empty($id))
			$this->_id = $id;
	}
	public function setId_server_daemon($id_server_daemon){
		$this->_id_server_daemon = $id_server_daemon;
	}
	public function setId_user($id_user) {
		if(!empty($id_user))
			$this->_id_user = $id_user;
	}
	public function setId_file($id_file) {
		if(!empty($id_file))
			$this->_id_file = $id_file;
	}
	public function setType($type) {
		if(!empty($type))
			$this->_type = $type;
	}
	public function setContent($content) {
		if(!empty($content))
			$this->_content = $content;
	}
	public function setDescription($description) {
		if(!empty($description))
			$this->_description = $description;
	}
	public function setDate_creation($date) {
		if(!empty($date))
			$this->_date_creation = $date;
	}
	public function setSize($size) {
		if(!empty($size))
			$this->_size = $size;
	}
	public function setVisibility($visibility) {
		if(!empty($visibility))
			$this->_visibility = $visibility;
	}
	public function setPublic($public) {
		if(!empty($public))
			$this->_public = $public;
	}
	public function setRunning($running) {
		$this->_running = $running;
	}
	public function setActivate($activate) {
		$this->_activate = $activate;
	}
	public function setLongitude($longitude) {
		if(!empty($longitude))
			$this->_longitude = $longitude;
	}
	public function setLatitude($latitude) {
		if(!empty($latitude))
			$this->_latitude = $latitude;
	}
	public function setSleep_second($sleep_second) {
		if(!empty($sleep_second))
			$this->_sleep_second = $sleep_second;
	}


	public function isValid() {
		return !empty($this->_id) && !empty($this->_id_user);
	}
	public function toArray() {
		$json['id'] = $this->getId();
		$json['id_server_daemon'] = $this->getId_server_daemon();
		if($this->getId_user()!=null)
			$json['id_user'] = $this->getId_user();
		if($this->getId_file()!=null)
			$json['id_file'] = $this->getId_file();
		if($this->getType()!=null)
			$json['type'] = $this->getType();
		if($this->getContent()!=null)
			$json['content'] = $this->getContent();
		if($this->getDescription()!=null)
			$json['description'] = $this->getDescription();
		if($this->getDate_creation()!=null)
			$json['date_creation'] = $this->getDate_creation();
		if($this->getSize()!=null)
			$json['size'] = $this->getSize();
		if($this->getVisibility()!=null)
			$json['visibility'] = $this->getVisibility();
		if($this->getPublic()!=null)
			$json['public'] = $this->getPublic();
		$json['running'] = $this->getRunning();
		$json['activate'] = $this->getActivate();
		if($this->getLongitude()!=null)
			$json['longitude'] = $this->getLongitude();
		if($this->getLatitude()!=null)
			$json['latitude'] = $this->getLatitude();
		if($this->getSleep_second()!=null)
			$json['sleep_second'] = $this->getSleep_second();
        return $json;
    }
}