<?php


use App\Post;

class PostService {

	private $query;


	function __construct(Post $query) {
		$this->query = $query;
	}


	public function getPosts(){
		return $this->query->orderBy('created_at', 'desc')->get();
	}
}