<?php

	class Quiz {

	    private $questions = [];

	    public function addQuestion($question) {
	        $this->questions[] = $question;
	    }

	    public function getQuestions() {
	        return $this->questions;
	    }
	}
?>