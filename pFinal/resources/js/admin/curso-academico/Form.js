import AppForm from '../app-components/Form/AppForm';

Vue.component('curso-academico-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre_curso_academico:  '' ,
                
            }
        }
    }

});