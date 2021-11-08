import AppForm from '../app-components/Form/AppForm';

Vue.component('profesor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                apellidos:  '' ,
                email:  '' ,
                dni:  '' ,
                usuario:  '' ,
                password:  '' ,
                
            }
        }
    }

});