let Quill  = require('quill');
let Inline = Quill.import('blots/inline');

class BoldBlot extends Inline {
}

BoldBlot.blotName = 'bold';
BoldBlot.tagName  = 'b';

class ItalicBlot extends Inline {
}

ItalicBlot.blotName = 'italic';
ItalicBlot.tagName  = 'i';

Quill.register(BoldBlot);
Quill.register(ItalicBlot);


export let quill = new Quill('#editor', {
    theme   : 'snow',
    readOnly: false,
    modules : {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],
            [{'header': 1}, {'header': 2}],
            [{'list': 'ordered'}, {'list': 'bullet'}],
            [{'script': 'sub'}, {'script': 'super'}], // superscript/subscript
            [{'direction': 'rtl'}], // text direction
            [{'header': [1, 2, 3, 4, 5, 6, false]}],
            [{'color': []}, {'background': []}], // dropdown with defaults from theme
            [{'align': []}],
            ['link', 'image'],
            ['clean'] // remove formatting button
        ],
    },
});


