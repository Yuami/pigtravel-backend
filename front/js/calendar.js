function initCalendar($calendarDiv, displayDate, isMain, events) {
    return $calendarDiv.fullCalendar({
        themeSystem: 'bootstrap4',
        defaultDate: displayDate,
        header: {
            right: ''
        },
        events: events
    });
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
            start: fInicio,
            end: fFin,
            rendering: 'background',
        },
        {
            title: 'Entrada',
            start: fInicio,
        },
        {
            title: 'Salida',
            start: fFin,
        }
    ];
    return [
        initCalendar(mainCalendar, fInicio, true, event),
        initCalendar(nextCalendar, nextMonth(fInicio), false, event)
    ];
}

$(() => {
    let calendars = setCalendar($('#mainCalendar'), $('#nextCalendar'), '2018-11-12T13:00', '2018-11-17T12:00');
    let next = $('#nextMonth');
    let prev = $('#prevMonth');
    next.click(() => {
        calendars.forEach(c => c.fullCalendar('next'));
    });

    prev.click(() => {
        calendars.forEach(c => c.fullCalendar('prev'));
    });
});