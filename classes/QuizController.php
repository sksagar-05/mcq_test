<?php
	
	require_once __DIR__ . '/LLMService.php';
	require_once __DIR__ . '/Quiz.php';
	require_once __DIR__ . '/Question.php';

	class QuizController {

	    public function generateQuiz($topic) {
	        $service = new LLMService();
	        return $service->getQuestions($topic);
	    }

	    public function evaluate($quiz, $userAnswers) {
	        $score = 0;
	        $results = [];

	        foreach ($quiz->getQuestions() as $index => $question) {
	            $correct = $question->getCorrectAnswer();
	            $user = $userAnswers[$index] ?? null;

	            if ($user === $correct) {
	                $score++;
	            }

	            $results[] = [
	                "question" => $question->getQuestion(),
	                "correct" => $correct,
	                "user" => $user
	            ];
	        }

	        return [$score, $results];
	    }
	}

?>