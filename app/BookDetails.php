<?php
namespace App;

class BookDetails {
	private $_author;
	private $_subject;
	
	public function __construct($author,$subject){
		$this->_author=$author;
		$this->_subject=$subject;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getAuthor() {
		return $this->_author;
	}
	
	/**
	 *
	 * @param unknown_type $_author        	
	 */
	public function setAuthor($_author) {
		$this->_author = $_author;
		return $this;
	}
	
	/**
	 *
	 * @return the unknown_type
	 */
	public function getSubject() {
		return $this->_subject;
	}
	
	/**
	 *
	 * @param unknown_type $_subject        	
	 */
	public function setSubject($_subject) {
		$this->_subject = $_subject;
		return $this;
	}
	
	
}