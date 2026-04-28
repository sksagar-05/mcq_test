<?php

	class GeminiClient {

	    private $apiKey;

	    public function __construct($apiKey) {
	        $this->apiKey = $apiKey;
	    }

	    public function generateQuiz($topic) {

	        $prompt = "Generate EXACTLY 5 multiple choice questions on '{$topic}'.

	Return ONLY valid JSON in this format:
	[
	  {
	    \"question\": \"...\",
	    \"options\": [\"A\",\"B\",\"C\",\"D\"],
	    \"answer\": \"A\"
	  }
	]";
			/*echo "\n";
			echo "Key";
			print_r($this->apiKey);
			echo "\n";*/
	        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $this->apiKey;
	        $data = [
	            "contents" => [
	                [
	                    "parts" => [
	                        ["text" => $prompt]
	                    ]
	                ]
	            ]
	        ];

	        $ch = curl_init($url);

	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, [
	            "Content-Type: application/json"
	        ]);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

	        $response = curl_exec($ch);

	        if (curl_errno($ch)) {
	            die("Curl error: " . curl_error($ch));
	        }

	        curl_close($ch);

	        $result = json_decode($response, true);

	        if (!isset($result['candidates'][0]['content']['parts'][0]['text'])) {
	            echo "<pre>";
	            print_r($result);
	            die("Invalid Gemini response");
	        }

	        $content = $result['candidates'][0]['content']['parts'][0]['text'];

	        // Clean markdown if exists
	        $content = trim($content);
	        $content = preg_replace('/```json|```/', '', $content);

	        $quizData = json_decode($content, true);

	        if (!$quizData) {
	            echo "<pre>";
	            echo $content;
	            die("Invalid JSON from Gemini");
	        }

	        return $quizData;
	    }
	}
?>