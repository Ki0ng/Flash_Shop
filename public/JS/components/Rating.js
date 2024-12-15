const RATING_START = document.querySelectorAll(".rating-star");
const RATING = RATING_START.length;

RATING_FUNC = () => {
    let star_choice = 0;
    for (let i = 1; i < RATING; i++) {
        RATING_START[i].addEventListener("mouseover", () => {
            for (let j = 1; j < RATING; j++) {
                if (j <= i) {
                    RATING_START[j].style.color = "yellow";
                }
                if (j > i) {
                    RATING_START[j].style.color = "gray";
                }
            }
        })
        RATING_START[i].addEventListener("mouseout", () => {
            for (let j = 1; j < RATING; j++) {
                if (j <= star_choice) {
                    RATING_START[j].style.color = "yellow";
                } else {
                    RATING_START[j].style.color = "gray";
                }
            }
        })
        RATING_START[i].addEventListener("click", () => {
            RATING_START[0].value = i;
            star_choice = i;
        })
    }
}

RATING_FUNC()