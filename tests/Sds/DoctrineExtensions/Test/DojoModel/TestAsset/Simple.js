// This code generated by Sds\DoctrineExtensions\DojoModel

define ([
        'dojo/_base/declare',
        'dojo/Stateful', 
        'me/myModule1', 
        'me/myModule2'
    ],
    function (
        declare,
        Stateful, 
        MemyModule1, 
        MemyModule2
    ){
        // module:
        //		Sds/DoctrineExtensions/Test/DojoModel/TestAsset/Document/Simple

        var model = declare (
            'Sds/DoctrineExtensions/Test/DojoModel/TestAsset/Document/Simple',
            [Stateful, MemyModule1, MemyModule2],
            {
                // summary:
                //		A mirror of doctrine document Sds\DoctrineExtensions\Test\DojoModel\TestAsset\Document\Simple
                //
                // description:
                //      Use this to create documents in a browser which can the be passed to a doctrine server for
                //      persistence

                // _className: string
                //      The doctrine document class name. Don't change this one!
                _className: 'Sds\\DoctrineExtensions\\Test\\DojoModel\\TestAsset\\Document\\Simple',

                // id: custom_id
                id: undefined,

                // name: string
                name: undefined,

                toJSON: function(){
                    // summary:
                    //     Function to handle serialization

                    var json = {};
                    if (this.get('_1')) {
                        json['_1'] = this.get('_1');
                    }
                    if (this.get('_')) {
                        json['_'] = this.get('_');
                    }
                    if (this.get('id')) {
                        json['id'] = this.get('id');
                    }
                    if (this.get('name')) {
                        json['name'] = this.get('name');
                    }

                    return json;
                }
            }
        );

        model.metadata = {
            "validators": [
                {
                    "module": "Sds\\Test\\ClassValidator1",
                    "options": null
                },
                {
                    "module": "Sds\\Test\\ClassValidator2",
                    "options": {
                        "option1": "a",
                        "option2": "b"
                    }
                }
            ],
            "fields": {
                "id": {
                    "id": "idField",
                    "property": "id",
                    "title": "Id:",
                    "dataType": "custom_id",
                    "inputType": "hidden"
                },
                "name": {
                    "id": "nameField",
                    "property": "name",
                    "title": "NAME",
                    "dataType": "string",
                    "required": true,
                    "tooltip": "The simple's name",
                    "description": "This is a longer description",
                    "validators": [
                        {
                            "module": "Sds\\Test\\NameValidator1",
                            "options": null
                        },
                        {
                            "module": "Sds\\Test\\NameValidator2",
                            "options": {
                                "option1": "b",
                                "option2": "b"
                            }
                        }
                    ]
                }
            }
        };

        return model;
    }
);