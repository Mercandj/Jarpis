<?php
namespace lib\Entities;

class UserGroup extends \lib\Entity{

	protected $_id,
		$_id_user,
		$_id_user_recipient,
		$_type,
		$_content,
		$_description,
		$_date_creation,
		$_visibility,
		$_public,
		$_longitude,
		$_latitude;


	public function getId() {
		return $this->_id;
	}
	public function getId_user() {
		return $this->_id_user;
	}
	public function getId_user_recipient() {
		return $this->_id_user_recipient;
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
	public function getVisibility() {
		return $this->_visibility;
	}
	public function getPublic() {
		return $this->_public;
	}
	public function getLongitude() {
		return $this->_longitude;
	}
	public function getLatitude() {
		return $this->_latitude;
	}


	public function setId($id){
		if(!empty($id))
			$this->_id = $id;
	}
	public function setId_user($id_user) {
		if(!empty($id_user))
			$this->_id_user = $id_user;
	}
	public function setId_user_recipient($id_user_recipient) {
		if(!empty($id_user_recipient))
			$this->_id_user_recipient = $id_user_recipient;
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
	public function setVisibility($visibility) {
		if(!empty($visibility))
			$this->_visibility = $visibility;
	}
	public function setPublic($public) {
		if(!empty($public))
			$this->_public = $public;
	}
	public function setLongitude($longitude) {
		if(!empty($longitude))
			$this->_longitude = $longitude;
	}
	public function setPublic($latitude) {
		if(!empty($latitude))
			$this->_latitude = $latitude;
	}


	public function isValid() {
		return !empty($this->_id) && !empty($this->_id_user);
	}
	public function toArray() {
		$json['id'] = $this->getId();
		if($this->getId_user()!=null)
			$json['id_user'] = $this->getId_user();
		if($this->getId_user_recipient()!=null)
			$json['id_user_recipient'] = $this->getId_user_recipient();
		if($this->getType()!=null)
			$json['type'] = $this->getType();
		if($this->getContent()!=null)
			$json['content'] = $this->getContent();
		if($this->getDescription()!=null)
			$json['description'] = $this->getDescription();
		if($this->getDate_creation()!=null)
			$json['date_creation'] = $this->getDate_creation();
		if($this->getVisibility()!=null)
			$json['visibility'] = $this->getVisibility();
		if($this->getPublic()!=null)
			$json['public'] = $this->getPublic();
		if($this->getLongitude()!=null)
			$json['longitude'] = $this->getLongitude();
		if($this->getLatitude()!=null)
			$json['latitude'] = $this->getLatitude();
        return $json;
    }
}