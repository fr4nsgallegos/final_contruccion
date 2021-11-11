import AppForm from '../app-components/Form/AppForm';

Vue.component('local-tipologium-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                local_id:  '' ,
                tipologia_clase_id:  '' ,
                
            }
        }
    }

});