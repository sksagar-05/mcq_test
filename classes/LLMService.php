<?php
	
	require_once __DIR__ . '/../services/OpenAIClient.php';
	require_once __DIR__ . '/Quiz.php';
	require_once __DIR__ . '/Question.php';

	class LLMService {

	    private $client;

	    public function __construct() {
	        $this->client = new OpenAIClient("YOUR_API_KEY");
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