import AppForm from '../app-components/Form/AppForm';

Vue.component('tipologia-clase-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});