import AppForm from '../app-components/Form/AppForm';

Vue.component('semestre-academico-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_semestre:  '' ,
                orden:  '' ,
                sesion_clase_id:  '' ,
                
            }
        }
    }

});