import AppForm from '../app-components/Form/AppForm';

Vue.component('asignatura-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_asignatura:  '' ,
                sigla:  '' ,
                
            }
        }
    }

});