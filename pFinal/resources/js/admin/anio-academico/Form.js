import AppForm from '../app-components/Form/AppForm';

Vue.component('anio-academico-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_anio_academico:  '' ,
                sigla:  '' ,
                
            }
        }
    }

});