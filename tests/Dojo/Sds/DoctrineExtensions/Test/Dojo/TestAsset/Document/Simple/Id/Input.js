// This code generated by Sds\DoctrineExtensions\Dojo
define([
    'dojo/_base/declare',    
    'Sds/Form/TextBox'
],
function(
    declare,    
    TextBox
){
    // Will return an input for the id field

    return declare(
        [            
            TextBox        
        ],
        {
            type: 'hidden',
            
            name: 'id',
            
            label: 'Id'
        }
    );
});
