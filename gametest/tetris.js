// setup 
let c = document.getElementById("game-canvas")
let scoreboard = document.getElementById("scoreboard")
var ctx = c.getContext("2d");
ctx.scale(BLOCK_SIDE_LENGTH, BLOCK_SIDE_LENGTH)
let model = new GameModel(ctx)
let score = 0
let timerId
var bgm;
var endMusic;

function gamebegin(button) {
    timerId = setInterval(() => {
        newGameState()
    }, GAME_CLOCK);
    button.style.visibility = "hidden";
    bgm = new sound("sounds/bgm.mp3");
    endMusic = new sound("sounds/end.mp3");
    bgm.play();
}


let newGameState = () => {
    fullSend()
    if (model.fallingPiece === null) {
        const rand = Math.round(Math.random() * 6) + 1
        const newPiece = new Piece(SHAPES[rand], ctx)
        model.fallingPiece = newPiece
        model.moveDown()
    } else {
        model.moveDown()
    }
}

const fullSend = () => {
    const allFilled = (row) => {
        for (let x of row) {
            if (x === 0) {
                return false
            }
        }

        return true
    }

    for (let i = 0; i < model.grid.length; i++) {
        if (allFilled(model.grid[i])) {
            score += SCORE_WORTH
            model.grid.splice(i, 1)
            model.grid.unshift([0, 0, 0, 0, 0, 0, 0, 0, 0, 0])
        }
    }

    scoreboard.innerHTML = "Score: " + String(score)
}

document.addEventListener("keydown", (e) => {
    e.preventDefault()
    switch (e.keyCode) {
        case 38:
            model.rotate()
            break
        case 39:
            model.move(true)
            break
        case 40:
            model.moveDown()
            break
        case 37:
            model.move(false)
            break
    }
})

function sound(src) {
    this.sound = document.createElement("audio");
    this.sound.src = src;
    this.sound.setAttribute("preload", "auto");
    this.sound.setAttribute("controls", "none");
    this.sound.style.display = "none";
    document.body.appendChild(this.sound);
    this.play = function () {
        this.sound.play();
    }
    this.stop = function () {
        this.sound.pause();
    }
}



function gameOver() {
    bgm.stop();
    endMusic.play();
    alert("Game over!")
    clearInterval(timerId)
    // button alert game over
    let btn = document.createElement('input');
    btn.id = 'end';
    btn.setAttribute('type', 'submit');
    btn.setAttribute('name', 'score');
    btn.setAttribute('value', score);
    document.getElementById("form").appendChild(btn);
}

