<?php

class OpenAIClient {

    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function generateQuiz($topic) {

        /*$prompt = "Generate 5 MCQ questions on {$topic} with 4 options and correct answer in JSON format like:
        [
          {
            \"question\": \"...\",
            \"options\": [\"A\",\"B\",\"C\",\"D\"],
            \"answer\": \"A\"
          }
        ]";

        $data = [
            "model" => "gpt-4o-mini",
            "messages" => [
                ["role" => "user", "content" => $prompt]
            ]
        ];

        $ch = curl_init("https://api.openai.com/v1/chat/completions");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $this->apiKey,
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            die("Curl error: " . curl_error($ch));
        }

        curl_close($ch);

        echo "<pre>";
        print_r($response);
        //die;

        $result = json_decode($response, true);

        if (!isset($result['choices'][0]['message']['content'])) {
            die("Invalid API response");
        }

        $content = $result['choices'][0]['message']['content'];

        // Clean JSON (very important)
        $content = trim($content);
        $content = preg_replace('/```json|```/', '', $content);

        $quizData = json_decode($content, true);

        if (!$quizData) {
            die("Invalid JSON from AI: " . $content);
        }

        return $quizData;*/

            // Mock data based on topic (you can expand this)
        return [
            [
                "question" => "What is {$topic}?",
                "options" => ["Concept", "Animal", "Place", "Object"],
                "answer" => "Concept"
            ],
            [
                "question" => "Which field is {$topic} related to?",
                "options" => ["Science", "Sports", "History", "Art"],
                "answer" => "Science"
            ],
            [
                "question" => "{$topic} is mainly studied in which subject?",
                "options" => ["Biology", "Physics", "Math", "Chemistry"],
                "answer" => "Biology"
            ],
            [
                "question" => "Which of the following best describes {$topic}?",
                "options" => ["Theory", "Game", "Device", "Person"],
                "answer" => "Theory"
            ],
            [
                "question" => "Why is {$topic} important?",
                "options" => [
                    "Understanding concepts",
                    "Entertainment",
                    "Decoration",
                    "None"
                ],
                "answer" => "Understanding concepts"
            ]
        ]; 
    }
}