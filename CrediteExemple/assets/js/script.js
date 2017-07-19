jQuery(document).ready(function () {
    var screenRes = $(window).width(),
        screenHeight = $(window).height(),
        html = $('html');

    $(window).resize(function () {
        screenRes = $(window).width();
        screenHeight = $(window).height();
    });

    $(".scroll").each(function () {
        var block = $(this);
        $(window).scroll(function () {
            var top = block.offset().top,
                bottom = block.outerHeight() + top,
                scrollTop = $(this).scrollTop();
            top = top - screenHeight;

            if ((scrollTop > top) && (scrollTop < bottom)) {
                if (!block.hasClass("animated")) {
                    block.addClass("animated").trigger('animateIn');
                }
            } else {
                block.removeClass("animated").trigger('animateOut');
            }
        });
    });
    $('.cifre').on('animateIn', function () {
        var inter = 0;
        $('.dial').each(function () {
            var $this = $(this);
            var myVal = $this.attr("rel");
            // alert(myVal);
            $this.knob({});
            $({
                value: 0
            }).animate({
                value: myVal
            }, {
                duration: 2000,
                easing: 'swing',
                step: function () {
                    $this.val(Math.ceil(this.value)).trigger('change');
                }
            })
        });
    }).on('animateOut', function () {
    });


});

$(function ($) {
    $(".knob").knob({
        change: function (value) {

        },
        release: function (value) {

        },
        cancel: function () {

        },
        /*format : function (value) {
         return value + '%';
         },*/
        draw: function () {
            // "tron" case
            if (this.$.data('skin') == 'tron') {
                this.cursorExt = 0.1;
                var a = this.arc(this.cv)  // Arc
                    , pa                   // Previous arc
                    , r = 2;
                this.g.lineWidth = this.lineWidth;
                if (this.o.displayPrevious) {
                    pa = this.arc(this.v);
                    this.g.beginPath();
                    this.g.strokeStyle = this.pColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                    this.g.stroke();
                }
                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                this.g.stroke();
                this.g.lineWidth = 4;
                this.g.beginPath();
                this.g.strokeStyle = '#dcdcdc';
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth - 11, 0, 2 * Math.PI, false);
                this.g.stroke();
                return false;
            }
        }
    });

});

$(function () {
    "use strict";
    $('a.scrollto').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
jQuery(document).ready(function () {
    $("#suma").ionRangeSlider({
        from: 4,
        step: 1000,
        values: [
            1000, 2000, 3000, 4000, 5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,50000
        ],
        grid: true,
        onChange: function (data) {
            if(data.from_value>15000){
                $('#infp-sum').html('Peste 15 000');
            }else{
                $('#infp-sum').html(addCommas(data.from_value));
            }


            if(data.from_value>3000 && $("#perioada").data("ionRangeSlider").input.value==1){
                $("#perioada").data("ionRangeSlider").update({
                    from: 2
                });
            }
        },
        onUpdate: function (data) {
            if(data.from_value>15000){
                $('#infp-sum').html('Peste 15 000');
            }else{
                $('#infp-sum').html(addCommas(data.from_value));
            }
        }
    });
    var addCommas = function(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ' ' + '$2');
        }
        return x1 + x2;
    }
    $("#perioada").ionRangeSlider({
        min: 1,
        max: 24,
        from: 12,
        step: 1,
        onChange: function (data) {
            $('#infp-luni').html(data.from);
            if(data.from<2){
                $("#suma").data("ionRangeSlider").update({
                    from: 0
                });
            }
        },
        onUpdate: function (data) {
            $('#infp-luni').html(data.from);
        }
    });
    $("input.num").keypress(function (event) {
        return (((event.which >= 48) && (event.which <= 57)) || event.which == 46 || event.which == 8 || event.which == 0);
    });
    $('.surnameInput').keypress(function (key) {
        if (key.charCode != 0) {
            if ((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45) && (key.charCode != 32)) {
                return false;
            }
        }

    });
    $('.cdn').keypress(function (key) {
        if ((key.charCode != 0)) {
            if (($(this).val().length > 12))return false;
        }

    });
    $('#calculator-form .in input').on('input', function () {
        calc();
    });
    $('#calculator-form .in-block input').on('input', function () {
        if ($('#fnume').val() != "" && $('#fcod').val() != "" && $('#ftel').val() != "") {
            $('.terms').addClass('act');
        } else {
            $('.terms').removeClass('act');
        }
        if ($('#terms-input').is(':checked')) {
            $('#btn-pc').removeAttr('disabled');
        } else {
            $('#btn-pc').attr('disabled', 'disabled');
        }

    });
    $('#terms-input').on('click', function () {
        if ($('#terms-input').is(':checked')) {
            $('#btn-pc').removeAttr('disabled');
        } else {
            $('#btn-pc').attr('disabled', 'disabled');
        }
    });
    if ($('#terms-input').is(':checked')) {
        $('#btn-pc').removeAttr('disabled');

    } else {
        $('#btn-pc').attr('disabled', 'disabled');

    }
    calc();
});
function calc() {
    var suma = $('#suma').val();
    var perioada = $('#perioada').val();
    if (suma < 1000 || suma > 150000) {
        $('#suma').tooltip('show');
    } else {
        $('#suma').tooltip('hide');
    }
    if (perioada < 1 || perioada > 24) {
        $('#perioada').tooltip('show');
    } else {
        $('#perioada').tooltip('hide');
    }
    $('p.succes').hide();


    if (suma >= 1000 && suma <= 100000 && perioada >= 1 && perioada <= 24) {
       // $('#calculator-form .info').addClass('visible');
        $('#calculator-form .atentionare').show();
    } else {
        //$('#calculator-form .info').removeClass('visible');
        $('#calculator-form .atentionare').hide();
    }
    if ((suma > 3000 && suma <= 100000) || ( perioada > 1 && perioada <= 24)) {
         $('#calculator-form .info').addClass('visible');

    } else {
        $('#calculator-form .info').removeClass('visible');

    }

    if (suma < 1000) {
        $('p.succes').hide();
    } else if (suma >= 1000 && suma <= 3000 && perioada==1) {
        $('p.succes.s0').show();
    } else if (suma >= 1000 && suma <= 5000 && perioada>1) {
        $('p.succes.s1').show();
    } else if (suma > 5000 && suma <= 15000) {
        $('p.succes.s2').show();
    } else if (suma > 15000 && suma <= 150000) {
        $('p.succes.s3').show();
        $('#calculator-form .info').removeClass('visible');
    } else if (suma > 150000) {
        $('p.succes.s3').hide();
    }
    var red = 0.7;
    var zds = 0.365;
    var imprumut = suma;
    if (imprumut <= 1000) {
        zds = zds;
    } else if (imprumut <= 2000) {
        zds = zds - 0.03;
    } else if (imprumut <= 3000) {
        zds = zds - 0.05;
    } else if (imprumut <= 4000) {
        zds = zds - 0.07;
    } else if (imprumut <= 5000) {
        zds = zds - 0.09;
    } else if (imprumut <= 6000) {
        zds = zds - 0.1;
    } else if (imprumut <= 7000) {
        zds = zds - 0.12;
    } else if (imprumut <= 8000) {
        zds = zds - 0.14;
    } else if (imprumut <= 9000) {
        zds = zds - 0.16;
    } else if (imprumut <= 10000) {
        zds = zds - 0.17;
    } else if (imprumut <= 11000) {
        zds = zds - 0.17;
    } else if (imprumut <= 12000) {
        zds = zds - 0.18;
    } else if (imprumut <= 13000) {
        zds = zds - 0.18;
    } else if (imprumut <= 14000) {
        zds = zds - 0.19;
    } else if (imprumut <= 15000) {
        zds = zds - 0.19;
    }

    var perioada = perioada;
    var zdt = 0;
    if (perioada == 1) {
        zdt = zds * 2;
    } else if (perioada <= 12) {
        zdt = zds * 2 - (zds * 2 - zds) / 12 * perioada;
    } else if (perioada <= 18) {
        zdt = zds - (zds - zds * 0.9) / 6 * (perioada - 12)
    } else if (perioada <= 24) {
        zdt = zds - (zds - zds * 0.8) / 12 * (perioada - 12)
    }

    //  1+($procent_lunar*12/$client->term))*$client->term -1
    //=(1+(nominal_rate/npery))*npery -1.
    dz = zdt;
    var r1 = Math.pow(parseInt(1) + (dz * 30 / 100), perioada);
    var rl = (r1 * dz * 30 / 100) / (r1 - 1) * imprumut;
    $('#pll').html(parseInt(rl));

    var d1 = dz * 30 / 100 * 12;
    //var dae=(1+((sp*12)/perioada))*perioada-1;
    var dae = (Math.pow(1 + d1 / 12, 12) - 1) * 100;
    dae = dae.toFixed(2);
    $('#dae').html(dae);
    var ctc = parseInt(rl) * parseInt(perioada);
    $('#ctc').html(ctc);

    var sp = ctc - suma;
    sp = sp.toFixed(2);
    $('#dbl').html(sp);
    if(perioada==1 && suma >= 1000 && suma <= 3000){
        $('#pll').html(suma);
        $('#dae').html('0');
        $('#ctc').html(suma);
        $('#dbl').html('0');
    }


}
function submit(id) {
    $('#' + id).submit();
}
function submited_form() {
    var suma = $('#suma').val();
    var perioada = $('#perioada').val();
    var fcod = $('#fcod').val().length;
    var ftel = $('#ftel').val().length;
    if (suma >= 1000 && suma <= 150000 && perioada > 0 && perioada <= 24 && fcod == 13 && ftel > 7) {
        var form = $('#calculator-form').serialize();
        $.ajax({
            url: '/home/send_cerere',
            type: 'post',
            data: form,
            dataType: 'json',
            success: function (data) {
                if (data.succes == 1) {
                    $('#calculator-form').submit();
                    goog_report_conversion();
                }
            }
        });


    } else {
        if (suma < 1000 || suma > 150000) {
            $('#suma').tooltip('show');

        } else {
            $('#suma').tooltip('hide');
        }
        if (perioada < 1 || perioada > 24) {
            $('#perioada').tooltip('show');
        } else {
            $('#perioada').tooltip('hide');
        }
        if (fcod != 13) {
            $('#fcod').tooltip('show');
        } else {
            $('#fcod').tooltip('hide');
        }
        if (ftel < 7) {
            $('#ftel').tooltip('show');
        } else {
            $('#ftel').tooltip('hide');
        }
    }

}
function clear_form() {
    $('#calculator-form input[type=text]').val('');
    $('#multumesc').show();
    calc();
}





