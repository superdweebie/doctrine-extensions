// This code generated by Sds\DoctrineExtensions\Dojo
define([
    'dojo/_base/declare',    
    'Sds/Validator/Group',
    'Sds/Test/ClassValidator1',
    'Sds/Test/ClassValidator2'
],
function(
    declare,    
    Group,
    ClassValidator1,
    ClassValidator2
){
    // Will return a multi field validator

    return declare(
        [            
            Group        
        ],
        {
            validators: [
            	new ClassValidator1,
            	new ClassValidator2({
            		
                "option1": "a",
            		
                "option2": "b"
            
            	}	)
            ]
        }
    );
});
