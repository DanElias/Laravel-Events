
function showEvent(eventId){
    $.get(`/events/${eventId}`)
    .done(function(data){
        var data = JSON.parse(data);
        var date="-";
        var hour="-";
        var dateJs=new Date(data.fecha);

        if(data.fecha != undefined){
            var month = parseInt(dateJs.getMonth(),10) + 1;
            date = dateJs.getDate()+'/'+month+'/'+dateJs.getFullYear();
            if (dateJs.getHours()<10 && dateJs.getMinutes()<10)
                hour = dateJs.getHours()+':'+'0'+dateJs.getMinutes()+" hrs";
            if (dateJs.getHours()<10 && dateJs.getMinutes()>=10)
                hour = dateJs.getHours()+':'+dateJs.getMinutes()+" hrs";
            if (dateJs.getHours()>=10 && dateJs.getMinutes()<10)
                hour = dateJs.getHours()+':'+'0'+dateJs.getMinutes()+" hrs";
            if (dateJs.getHours()>=10 && dateJs.getMinutes()>=10)
                hour = dateJs.getHours()+':'+dateJs.getMinutes()+" hrs";
        }

        const modal = $('#eventsModal');
        modal.find('#name').text("Nombre: "+data.nombre);
        modal.find('#siglas').text("Siglas: "+data.siglas);
        modal.find('#duration').text("Duración: "+data.duracion+" hrs.");
        modal.find('#asistants').text("Límite de asistentes: "+data.limiteAsistentes);
        modal.find('#cost').text("Costo: $"+data.costo+" MXN");
        modal.find('#date').text("Fecha: "+date);
        modal.find('#hour').text("Hora: "+hour);
        modal.find('#location').text("Lugar: "+data.lugar);
        modal.find('#description').text("Descripción: "+data.descripcion);
        modal.modal('show');
    });
}

function editEvent(eventId){
    $.get(`/events/${eventId}`)
    .done(function(data){
        var data = JSON.parse(data);
        var dateJs = new Date(data.fecha);
        var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
        var fecha = (new Date(dateJs - tzoffset)).toISOString().slice(0, -1);
        var res = fecha.substring(0, 16);

        const modal = $('#editEventDialog');
        modal.find('#eventIdE').val(eventId);
        modal.find('#nameEventE').val(data.nombre);
        modal.find('#siglasEventE').val(data.siglas);
        modal.find('#durationEventE').val(data.duracion);
        modal.find('#asistantsEventE').val(data.limiteAsistentes);
        modal.find('#costEventE').val(data.costo);
        modal.find('#dateEventE').val(res);
        modal.find('#locationEventE').val(data.lugar);
        modal.find('#descriptionEventE').val(data.descripcion);
        modal.modal('show');
    });
}
