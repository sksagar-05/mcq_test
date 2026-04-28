<?php
session_start();
require_once 'classes/QuizController.php';

$topic = $_POST['topic'];
$controller = new QuizController();
$quiz = $controller->generateQuiz($topic);

$_SESSION['quiz'] = serialize($quiz);
?>

<form action="submit.php" method="POST">
<?php foreach ($quiz->getQuestions() as $index => $q): ?>
    <p><?= $q->getQuestion(); ?></p>

    <?php foreach ($q->getOptions() as $opt): ?>
        <input type="radio" name="answers[<?= $index ?>]" value="<?= $opt ?>">
        <?= $opt ?><br>
    <?php endforeach; ?>

<?php endforeach; ?>

<button type="submit">Submit</button>
</form>