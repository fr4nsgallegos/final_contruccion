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
                sesion_clase_id:  '' ,
                
            }
        }
    }

});