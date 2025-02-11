import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


document.addEventListener("DOMContentLoaded", function () {
    let quizFilters = document.querySelectorAll("[id^='quizFilter']"); // Prende tutti i filtri

    quizFilters.forEach((filter, index) => {
        filter.addEventListener("change", function () {
            let selectedQuiz = this.value;
            
            let questionSelect = document.querySelector("#answer_collection_answers_" + index + "_question");


            console.log(questionSelect);
            if (questionSelect) {
                console.log(questionSelect);
                let options = questionSelect.querySelectorAll("option");

                questionSelect.value = "";

                options.forEach(option => {
                    let quizId = option.getAttribute("data-quiz-id");

                    if (selectedQuiz === "" || quizId === selectedQuiz) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                });
            }
        });
    });
});
