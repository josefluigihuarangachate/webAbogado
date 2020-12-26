(function (w, d, s, id) {
    if (typeof (w.webpushr) !== 'undefined')
        return;
    w.webpushr = w.webpushr || function () {
        (w.webpushr.q = w.webpushr.q || []).push(arguments)
    };
    var js, fjs = d.getElementsByTagName(s)[0];
    js = d.createElement(s);
    js.id = id;
    js.src = "https://cdn.webpushr.com/app.min.js";
    fjs.parentNode.appendChild(js);
}(window, document, 'script', 'webpushr-jssdk'));
webpushr(
        'setup',
        {
            'key': 'BGk7-JRUCYl4IiJzJgdr8w2itrI_r9SD9QiWbpPmsx91Q5Sf3nt7f4pkdJkr84yij1hfl69HhMNA3ahUsmTyI3o',
            'integration': 'popup'
        });

webpushr(
        'attributes',
        {
            "IdProfile" : IdProfile, // ESTE ID ESTA DECLARADO EN EL HEAD QUE SE INCLUYE EN TODOS LOS ARCHIVOS
        }
);