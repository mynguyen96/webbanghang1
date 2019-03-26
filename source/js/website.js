// JavaScript Document
var domain = window.location.protocol + "//" + window.location.host + "/";
$(document).mouseup(function (e) {
    var container = $(".selectbox");
    if (!container.is(e.target) // if the target of the click isn't the container...
        &&
        container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $('.ul-selected').hide();
    }
});
$(document).ready(function () {
    $('.selectbox').click(function () {
        $('.ul-selected').toggle(50);
    });
    $('.selectbox li').click(function () {
        html = $(this).html();
        $('.html-selected').html(html + '<i class="fa fa-caret-down" ></i>');
        $('#s-catelog').val($(this).attr('value'));
    });
    $('.btn_search').click(function () {
        s = $('#search_input').val();
        c = $('#s-catelog').val();
        window.location = "/tim-kiem.html?s=" + s + "&catelog=" + c;
    });

    $(".search").keypress(function (event) {
        if (event.which == 13) {
            $('#btn_search').click();
        }
    });

});

$(document).ready(function () {

    var tabs = $('.tabs');
    var items = $('.tabs').find('a').length;
    var selector = $(".tabs").find(".selector");
    var activeItem = tabs.find('.active');
    var activeWidth = activeItem.innerWidth();
    $(".selector").css({
        "left": activeItem.position.left + "px",
        "width": activeWidth + "px"
    });

    $(".tabs").on("click", "a", function (e) {
        e.preventDefault();
        $('.tabs a').removeClass("active");
        $(this).addClass('active');
        var activeWidth = $(this).innerWidth();
        var itemPos = $(this).position();
        $(".selector").css({
            "left": itemPos.left + "px",
            "width": activeWidth + "px"
        });

        var tab_id = $(this).attr('data-tab');
        $('.tabs a').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });
});

$(document).ready(function () {
    var backTop = document.getElementsByClassName('js-cd-top')[0],
        offset = 300,
        offsetOpacity = 1200,
        scrollDuration = 700,
        scrolling = false;
    if (backTop) {
        window.addEventListener("scroll", function (event) {
            if (!scrolling) {
                scrolling = true;
                (!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250): window.requestAnimationFrame(checkBackToTop);
            }
        });
        backTop.addEventListener('click', function (event) {
            event.preventDefault();
            (!window.requestAnimationFrame) ? window.scrollTo(0, 0): scrollTop(scrollDuration);
        });
    }

    function checkBackToTop() {
        var windowTop = window.scrollY || document.documentElement.scrollTop;
        (windowTop > offset) ? addClass(backTop, 'cd-top--show'): removeClass(backTop, 'cd-top--show', 'cd-top--fade-out');
        (windowTop > offsetOpacity) && addClass(backTop, 'cd-top--fade-out');
        scrolling = false;
    }

    function scrollTop(duration) {
        var start = window.scrollY || document.documentElement.scrollTop,
            currentTime = null;

        var animateScroll = function (timestamp) {
            if (!currentTime) currentTime = timestamp;
            var progress = timestamp - currentTime;
            var val = Math.max(Math.easeInOutQuad(progress, start, -start, duration), 0);
            window.scrollTo(0, val);
            if (progress < duration) {
                window.requestAnimationFrame(animateScroll);
            }
        };

        window.requestAnimationFrame(animateScroll);
    }

    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    };

    function hasClass(el, className) {
        if (el.classList) return el.classList.contains(className);
        else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
    }

    function addClass(el, className) {
        var classList = className.split(' ');
        if (el.classList) el.classList.add(classList[0]);
        else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
        if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
    }

    function removeClass(el, className) {
        var classList = className.split(' ');
        if (el.classList) el.classList.remove(classList[0]);
        else if (hasClass(el, classList[0])) {
            var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
            el.className = el.className.replace(reg, ' ');
        }
        if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
    }
});

$(document).ready(function () {

    const buttons = document.querySelectorAll(`button[data-modal-trigger]`);

    for (let button of buttons) {
        modalEvent(button);
    }

    function modalEvent(button) {
        button.addEventListener('click', () => {
            const trigger = button.getAttribute('data-modal-trigger');
            const modal = document.querySelector(`[data-modal=${trigger}]`);
            const contentWrapper = modal.querySelector('.content-wrapper');
            const close = modal.querySelector('.close');

            close.addEventListener('click', () => modal.classList.remove('open'));
            modal.addEventListener('click', () => modal.classList.remove('open'));
            contentWrapper.addEventListener('click', (e) => e.stopPropagation());

            modal.classList.toggle('open');
        });
    }

    $('.tab-popup a').click(function () {
        var tab_popup_id = $(this).attr('data-tab');

        $('.tab-popup a').removeClass('tab-active');
        $('.tab-content-popup').removeClass('tab-popup-current');

        $(this).addClass('tab-active');
        $("#" + tab_popup_id).addClass('tab-popup-current');
    });
});

$(document).ready(function ($) {
    $('ul.tab_nav li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.tab_nav li').removeClass('current');
        $('.tab_content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    })
});

