
      document.addEventListener('DOMContentLoaded', function() {
        
        let formulario = document.querySelector("form");
        var calendarEl = document.getElementById('agenda');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          
          locale:"es",

          headerToolbar: {
            left: 'prev,next today',

            center:'title',

            right: 'dayGridMonth,timeGridWeek,listWeek',
          },

          events: "http://localhost:8000/admin/eventos/mostrar",
          
          dateClick:function(info){
            formulario.reset();

            //formulario.start.value=info.dateStr;
            //formulario.end.value=info.dateStr;

            $("#evento").modal("show");
            console.log(info);
          },

          eventClick:function(info){
            var evento = info.event;
            console.log(evento);

            axios.post("/admin/eventos/editar/"+info.event.id).
          then(
            (respuesta) =>{
              formulario.id.value=respuesta.data.id;
              formulario.title.value=respuesta.data.title;
              formulario.descripcion.value=respuesta.data.descripcion;
              formulario.start.value=respuesta.data.start;
              formulario.end.value=respuesta.data.end;
              formulario.malla_profesor_id.value=respuesta.data.malla_profesor_id;
              formulario.local_id.value=respuesta.data.local_id;
              $("#evento").modal("show");
            }
            ).catch(
              error=>{
                if(error.response){
                  console.log(error.response.data);
                }
              }
            )

          }

          /*events:[
            {
              titulo:"mi evento",
              start:"2021-12-08 21:15:25"
            }
          ]*/

        });
        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click", function(){

          enviarDatos("/admin/eventos/agregar/");

        });

        document.getElementById("btnEliminar").addEventListener("click", function(){

          enviarDatos("/admin/eventos/borrar/"+formulario.id.value);
          console.log(formulario.id.value);

        });

        document.getElementById("btnModificar").addEventListener("click", function(){

          enviarDatos("/admin/eventos/actualizar/"+formulario.id.value);
          console.log(formulario.id.value);

        });

        function enviarDatos(url){

          const datos= new FormData(formulario);

          nuevaURL= baseURL+url;
          axios.post(nuevaURL, datos).
          then(
            (respuesta) =>{
              calendar.refetchEvents();
              $("#evento").modal("hide");
            }
            ).catch(
              error=>{
                if(error.response){
                  console.log(error.response.data);
                }
              }
            )
        }

      });