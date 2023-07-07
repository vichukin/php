
let selectedstar = 0;
$('.fa').on("mouseenter", (e) => {
    let thisstar = e.target.id.slice(-1); // Получение номера текущей звезды
    let stars = $('#stars');
    for (let i = 1; i <= thisstar; i++) {
        stars.find(`#star${i}`).addClass('checked'); // Добавление класса для оранжевого цвета
    }
});
$('.fa').on("mouseleave", (e) => {
    let thisstar = e.target.id.slice(-1); // Получение номера текущей звезды
    let stars = $('#stars');
    for (let i = 5; i >= thisstar; i--) {
        stars.find(`#star${i}`).removeClass('checked'); // Удаление класса для оранжевого цвета
    }
});
$('.fa').on("click", (e) => {
    let thisstar = e.target.id.slice(-1); // Получение номера текущей звезды
    selectedstar = thisstar;
    $("#selstars").val(selectedstar);
});
$('.fa').on("click", (e) => {
    let thisstar = e.target.id.slice(-1); // Получение номера текущей звезды
    selectedstar = thisstar;
    $("#selstars").val(selectedstar);
});
$('#stars').on("mouseleave", () => {
    selectStars(selectedstar);
});

function selectStars(star) {

    let stars = $('#stars');
    for (let i = 1; i <= star; i++) {
        stars.find(`#star${i}`).addClass('checked'); // Добавление класса для оранжевого цвета
    }
}
getCities("hotci","hotco");