const header = document.querySelector(".calendar h3");
const dates = document.querySelector(".dates");
const navs = document.querySelectorAll("#prev, #next");

const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

let date = new Date();
let month = date.getMonth();
let year = date.getFullYear();

function renderCalendar() {
    const start = new Date(year, month, 1).getDay();
    const endDate = new Date(year, month + 1, 0).getDate();
    const end = new Date(year, month, endDate).getDay();
    const endDatePrev = new Date(year, month, 0).getDate();

    let datesHtml = daysOfWeek.map(day => `<li class="day-name">${day}</li>`).join('');

    for (let i = start; i > 0; i--) {
        datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
    }

    for (let i = 1; i <= endDate; i++) {
        let className = (i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) ? ' class="today"' : "";
        datesHtml += `<li${className}>${i}</li>`;
    }

    for (let i = end; i < 6; i++) {
        datesHtml += `<li class="inactive">${i - end + 1}</li>`;
    }

    dates.innerHTML = datesHtml;
    header.textContent = `${months[month]} ${year}`;
}

navs.forEach(nav => {
    nav.addEventListener("click", e => {
        const btnId = e.target.id;
        if (btnId === "prev") {
            month = (month === 0) ? 11 : month - 1;
            year = (month === 11) ? year - 1 : year;
        } else if (btnId === "next") {
            month = (month === 11) ? 0 : month + 1;
            year = (month === 0) ? year + 1 : year;
        }
        renderCalendar();
    });
});

renderCalendar();
