

let generate = document.getElementById("btn-sim");
let time = document.getElementById("time");
let shot = document.getElementById("shots");
let score = document.getElementById("score");


generate.addEventListener("click", scoreGenerator);


function scoreGenerator() {
    let shots = 0;
    let randomNum;
    let balls = 15;
    let timeSec = 0;
    let totalScore = 0;

    while (balls > 0) {
        randomNum = Math.floor(Math.random() * 100 + 1)
        if (randomNum > 50) {
            balls -= 1;
        }
        timeSec += Math.floor(Math.random() * 25 + 5);
        shots++;
    }

    totalScore = Math.trunc(timeSec/shots);
    time.setAttribute('value', timeSec);
    shot.setAttribute('value', shots);
    score.setAttribute('value', totalScore);
}