$(document).ready(function () {
    let apiKey = '364b5a1d708f421fb1a852b8b7112a96';
    $.getJSON('https://api.ipgeolocation.io/ipgeo?apiKey=' + apiKey, function(data) {
        console.log(data);
        const postData = {
            ip: data.ip,
            city: data.city,
            time: data.time_zone.current_time,
            time_zone: data.time_zone.name,
            userAgent: navigator.userAgent
        }
        visited(postData)
    });
})

function visited(data) {
    $.ajax({
        url: 'api/visitors',
        method: 'post',
        data: data,
        dataType: 'json',
    }).done(function (response) {

    }).fail(function (error) {
        failResponse(error);
    })
}
