// Utility function to merge objects deeply
function merge_object_deep(target, source) {
    for(const key in source) {
        if(source[key] instanceof Object && key in target) {
            Object.assign(source[key], merge_object_deep(target[key], source[key]));
        }
    }

    Object.assign(target || {}, source);

    return target;
}

// Function to handle and remember tab clicks and manage active tabs
function handleTabClick(e) {
    const clickedTabId = $(this).attr('href');
    let activeTabs = localStorage.getItem('active_tab') ? localStorage.getItem('active_tab').split(',') : [];
    const sameLevelTabs = $(e.target).parents('.nav-tabs').find('[data-toggle="pill"]');

    sameLevelTabs.each(function (index, element) {
        const tabId = $(element).attr('href');

        // Remove inactive tabs from the list of active tabs
        if (clickedTabId !== tabId && activeTabs.includes(tabId)) {
            activeTabs = activeTabs.filter(activeTab => activeTab !== tabId);
        }
    });

    // Add the clicked tab to the list of active tabs if not present
    if (!activeTabs.includes($(e.target).attr('href'))) {
        activeTabs.push($(e.target).attr('href'));
    }

    // Update local storage with the new list of active tabs
    localStorage.setItem('active_tab', activeTabs.join(','));
}

// Event handler for clicks on anchor elements with data-toggle attribute set to "pill"
$('a[data-toggle="pill"]').on('click', handleTabClick);

// Show active tabs on page load
const activeTabs = localStorage.getItem('active_tab') ? localStorage.getItem('active_tab').split(',') : [];

if (activeTabs.length > 0) {
    activeTabs.forEach(tab => {
        $('[data-toggle="pill"][href="' + tab + '"]').tab('show');
    });
}

function showTab(tab) {
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
}

function iconFormat(icon) {
    if(!icon.id) {
        return icon.text;
    }

    return '<i class="' + $(icon.element).data('icon') + '"></i> ' + icon.text;
}

let _last_focused_field;

const TaskTrail = function () {
    const formsValidation = function() {
        if(!$().validate) {
            console.warn('Warning - validate.min.js is not loaded.');
            return;
        }

        $.validator.addMethod("fullemail", function(value, element) {
            return this.optional(element) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
        }, TaskTrail.translate('email', 'fullemail'));

        $.validator.addMethod("lettersonlysp", function(value, element) {
            return this.optional(element) || /^[A-Za-z\s]+$/.test(value);
        }, TaskTrail.translate('lastname', 'lettersonlysp'));

        if($("#f-new-user" ).length) {
            const new_user_validator = $('#f-new-user').validate({
                errorClass: 'validation-invalid-label',
                successClass: 'validation-valid-label',
                validClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    Syncshop.block();

                    form.submit();
                },
                rules: {
                    lastname: {
                        minlength: 3,
                        required: true,
                        lettersonlysp: true
                    },
                    firstname: {
                        minlength: 3,
                        required: true,
                        lettersonlysp: true
                    },
                    email: {
                        required: true,
                        fullemail: true
                    },
                    phone: {
                        rangelength: [10, 10],
                        digits: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    lastname: {
                        required: TaskTrail.translate('lastname', 'required'),
                        minlength: TaskTrail.translate('lastname', 'minlength'),
                        lettersonlysp: TaskTrail.translate('lastname', 'lettersonlysp'),
                    },
                    firstname: {
                        required: TaskTrail.translate('firstname', 'required'),
                        minlength: TaskTrail.translate('firstname', 'minlength'),
                        lettersonlysp: TaskTrail.translate('firstname', 'lettersonlysp')
                    },
                    email: {
                        required: TaskTrail.translate('email', 'required'),
                        fullemail: TaskTrail.translate('email', 'fullemail'),
                    },
                    phone: {
                        rangelength: TaskTrail.translate('phone', 'rangelength'),
                        digits: TaskTrail.translate('phone', 'digits'),
                    },
                    password: {
                        required: TaskTrail.translate('password', 'required'),
                        minlength: TaskTrail.translate('password', 'minlength'),
                    }
                }
            });
        }

        if($("#f-edit-user" ).length) {
            const edit_user_validator = $('#f-edit-user').validate({
                errorClass: 'validation-invalid-label',
                successClass: 'validation-valid-label',
                validClass: 'validation-valid-label',
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass);
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    Syncshop.block();

                    form.submit();
                },
                rules: {
                    lastname: {
                        minlength: 3,
                        required: true,
                        lettersonlysp: true
                    },
                    firstname: {
                        minlength: 3,
                        required: true,
                        lettersonlysp: true
                    },
                    email: {
                        required: true,
                        fullemail: true
                    },
                    phone: {
                        rangelength: [10, 10],
                        digits: true
                    },
                    password: {
                        minlength: 6
                    }
                },
                messages: {
                    lastname: {
                        required: TaskTrail.translate('lastname', 'required'),
                        minlength: TaskTrail.translate('lastname', 'minlength'),
                        lettersonlysp: TaskTrail.translate('lastname', 'lettersonlysp'),
                    },
                    firstname: {
                        required: TaskTrail.translate('firstname', 'required'),
                        minlength: TaskTrail.translate('firstname', 'minlength'),
                        lettersonlysp: TaskTrail.translate('firstname', 'lettersonlysp')
                    },
                    email: {
                        required: TaskTrail.translate('email', 'required'),
                        fullemail: TaskTrail.translate('email', 'fullemail'),
                    },
                    phone: {
                        rangelength: TaskTrail.translate('phone', 'rangelength'),
                        digits: TaskTrail.translate('phone', 'digits'),
                    },
                    password: {
                        minlength: TaskTrail.translate('password', 'minlength'),
                    }
                }
            });
        }
    }

    const layoutInteractions = function() {
        const prevent_default = function() {
            $(".prevent-default").each(function(index) {
                $(this).on("click", function(e){
                    e.preventDefault();
                });
            });
        }

        prevent_default();

        const goto = function() {
            $(".goto").each(function() {
                $(this).on("click", function() {
                    let _url = $(this).data('url');

                    TaskTrail.block();

                    window.location = _url;
                });
            });
        };

        goto();

        const selects2 = function() {
            if(!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }

            $('.select-search').select2({
                theme: 'bootstrap4',
            });

            $('.select-icons').select2({
                theme: 'bootstrap4',
                templateResult: iconFormat,
                minimumResultsForSearch: Infinity,
                templateSelection: iconFormat,
                escapeMarkup: function(m) {
                    return m;
                }
            });
        };

        selects2();

        const password_notification = $("#password-changed-notification-option");

        const passwordUtils = function() {
            if (!$().passy) {
                console.warn('Warning - passy.js is not loaded.');
                return;
            }

            var $inputLabel = $('.password-field');
            var $outputLabel = $('.password-indicator-badge-absolute');

            $.passy.requirements.length.min = 6;

            var feedback = [
                {color: '#D55757', text: 'Slabă', textColor: '#fff'},
                {color: '#EB7F5E', text: 'Normală', textColor: '#fff'},
                {color: '#3BA4CE', text: 'Bună', textColor: '#fff'},
                {color: '#40B381', text: 'Puternică', textColor: '#fff'}
            ];

            $inputLabel.passy(function(strength) {
                $outputLabel.text(feedback[strength].text);
                $outputLabel.css({
                    'background-color': feedback[strength].color,
                    'color': feedback[strength].textColor
                });
            });

            $('.generate-password').on('click', function() {
                $inputLabel.passy('generate', $(this).data('lenght'));

                if(password_notification.length) {
                    password_notification.show();
                }
            });
        }

        passwordUtils();

        const password_changed = function() {
            const password_field = $(".password-field");

            if (password_notification.length) {
                password_field.on("input", function() {
                    password_notification.toggle(password_field.val() !== "");
                });
            }
        }

        password_changed();
    }

    const xhrCalls = function() {
        const xhrCall = function() {
            $(".tt-xhr").each(function() {
                let _call_method = $(this).data('call-method');

                $(this).on(_call_method, function(e){
                    let _xhr_call = $(this).data('xhr');
                    const _data_prevent = $(this).data('prevent');

                    if(_data_prevent !== undefined) {
                        e.preventDefault();
                    }

                    _tt_xhr[_xhr_call]($(this));
                });
            });
        };

        xhrCall();
    };

    return {
        initLayoutInteractions: function() {
            formsValidation();
            layoutInteractions();
            xhrCalls();
        },

        initCore: function() {
            TaskTrail.initLayoutInteractions();
        },

        block: function(_selector = '.content-inner') {
            let _el = $(_selector);

            const _dirty_form = $('body').find('.dirty').length;

            if(parseInt(_dirty_form) === 0) {
                $(_el).block({
                    message: '<i class="las la-spinner la-spin mr-2"></i>&nbsp; Processing',
                    overlayCSS: {
                        backgroundColor: '#1b2024',
                        opacity: 0.6,
                        cursor: 'wait'
                    },
                    centerY: 0,
                    css: {
                        border: 0,
                        padding: '10px 15px',
                        color: '#fff',
                        width: 'auto',
                        '-webkit-border-radius': 3,
                        '-moz-border-radius': 3,
                        backgroundColor: '#333'
                    },
                    onBlock: function() {
                        $(_el).css({
                            left: 0
                        });
                    }
                });
            }
        },

        unblock: function(_selector = '.content-inner') {
            let _el = $(_selector);

            $(_el).unblock();
        },

        remove: function(obj) {
            $(obj).animate({opacity: '0'}, 150, function(){
                $(obj).animate({height: '0px'}, 150, function(){
                    $(obj).remove();
                });
            });
        },

        getUrlParams: function(param) {
            // https://stackoverflow.com/questions/19491336/get-url-parameter-jquery-or-how-to-get-query-string-values-in-js
            return (window.location.search.match(new RegExp('[?&]' + param + '=([^&]+)')) || [undefined, null])[1];
        },

        /**
         * Toggle CSS classes for the specified element
         *
         * @param removeCSS CSS class to be removed
         * @param addCSS CSS class to be added
         * @param el The DOM element (provided as #id or .class)
         */
        toggleCSSClass: function(removeCSS, addCSS, el) {
            const $el = $(el);

            if($el.length) {
                $el.removeClass(removeCSS);
                $el.addClass(addCSS);
            }
        },

        /**
         * Get translations for various Javascript actions or messages
         *
         * @param field
         * @param validation_type
         * @returns {*|string}
         */
        translate: function(field, validation_type) {
            // Determine the global object based on the environment
            const _global_obj = (typeof window !== 'undefined') ? window : global;

            const translations = {};

            // Iterate through properties of the global object to find the language object
            for(let prop in _global_obj) {
                if(_global_obj.hasOwnProperty(prop) && /^_LANG_[a-zA-Z0-9_]+$/.test(prop)) {
                    merge_object_deep(translations, _global_obj[prop]);
                }
            }

            if(translations[field] && translations[field][validation_type]) {
                return translations[field][validation_type];
            } else {
                return "Translation not found";
            }
        },
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    // Keep track of the last focused element
    $('input[type="text"], textarea').focus(function() {
        _last_focused_field = this;
    });

    TaskTrail.initCore();
});
