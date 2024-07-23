const _LANG_forms_validation = {
    lastname: {
        required: "Completează numele utilizatorului",
        minlength: "Completează cel puțin 3 caractere",
        lettersonlysp: "Completează doar litere"
    },
    firstname: {
        required: "Completează prenumele utilizatorului",
        minlength: "Completează cel puțin 3 caractere",
        lettersonlysp: "Completează doar litere"
    },
    email: {
        required: "Completează adresa de email a utilizatorului",
        fullemail: "Completează o adresă de email validă"
    },
    phone: {
        rangelength: "Trebuie să conțină 10 cifre",
        digits: "Completează doar cifre"
    },
    password: {
        required: "Completează noua parolă",
        minlength: "Completează cel puțin 6 caractere"
    },
};

if (typeof window !== 'undefined') {
    // Running in a browser environment
    window['_LANG_forms_validation'] = _LANG_forms_validation;
} else if (typeof global !== 'undefined') {
    // Running in a Node.js environment
    global['_LANG_forms_validation'] = _LANG_forms_validation;
} else {
    throw new Error('Unknown global object environment');
}
