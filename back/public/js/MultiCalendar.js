class MultiCalendar {
    constructor(container, reserva = false) {
        this.container = container;
        this.events = [];
        this.reserva = reserva;
    }

    render() {
        if (reserva) {
            let twoMonths = this.events.any(e => month(e.start) !== month(e.end) );
            this.container.append('<div id="mainCalendar"></div><div id="nextCalendar"></div>');
        }
    }

    addEvent(event) {
        this.events.push(event);
        return this;
    }
}
let calendar = new MultiCalendar(container);
