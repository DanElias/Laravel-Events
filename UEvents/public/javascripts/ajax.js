function showUser(userId){
    var data = {userId: userId};
     $.post('/usuariosInformacion', data)
    .done(function(data){
        var roles='Administrador de';
        var cont = roles.length;
         
        if(data.roles.includes(1)){
            roles = "Usuario móvil";
        }
        else if(data.roles.includes(8)){
                roles = "Superusuario";
        }
        else {
            if(data.roles.includes(2) ){
                roles = roles + " eventos";
                cont--;
                if(cont>1)
                    roles = roles + ',';
            } 
            if(data.roles.includes(3)){
                roles = roles + " patrocinadores";
                cont--;
                if(cont>1)
                    roles = roles + ',';
            }
            if(data.roles.includes(4)){
                roles = roles + " recompensas";
                cont--;
                if(cont>1)
                    roles = roles + ',';  
            } 
            if(data.roles.includes(5)){
                roles = roles + " semillas";
                cont--;
                if(cont>1)
                    roles = roles + ','; 
            }    
            if(data.roles.includes(6)){
                roles = roles + " mariposas";
                cont--;
                if(cont>1)
                    roles = roles + ','; 
            }    
            if(data.roles.includes(7)){
                roles = roles + " usuarios";
                cont--;
            }  
        }
        
        const modal = $('#usersModal');
        modal.find('#name').text('Nombre completo: '+data.name+' '+data.lastname);
        modal.find('#email').text("Email: "+data.email);
        modal.find('#points').text("Puntos: "+data.points);
        modal.find('#roles').text("Roles: "+roles);
        modal.modal('show');
    });
}

function editUser(userId){
    var data = {userId: userId};
     $.post('/usuariosInformacion', data)
    .done(function(data){
        const modal = $('#editUserDialog');
        modal.find('#userIdE').val(userId); 
        modal.find('#nameUserE').val(data.name);
        modal.find('#lastNameUserE').val(data.lastname);
        modal.find('#emailUserE').val(data.email);
    
            if(data.roles.includes(2) ){
                modal.find('#eventsRoleE').prop('checked', true);
            } else {
                modal.find('#eventsRoleE').prop('checked', false);
            }
            if(data.roles.includes(3)){
                modal.find('#sponsorsRoleE').prop('checked', true);
            } else {
                modal.find('#sponsorsRoleE').prop('checked', false);
            }
            if(data.roles.includes(4)){
                modal.find('#awardsRoleE').prop('checked', true);
            } else {
                modal.find('#awardsRoleE').prop('checked', false);
            }
            if(data.roles.includes(5)){
                modal.find('#seedsRoleE').prop('checked', true); 
            } else {
                modal.find('#seedsRoleE').prop('checked', false); 
            }
            if(data.roles.includes(6)){
                modal.find('#butterfliesRoleE').prop('checked', true); 
            } else {
               modal.find('#butterfliesRoleE').prop('checked', false);  
            }  
            if(data.roles.includes(7)){
                modal.find('#usersRoleE').prop('checked', true);
            }  else {
                modal.find('#usersRoleE').prop('checked', false);
            }  
    
        modal.modal('show');
    });
}

function deleteUser(userId){
    const modal = $('#deleteUserDialog');
    modal.find('#userIdD').val(userId);
    modal.modal('show');
}


function showEvent(eventId){
    var data = {id: eventId};
    $.post('/eventosInformacion', data)
    .done(function(data){
        
        var date="-";
        var hour="-";
        var dateJs=new Date(data.date);
         
        if(data.date != undefined){
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
        modal.find('#name').text("Nombre: "+data.name);
        modal.find('#date').text("Fecha: "+date);
        modal.find('#hour').text("Hora: "+hour);
        modal.find('#location').text("Lugar: "+data.location);
        modal.find('#link').text("Link al evento: "+data.link);
        modal.find('#description').text("Descripción: "+data.description);
        modal.modal('show');
    });
}

function showSeed(seedId){
    var data = {id: seedId};
    $.post('/semillasInformacion', data)
    .done(function(data){
        const modal = $('#seedsModal');
        modal.find('#name').text("Nombre: "+data.name);
        modal.find('#description').text("Descripción: "+data.description);
        modal.modal('show');
    });
}

function showReward(rewardId){
    var data = {id: rewardId};
    $.post('/recompensasInformacion', data)
    .done(function(data){
        
        var date = "-";
        var dateJs = new Date(data.validity);
         
        if(data.validity != undefined){
            var month = parseInt(dateJs.getMonth(),10) + 1;
            date = dateJs.getDate()+'/'+month+'/'+dateJs.getFullYear();
        }
        
        const modal = $('#rewardsModal');
        modal.find('#titulo').text("Título: "+data.titulo);
        modal.find('#company').text("Empresa: "+data.company);
        modal.find('#validity').text("Vigencia: "+date);
        modal.find('#description').text("Descripción: "+data.description);
        modal.modal('show');
    });
}

function showSponsor(sponsorId){
    var data = {id: sponsorId};
    $.post('/patrocinadoresInformacion', data)
    .done(function(data){
        const modal = $('#sponsorsModal');
        modal.find('#name').text("Nombre: "+data.name);
        modal.find('#description').text("Descripción: "+data.description);
        modal.modal('show');
    });
}

function showButterfly(butterflyId){
    var data = {id: butterflyId};
    $.post('/mariposasInformacion', data)
    .done(function(data){
        
        var date="-";
        var hour="-";
        var dateJs=new Date(data.date);
         
        if(data.date != undefined){
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
     
        const modal = $('#butterfliesModal');
        modal.find('#date').text("Fecha: "+date);
        modal.find('#hour').text("Hora: "+hour);
        modal.find('#location').text("Coordenadas: ("+data.latitude+", "+data.longitude+")");
        modal.find('#latitude').text("Latitud: "+data.latitude);
        modal.find('#longitude').text("Longitud: "+data.longitude);
        modal.modal('show');
    });
}




