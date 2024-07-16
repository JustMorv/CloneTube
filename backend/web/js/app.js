(function (){
    'use strict';
    $('#videofile').change(ev  =>{
        $(ev.target).closest('form').trigger('submit')
    })
})