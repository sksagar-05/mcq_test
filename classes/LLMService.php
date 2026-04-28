<?php
	
	require_once __DIR__ . '/../services/GeminiClient.php';
	require_once __DIR__ . '/Quiz.php';
	require_once __DIR__ . '/Question.php';

	class LLMService {

	    private $client;

	    public function __construct() {
	        $this->client = new GeminiClient("GEMINI_API_KEY");
	    }

	    public function getQuestions($topic) {
	        $data = $this->client->generateQuiz($topic);

	        $quiz = new Quiz();

	        foreach ($data as $q) {
	            $question = new Question(
	                $q['question'],
	                $q['options'],
	                $q['answer']
	            );
	            $quiz->addQuestion($question);
	        }

	        return $quiz;
	    }
	}
?>