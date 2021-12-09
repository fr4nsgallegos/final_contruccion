import AppForm from '../app-components/Form/AppForm';

Vue.component('evento-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                descripcion:  '' ,
                start:  '' ,
                end:  '' ,
                malla_profesor_id:  '' ,
                local_id:  '' ,
                
            }
        }
    }

});