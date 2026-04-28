<?php

    class Question {

        private $question;
        private $options;
        private $correctAnswer;

        public function __construct($question, $options, $correctAnswer) {
            $this->question = $question;
            $this->options = $options;
            $this->correctAnswer = $correctAnswer;
        }

        public function getQuestion() {
            return $this->question;
        }

        public function getOptions() {
            return $this->options;
        }

        public function getCorrectAnswer() {
            return $this->correctAnswer;
        }
    }

?>