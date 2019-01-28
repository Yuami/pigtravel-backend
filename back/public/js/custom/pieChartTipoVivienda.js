$(function () {
    let margin = {top: 50, bottom: 50, right: 50, left: 50},
        width = 900 - margin.right - margin.left,
        height = 900 - margin.top - margin.bottom,
        radio = width / 2;
    let color = d3.scaleOrdinal(['#F6F7FC', '#314D68', '#FA6839', '#22CDF3', '#4daf4a', '#377eb8', '#ff7f00', '#984ea3', '#e41a1c']);
    let svg = d3.select("body").append("svg:svg")
        .attr('width', width + 'px')
        .attr('height', height + 'px');
    let g = svg.append("g").attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
    let pie = d3.pie().value(function (d) {
        console.log(d);
        return d.idTipo_vivienda;
    });
    let path = d3.arc().outerRadius(radio).innerRadius(0);
    var label = d3.arc()
        .outerRadius(radio)
        .innerRadius(radio - 300);
    d3.json('api.php', function (error, data) {
        if (error) {
            throw error;
        }
        // console.log(data);
        let arc = g.selectAll(".arc")
            .data(pie(data)).enter().append("g").attr("class", "arc");
        arc.append("path").attr("d", path).attr("fill", function (d) {
            return color(d.data.idTipo_vivienda);
        });
        // console.log(arc);
        arc.append("text")
            .attr("transform", function (d) {
                return "translate(" + label.centroid(d) + ")";
            })
            .text(function (d) {
                return d.data.nombre;
            });
    });
    svg.append("g")
        .attr("transform", "translate(" + (width / 2 - 120) + "," + 20 + ")")
        .append("text")
        .text("Browser use statistics - Jan 2017")
        .attr("class", "title")
})