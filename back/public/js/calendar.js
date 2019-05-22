function initCalendar($calendarDiv, displayDate, events) {
  return $calendarDiv.fullCalendar({
    themeSystem: "bootstrap4",
    defaultDate: displayDate,
    header: {
      right: ""
    },
    events: events
  });
}

function day(fecha) {
  return fecha.split("-")[2];
}

function nextDay(fecha) {
  return moment(fecha).add(1, "days");
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
      title: "Entrada",
      start: fInicio
    },
    {
      title: "Salida",
      start: fFin
    },
    {
      start: moment(fInicio)
        .startOf("day")
        .format("YYYY-MM-DD"),
      end: moment(fFin)
        .add(1, "day")
        .startOf("day")
        .format("YYYY-MM-DD"),
      rendering: "background"
    }
  ];
  return [
    initCalendar(mainCalendar, fInicio, event),
    initCalendar(nextCalendar, nextMonth(fInicio), event)
  ];
}

$(() => {
  let mainC = $("#mainCalendar");
  let nextC = $("#nextCalendar");
  let calendars = setCalendar(
    mainC,
    nextC,
    mainC.data("f_inicio"),
    mainC.data("f_fin")
  );

  let next = $("#nextMonth");
  let prev = $("#prevMonth");
  next.click(() => {
    calendars.forEach(c => c.fullCalendar("next"));
  });

  prev.click(() => {
    calendars.forEach(c => c.fullCalendar("prev"));
  });
});
