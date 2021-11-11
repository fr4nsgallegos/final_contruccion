import AppForm from '../app-components/Form/AppForm';

Vue.component('malla-curso-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cantidad_horas_tipologia:  '' ,
                cantidad_credito:  '' ,
                malla_academica_id:  '' ,
                asignatura_id:  '' ,
                tipologia_clase_id:  '' ,
                semestre_academico_id:  '' ,
                anio_academico_id:  '' ,
                
            }
        }
    }

});