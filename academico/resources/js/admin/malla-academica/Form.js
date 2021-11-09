import AppForm from '../app-components/Form/AppForm';

Vue.component('malla-academica-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                anio_creacion:  '' ,
                cantidad_anios:  '' ,
                cantidad_semestre:  '' ,
                
            }
        }
    }

});