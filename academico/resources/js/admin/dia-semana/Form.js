import AppForm from '../app-components/Form/AppForm';

Vue.component('dia-semana-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                orden:  '' ,
                sigla:  '' ,
                
            }
        }
    }

});