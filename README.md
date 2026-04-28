# AI-Powered Knowledge Quiz Builder

## 📌 Overview

This project is a PHP-based web application that generates multiple-choice quizzes dynamically based on a user-provided topic. The system integrates with an AI model to generate questions and evaluates user responses in real time.

---

## 🏗️ System Architecture

The application follows a **layered, modular architecture** to ensure separation of concerns and scalability.

### 🔹 Layers

1. **Presentation Layer (UI)**

   * Files: `index.php`, `quiz.php`, `submit.php`
   * Handles user input, displays quiz questions, and shows results.

2. **Controller Layer**

   * File: `QuizController.php`
   * Acts as an intermediary between UI and business logic.
   * Responsible for quiz generation and evaluation.

3. **Service Layer**

   * File: `LLMService.php`
   * Handles interaction with the AI provider.
   * Converts raw AI responses into structured objects.

4. **Integration Layer (AI Client)**

   * File: `GeminiClient.php`
   * Manages external API calls to the AI model.
   * Handles prompt creation, API communication, and response parsing.

5. **Domain Layer (Models)**

   * Files: `Quiz.php`, `Question.php`
   * Represents core entities using OOP principles.
   * Encapsulates quiz data and behavior.

---

### 🔹 Data Flow

User Input → Controller → Service → AI Client → AI Model
→ Structured Data (Objects) → UI → User Response → Evaluation → Result

---

### 🔹 Key Technical Decisions

* **OOP Design**: Used classes like `Quiz` and `Question` for better encapsulation and maintainability.
* **Layered Architecture**: Ensures modularity and easy replacement of components (e.g., AI provider).
* **Session Management**: Used PHP sessions to persist quiz state across requests.
* **Mock Fallback Support**: Implemented mock data handling to ensure functionality without dependency on external APIs.
* **Loose Coupling**: AI integration is abstracted, allowing easy switching between providers.

---

## 🤖 AI Tool Selection & Reasoning

### Selected Tool: Google Gemini

### 🔹 Why Gemini?

* **Free Tier Availability**: Provides a generous free tier suitable for development and testing.
* **No Billing Barrier**: Unlike some providers, it can be used without immediate payment setup.
* **High Performance Models**: Models like `gemini-2.5-flash` offer fast and efficient responses.
* **Structured Output Capability**: Works well with prompt engineering to generate JSON-based quiz data.
* **Scalability**: Supports large input/output sizes, making it suitable for future enhancements.

---

### 🔹 Design Consideration

The system was designed with a **pluggable AI layer**, meaning:

* The AI provider (Gemini, OpenAI, etc.) can be swapped without affecting core logic.
* Only the client layer (`GeminiClient.php`) needs modification.
* This ensures flexibility and long-term maintainability.

---

## ⚠️ Limitations

* AI-generated responses may require strict prompt formatting to ensure valid JSON.
* No database persistence (currently session-based).
* No authentication or user tracking.

---

## 🚀 Future Enhancements

* Add database support for quiz history
* Provide explanations for answers using AI
* Introduce difficulty levels and scoring analytics
* Improve UI/UX with modern frontend frameworks
* Add retry and validation for AI responses

---

## 💬 Summary

This project demonstrates the integration of AI into a modular PHP application using clean architecture principles. It emphasizes flexibility, maintainability, and the ability to adapt to different AI providers with minimal changes.
