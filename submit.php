<?php

	session_start();
	require_once 'classes/QuizController.php';

	$quiz = unserialize($_SESSION['quiz']);
	$userAnswers = $_POST['answers'];

	$controller = new QuizController();
	list($score, $results) = $controller->evaluate($quiz, $userAnswers);

	echo "<h2>Score: $score / 5</h2>";

	foreach ($results as $r) {
	    echo "<p>{$r['question']}</p>";
	    echo "Your Answer: {$r['user']}<br>";
	    echo "Correct Answer: {$r['correct']}<br><br>";
	}

?>