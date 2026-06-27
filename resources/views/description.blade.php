@extends('layouts.app')

@section('content')
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #ffffff; 
    color: #000; 
}

h2 {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 20px;
    font-size: 26px;
    color: #000; 
    position: relative;
    padding-bottom: 8px;
}
h2::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background-color: #000; 
    margin: 8px auto 0;
    border-radius: 2px;
}
ul {
    list-style: none;
}

.quiz-container {
  max-width: 700px;
  margin: 0 auto;
  padding: 40px 30px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  color: #000; 
}

.content_author {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  margin-bottom: 50px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}
.image-container {
  height: 170px;
  overflow: hidden;
  margin-bottom: 15px;
}
.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

div.question-block {
  background: #fff;
  padding: 20px;
  margin: 15px auto;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  max-width: 700px;
  transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
}
.question-block:hover {
  transform: translateY(-3px);
  box-shadow: 0 4px 16px rgba(0,0,0,0.2);
}


input[type="radio"] {
  margin-right: 10px;
  accent-color: #007bff;
}
input[type="text"] {
  width: calc(100% - 20px);
  max-width: 300px;
  padding: 8px 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  transition: border-color 0.3s;
}
input[type="text"]:focus {
  border-color: #2E86C1;
  outline: none;
}

.correct {
  background-color: #d4edda;
  transition: background-color 0.5s ease;
}
.incorrect {
  background-color: #f8d7da;
  transition: background-color 0.5s ease;
}
</style>

<div class="quiz-container">

    <div class="content_author">
        <div class="image-container">
            <img src="{{ asset($author->image) }}" alt="{{ $author->name }}">
        </div>
        <h2>{{ $author->name }}</h2>
        <p>{{ $author->description }}</p>
    </div>

    <h2>Вопросы</h2>
    <div style="text-align:center; margin-bottom:20px;">
        <h2 style="font-size: 22px;">Что нужно сделать</h2>
        <ul style="max-width: 600px; margin: 0 auto; padding-left: 20px; font-size: 16px; line-height: 1.4;">
            <li><strong>Прочитайте каждый вопрос.</strong></li>
            <li><strong>Если доступны варианты ответов,</strong> выберите один правильный, поставив галочку рядом с нужным вариантом.</li>
        </ul>
    </div>

    @foreach($questions as $question)
        <div class="question-block" data-question-id="{{ $question->id }}" data-answer="{{ $question->answer }}" data-type="quiz">
            <strong>Вопрос №{{ $loop->iteration }}:</strong> {{ $question->questions }} <br>
            @php
                $options = json_decode($question->option);
            @endphp
            @if(is_array($options))
                @foreach($options as $index => $option)
                    <label style="display:inline-block; margin-right:15px;">
                        <input type="radio" name="question_{{ $question->id }}" value="{{ $index + 1 }}">
                        {{ $option }}
                    </label>
                @endforeach
            @else
                <p>Нет вариантов ответа</p>
            @endif
        </div>
    @endforeach

    <h2>Строки</h2>
    <div style="text-align:center; margin-bottom:20px;">
        <h2 style="font-size: 22px;">Что нужно сделать</h2>
        <ul style="max-width: 600px; margin: 0 auto; padding-left: 20px; font-size: 16px; line-height: 1.4;">
            <li><strong>Прочитайте каждый вопрос.</strong></li>
            <li><strong>Если доступны варианты ответов,</strong> выберите один правильный, поставив галочку рядом с нужным вариантом.</li>
        </ul>
    </div>
    @foreach($strings as $string)
        <div class="question-block" data-question-id="{{ $string->id }}" data-answer="{{ $string->answer }}" data-type="quiz">
            <strong>№{{ $loop->iteration }}:</strong> {{ $string->questions }} <br>
            @php
                $options = json_decode($string->option);
            @endphp
            @if(is_array($options))
                @foreach($options as $index => $option)
                    <label style="display:inline-block; margin-right:15px;">
                        <input type="radio" name="question_{{ $string->id }}" value="{{ $index + 1 }}">
                        {{ $option }}
                    </label>
                @endforeach
            @else
                <p>Нет вариантов ответа</p>
            @endif
        </div>
    @endforeach

    <h2>Ребусы</h2>
    <div style="text-align:center; margin-bottom:20px;">
        <h2 style="font-size: 22px;">Что нужно сделать</h2>
        <ul style="max-width: 600px; margin: 0 auto; padding-left: 20px; font-size: 16px; line-height: 1.4;">
            <li><strong>Посмотрите внимательно на ребус.</strong></li>
            <li><strong>Разгадайте и напишите ваш ответ в поле.</strong></li>
        </ul>
    </div>
    @foreach($rebuses as $rebus)
        <strong>№{{ $loop->iteration }}:</strong>
        <div class="question-block" data-question-id="{{ $rebus->id }}" data-answer="{{ $rebus->answer }}" data-type="text">
            <img src="{{ asset($rebus->img) }}" alt="Ребус" style="max-height:200px; margin-bottom:10px; border-radius:8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;">
            <br>
            <input type="text" placeholder="Ваш ответ" class="user-input" style="width: calc(100% - 20px); max-width: 300px; padding: 8px 10px; border-radius: 6px; border: 1px solid #ccc; transition: border-color 0.3s;">
        </div>
    @endforeach

    <button id="checkAnswers" class="next_submit">Проверить ответы</button>
</div>

<!-- Скрипт для проверки -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('checkAnswers');
    if (btn) {
        btn.addEventListener('click', () => {
            let correctCount = 0;
            let wrongQuestions = [];
            const questionBlocks = document.querySelectorAll('.question-block');
            const totalQuestions = questionBlocks.length;

            questionBlocks.forEach(block => {

                block.classList.remove('correct', 'incorrect');

                // Получаем правильный ответ
                const answer = (block.dataset.answer || '').trim();
                const type = block.dataset.type;

                // Получаем номер вопроса
                const questionNumberElement = block.querySelector('strong');
                let questionNumberText = '';
                if (questionNumberElement) {
                    questionNumberText = questionNumberElement.textContent.trim();
                }

                if (type === 'quiz') {
                    const selected = block.querySelector('input[type="radio"]:checked');
                    if (selected) {
                        if (selected.value === answer) {
                            block.classList.add('correct');
                            correctCount++;
                        } else {
                            block.classList.add('incorrect');
                            wrongQuestions.push(questionNumberText);
                        }
                    } else {
                        // Не выбран вариант
                        block.classList.add('incorrect');
                        wrongQuestions.push(questionNumberText);
                    }
                } else if (type === 'text') {
                    const userInput = block.querySelector('.user-input').value.trim().toLowerCase();

                    // Обработка массива answer
                    let correctAnswers = [];
                    try {
                        correctAnswers = JSON.parse(block.dataset.answer);
                        if (!Array.isArray(correctAnswers)) {
                            correctAnswers = [block.dataset.answer];
                        }
                    } catch (e) {
                        correctAnswers = [block.dataset.answer];
                    }

                    // Проверка: совпадает ли введенный ответ хотя бы с одним из правильных ответов
                    const isCorrect = correctAnswers.some(ans => userInput === ans.trim().toLowerCase());

                    if (isCorrect) {
                        block.classList.add('correct');
                        correctCount++;
                    } else {
                        block.classList.add('incorrect');
                        wrongQuestions.push(questionNumberText);
                    }
                }
            });

            // Отправка результатов
            fetch('/save-results', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    correct: correctCount,
                    total: totalQuestions,
                    wrongQuestions: wrongQuestions
                })
            })
            .then(res => res.json())
            .then(data => {
                window.location.href = '/results/' + data.session_id;
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка при отправке данных.');
            });
        });
    }
});
</script>
@endsection