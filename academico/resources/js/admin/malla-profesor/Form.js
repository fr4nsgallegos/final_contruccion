import AppForm from '../app-components/Form/AppForm';

Vue.component('malla-profesor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                asignatura_id:  '' ,
                admin_users_id:  '' ,
                curso_academico_id:  '' ,
                
            }
        }
    }

});