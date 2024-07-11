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

var _last_focused_field;

var TaskTrail = function () {
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
                    message: '<span class="font-weight-bold"><i class="fas fa-spinner fa-spin mr-2"></i>&nbsp; Processing</span>',
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
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    // Keep track of the last focused element
    $('input[type="text"], textarea').focus(function() {
        _last_focused_field = this;
    });

    TaskTrail.initCore();
});
