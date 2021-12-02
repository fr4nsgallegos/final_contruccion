import AppForm from '../app-components/Form/AppForm';

Vue.component('sesion-clase-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_sesion_clase:  '' ,
                sigla:  '' ,
                
            }
        }
    }

});