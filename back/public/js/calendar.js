function initCalendar($calendarDiv, displayDate, events) {
    return $calendarDiv.fullCalendar({
        themeSystem: 'bootstrap4',
        defaultDate: displayDate,
        header: {
            right: ''
        },
        events: events
    });
}

function day(fecha) {
    return fecha.split("-")[2];
}

function nextDay(fecha) {
    return moment(fecha).add(1, 'days');
}

function month(fecha) {
    return fecha.split("-")[1];
}

function nextMonth(fecha) {
    let m = (month(fecha) * 1 + 1) % 12;
    m = m === 0 ? 12 : m;
    let arr = fecha.split("-");
    arr[1] = m;
    return arr.join("-");
}

function setCalendar(mainCalendar, nextCalendar, fInicio, fFin) {
    let event = [
        {
            title: 'Entrada',
            start: fInicio
        },
        {
            title: 'Salida',
            start: fFin
        },
        {
            start: moment(fInicio).startOf('day').format('YYYY-MM-DD'),
            end: moment(fFin).add(1, 'day').startOf('day').format('YYYY-MM-DD'),
            rendering: 'background',
        }
    ];
    return [
        initCalendar(mainCalendar, fInicio, true, event),
        initCalendar(nextCalendar, nextMonth(fInicio), false, event)
    ];
}


$(() => {
    let mainC = $('#mainCalendar');
    let nextC = $('#nextCalendar');
    let calendars = setCalendar(mainC, nextC, '2018-11-12T13:00', '2018-11-17T12:00');

    let next = $('#nextMonth');
    let prev = $('#prevMonth');
    next.click(() => {
        calendars.forEach(c => c.fullCalendar('next'));
    });

    prev.click(() => {
        calendars.forEach(c => c.fullCalendar('prev'));
    });
});