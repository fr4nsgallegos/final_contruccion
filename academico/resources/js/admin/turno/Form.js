import AppForm from '../app-components/Form/AppForm';

Vue.component('turno-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                sigla:  '' ,
                orden:  '' ,
                hora_inicio:  '' ,
                hora_fin:  '' ,
                dia_semana_id:  '' ,
                sesion_clase_id:  '' ,
                
            }
        }
    }

});