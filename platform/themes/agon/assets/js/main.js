(function ($) {
    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let AgonApp = AgonApp || {};
    window.AgonApp = AgonApp;

    const toastLive = $('#live-toast')
    const toast = new bootstrap.Toast(toastLive[0])

    AgonApp.showError = message => {
        AgonApp.showAlert('alert-danger', message);
    }

    AgonApp.showSuccess = message => {
        AgonApp.showAlert('alert-success', message);
    }

    AgonApp.handleError = data => {
        if (typeof (data.errors) !== 'undefined' && data.errors.length) {
            AgonApp.handleValidationError(data.errors);
        } else if (typeof (data.responseJSON) !== 'undefined') {
            if (typeof (data.responseJSON.errors) !== 'undefined') {
                if (data.status === 422) {
                    AgonApp.handleValidationError(data.responseJSON.errors);
                }
            } else if (typeof (data.responseJSON.message) !== 'undefined') {
                AgonApp.showError(data.responseJSON.message);
            } else {
                $.each(data.responseJSON, (index, el) => {
                    $.each(el, (key, item) => {
                        AgonApp.showError(item);
                    });
                });
            }
        } else {
            AgonApp.showError(data.statusText);
        }
    }

    AgonApp.handleValidationError = errors => {
        let message = '';
        $.each(errors, (index, item) => {
            if (message !== '') {
                message += '<br />';
            }
            message += item;
        });
        AgonApp.showError(message);
    }

    AgonApp.showAlert = (messageType, message) => {
        if (messageType && message !== '') {
            toastLive.removeClass(function (index, className) {
                return (className.match(/(^|\s)alert-\S+/g) || []).join(' ');
            });
            toastLive.find('.toast-body').html(message);
            toastLive.addClass(messageType);
            toast.show();
        }
    }

    AgonApp.backToTop = function () {
        let scrollPos = 0;
        let element = $('#scrollUp');
        $(window).scroll(function () {
            let scrollCur = $(window).scrollTop();
            if (scrollCur > scrollPos) {
                // scroll down
                if (scrollCur > 500) {
                    element.addClass('active');
                } else {
                    element.removeClass('active');
                }
            } else {
                // scroll up
                element.removeClass('active');
            }

            scrollPos = scrollCur;
        });

        element.on('click', function () {
            $('html, body').animate(
                {
                    scrollTop: '0px',
                },
                0
            );
        });
    }

    const newsletterForm = function () {
        $(document).on('submit', '.newsletter-form', function (event) {
            event.preventDefault();
            event.stopPropagation();

            let _self = $(this);
            let _button = _self.find('button[type=submit]');
            $.ajax({
                type: 'POST',
                cache: false,
                url: _self.prop('action'),
                data: new FormData(_self[0]),
                contentType: false,
                processData: false,
                beforeSend: () => {
                    _button.addClass('disabled button-loading');
                },
                success: res => {
                    if (!res.error) {
                        _self.find('input[type=email]').val('');
                        AgonApp.showSuccess(res.message);
                    } else {
                        AgonApp.showError(res.message);
                    }
                },
                error: res => {
                    AgonApp.handleError(res);
                },
                complete: () => {
                    if (typeof refreshRecaptcha !== 'undefined') {
                        refreshRecaptcha();
                    }
                    _button.removeClass('disabled button-loading');
                },
            });
        });
    }

    $(() => {
        if (window.noticeMessages) {
            let messages = '';
            window.noticeMessages.forEach(message => {
                messages += `<li class="${message.type == 'error' ? 'text-danger' : 'text-success'}">${message.message}</li>`;
            });
            AgonApp.showAlert('alert-info', '<ul class="toast-list">' + messages + '</ul>');
        }

        AgonApp.backToTop();

        newsletterForm();

        $(document).on('submit', '.faq-filter-form', function (e) {
            e.preventDefault();
            e.stopPropagation();

            let _self = $(this);
            let _button = _self.find('button[type=submit]');
            _button.addClass('disabled button-loading');

            let term = _self.find('[name=q]').val();

            if ($('.faq-list-items').length) {
                if ($('.faq-list-items').closest('section').length) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.faq-list-items').closest('section').offset().top - 150
                    }, 150);
                }

                $('.faq-list-items').each(function () {
                    let $items = $(this);

                    $items.find('.faq-question, .faq-answer').each(function() {
                        let $item = $(this);

                        $item.removeHighlight();
                        if (term) {
                            $item.highlight(term);
                        }
                    });
                });

                $('.faq-list-items').find('.faq-item').each(function() {
                    let $item = $(this);

                    if (term) {
                        if ($item.find('.highlight').length) {
                            $item.fadeIn();
                        } else{
                            $item.fadeOut();
                        }
                    } else {
                        $item.fadeIn();
                    }
                });
            }

            setTimeout(() => {
                _button.removeClass('disabled button-loading');
            }, 2000);
        });
    });
})(jQuery);

jQuery.fn.highlight = function (pat) {
    function innerHighlight(node, pat) {
        let skip = 0;
        if (node.nodeType == 3) {
            let pos = node.data.toUpperCase().indexOf(pat);
            if (pos >= 0) {
                let spannode = document.createElement("span");
                spannode.className = "highlight";
                let middlebit = node.splitText(pos);
                let endbit = middlebit.splitText(pat.length);
                let middleclone = middlebit.cloneNode(true);
                spannode.appendChild(middleclone);
                middlebit.parentNode.replaceChild(spannode, middlebit);
                skip = 1;
            }
        } else if (
            node.nodeType == 1 &&
            node.childNodes &&
            !/(script|style)/i.test(node.tagName)
        ) {
            for (let i = 0; i < node.childNodes.length; ++i) {
                i += innerHighlight(node.childNodes[i], pat);
            }
        }
        return skip;
    }
    return this.each(function () {
        innerHighlight(this, pat.toUpperCase());
    });
};

jQuery.fn.removeHighlight = function () {
    function newNormalize(node) {
        for (
            let i = 0, children = node.childNodes, nodeCount = children.length;
            i < nodeCount;
            i++
        ) {
            let child = children[i];
            if (child.nodeType == 1) {
                newNormalize(child);
                continue;
            }
            if (child.nodeType != 3) {
                continue;
            }
            let next = child.nextSibling;
            if (next == null || next.nodeType != 3) {
                continue;
            }
            let combined_text = child.nodeValue + next.nodeValue;
            let new_node = node.ownerDocument.createTextNode(combined_text);
            node.insertBefore(new_node, child);
            node.removeChild(child);
            node.removeChild(next);
            i--;
            nodeCount--;
        }
    }

    return this.find("span.highlight")
        .each(function () {
            let thisParent = this.parentNode;
            thisParent.replaceChild(this.firstChild, this);
            newNormalize(thisParent);
        })
        .end();
};
