import AppForm from '../app-components/Form/AppForm';

Vue.component('local-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_local:  '' ,
                sigla:  '' ,
                tipo_local:  '' ,
                
            }
        }
    }

});