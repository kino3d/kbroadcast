/*jshint strict: false */
/*jslint sloppy: true */


$(function () {
    $("input[type=submit], button")
        .button()
        .click(function (event) {
            event.preventDefault();
        });
});

$(function () {
    $("#record").button().click(function () {
        if ($("#record").val() === "Registra") {
            $.ajax({
                type: "GET",
                url: "/control/record/start?app=myapp&name=stream&rec=rec1",
                dataType: "json",
                success: function () {
                    $("#record").html('<span class="glyphicon glyphicon-stop"></span> Stop');
                    $("#record").val('Stop');
                },
                error: function () {
                    $("#record").val('Stop');
                    $("#record").html('<span class="glyphicon glyphicon-stop"></span> Stop');
                }
            });
        }
        if ($("#record").val() === "Stop") {
            $.ajax({
                type: "GET",
                url: "/control/record/stop?app=myapp&name=stream&rec=rec1",
                dataType: "json",
                success: function () {
                    $("#record").html('<span class="glyphicon glyphicon-record"></span> Registra');
                    $("#record").val('Registra');
                },
                error: function () {
                    $("#record").html('<span class="glyphicon glyphicon-record"></span> Registra');
                    $("#record").val('Registra');
                }
            });
        }
    });

    return false;
});

// Stream Button
$(function () {
    $("#stream").button({
        label: "Stream",
        text: true
    }).click(function () {
        $("#stream").button("option", {
            label: "Stream",
            text: true
        }).addClass("red");
    });
});

$(function () {
    $("#timer").button({
        text: true,
        label: "00:00:00",
        icons: {
            primary: "ui-icon-clock"
        }
    }).attr("disabled", false).addClass("ui-state-highlight");
});

$(function () {
    $("#aggiorna").button({
        text: true,
        label: "Aggiorna",
        icons: {
            primary: "ui-icon-refresh"
        }
    }).click(function () {
        $.ajax({
            type: "GET",
            url: "update-rec.php",
            dataType: "html",
            success: function (data) {
                $("#listfile").html(data); //.hide("fold", { horizFirst: false }, 100).show("fold", {}, 100);
            }
        });
    });
});


$(function () {
    $("#filem").scroll();
});

$(function () {
    $("#sysm").scroll();
});

// Start capture card not used
function checkcam() {
    // $("#str_status").button().click(function(){
    // e.preventDefault();
    $.ajax({
        type: "GET",
        url: "capture.php",
        datatype: "html",
        success: function (data) {
            if (data === "runned") {
                $("#str_status").addClass("btn-danger").html("Stop Camera");
            }
        }
    });
}

setInterval(function () {
    checkcam();
}, 3000);

// ask password
//$(function(){
//$("#collapseThree").on('show.bs.collapse', function(){
//$(".bs-example-modal-sm").modal({
//show: true,
//keyboard: true,
//backdrop: false
//});
//});
//});

$(function () {
    $("#mustadmin").click(function () {
        $("#collapseThree").collapse('hide');
        $(".bs-example-modal-sm").modal({
            show: true,
            keyboard: true,
            backdrop: false
        });
    });
});

$(function () {
    $(".bs-example-modal-sm").on('hide.bs.modal', function () {
        $("#collapseThree").collapse('hide');

    });
});


// $(function () {
//    $("#delete").click(function () {
//
//        $(".bs-example-modal-sm").modal({
//            show: true,
//            keyboard: true,
//            backdrop: false
//        });
//    });
// });

// Tabs

$(function () {
    var activeTab = null;
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        activeTab = $(e.target).attr('href');
        if (activeTab === '#Tab3') {
            $.ajax({
                type: "GET",
                url: "update-rec.php?media=rec",
                dataType: "html",
                success: function (data) {
                    $("#listfile").html(data);
                }
            });
        }

        $('#refresh').button().click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "update-rec.php?media=rec",
                dataType: "html",
                success: function (data) {
                    $("#listfile").html(data);
                    //  $('#refresh').button('reset');
                }
            });
        });
    });
});

// Delete files from recording

 $(function () {
    $(".del").click(function () {
        $("#filedel").html($(this).prop('name'));
        $("#filedel").prop('name', $(this).prop('name'));
        $(".bs-delfile-modal-sm").modal({
            show: true,
            keyboard: true,
            backdrop: false
        });
    });
});

$(function () {
    $('#okdel').click(function (e) {
        e.preventDefault();
        var delname = $("#filedel").prop('name');
        var delname = "name=" + delname;
        console.log(delname);
        $.ajax({
            type: "GET",
            url: "update-rec.php?media=del",
            data: delname,
            dataType: "html",
            success: function (data) {
                $(".bs-delfile-modal-sm").modal("hide");
                // $("#listfile").html(data);
                //$("#refresh").button("reset");
            }
        });
    });
    return false;
});


// View files modal

 $(function () {
    $(".view").click(function () {
        var viewname1 = $(this).prop('name');
        var viewname = "rtmp://194.116.126.10/vod/" + viewname1;
        $("#fileview2").html(viewname1);
        $("#fileview").prop('src',viewname);
        $(".bs-viewfile-modal-sm").modal({
            show: true,
            keyboard: true,
            backdrop: false
        });
        var mediaelementplayer = $('#player2').mediaelementplayer({success: function(mediaElement, domElement) {
        // now that the player is ready you can call methods on it
            mediaelementplayer.setCurrentTime(50);
            mediaelementplayer.setSrc(viewname);
            mediaelementplayer.load(); // this is a required HTML5 convention
            mediaelementplayer.play();
        }});
    });
 });



// start capture

$(function () {
    $(".src_stats").click(function (){
    $.ajax({
        type: "GET",
        url: "capture.php",
        dataType: "html",
        // contentType: "application/json; charset=utf-8",
        //  data: data,
        success: function (data) {
            if (data === "stopped") {
                $.ajax({
                    type: "GET",
                    url: "capture.php?encoder=avstart",
                    dataType: "html",
                    success: function (data) {
                        $("#av_status").val("Starting...");
                    }
                });
            }
            //    else
            //    {  $("#str_status").addClass("").css("background-color","red").val("Attivo");  };
            //jwplayer().play();
            //alert("success");
            //    console.log(data);
        },
        error: function () {
            $("#av_status").addClass("btn-info").val("Off");
        }
    });
});
});

setInterval(function () {
    $.ajax({
        type: "GET",
        url: "capture.php",
        dataType: "html",
        // contentType: "application/json; charset=utf-8",
        //  data: data,
        success: function (data) {
            if (data == "stopped") {
                $("#av_status").text("stopped");
                $("#pbar").addClass("progress-bar-danger").removeClass("progress-bar-success");
            } else {
                $("#av_status").text("1280x720 25fps 2000kbps");
                $("#pbar").addClass("progress-bar-success").removeClass("progress-bar-danger");
            }
            //jwplayer().play();
            //alert("success");
            //    console.log(data);
        },
        error: function () {
            $("#av_status").addClass("text-danger").val("Off");
        }
    });
}, 3000);



$(function () {
    $.ajax({
        type: "GET",
        url: "network.php",
        dataType: "json",
        success: function (data) {
            $.each(data, function (i, item) {
                $.each(item, function (name, value) {
                    $("#" + i + name).val(value);
                });
            });
        }
    });
});

setInterval(function () {
    $.ajax({
        type: "GET",
        url: "network.php?network=ping",
        dataType: "json",
        success: function (data) {
            if (data === 'online') {
                $("#nonetwork").removeClass("panel-danger").addClass("panel-success");
                $(".connected").html(" Online").removeClass("text-danger").addClass("text-success");
            } else {
                $("#nonetwork").removeClass("panel-success").addClass("panel-danger");
                $(".connected").html(" Offline").removeClass("text-success").addClass("text-danger");
            }
        }
    });
}, 10000);

$(function () {
    $.ajax({
        type: "GET",
        url: "network.php?network=ping",
        dataType: "json",
        success: function (data) {
            if (data === 'online') {
                $("#nonetwork").removeClass("panel-danger").addClass("panel-success");
                $(".connected").html(" Online").removeClass("text-danger").addClass("text-success");
            } else {
                $("#nonetwork").removeClass("panel-success").addClass("panel-danger");
                $(".connected").html(" Offline").removeClass("text-success").addClass("text-danger");
            }
        }
    });
});

$(function () {
    $.ajax({
        type: "GET",
        url: "network.php?network=nettype",
        dataType: "json",
        success: function (data) {
            if (data === 'dhcp') {
                $('.dhcp').prop("checked", true);
                $('#p5p1 :input').prop("disabled", true);
            }
            if (data === 'static') {
                $('.manual').prop("checked", true);
                $('#p5p1 :input').prop("disabled", false);
            }
        }
    });
});

$(document).ready(function () {
    $('form').attr("autocomplete", "off");
    //    $("#test").after("<input type='text' name='test2' value='Test 2' />");
});

// $("#demo").collapse()

$(function () {
    $('#dhcp').click(function () {
        $('.p5p1 :input').prop("disabled", true);
        //    $('#dhcp').html('Manuale');
    });
});

$(function () {
    $('#manuale').click(function () {
        $('.p5p1 :input').prop("disabled", false);
        //    $('#dhcp').html('Manuale');
    });
});

// Video Audio bitrate selection

$(function () {
    $('.videob .btn').on('click', function () {
        // whenever a button is clicked, set the hidden helper
        $("#video_bitrate").val($(this).val());
    });
});

$(function () {
    $('.audiob .btn').on('click', function () {
        // whenever a button is clicked, set the hidden helper
        $("#audio_bitrate").val($(this).val());
    });
});

$(function () {
    $('.res').on('click', function (e) {
        e.preventDefault();
        // whenever a button is clicked, set the hidden helper
        var res = $(this).text();
        var resxy = res.split('x');
        $("#resx").val(resxy[0]);
        $("#resy").val(resxy[1]);
        var resx = $("#resx").val();
        var resy = $("#resy").val();
        var audio_b = $("#audio_bitrate").val();
        var video_b = $("#video_bitrate").val();
        var tot_b = Number(video_b) + Number(audio_b);
        $("#st_info").text(resx + "x" + resy + "px " + tot_b + "Kbps");
    });

    $(function () {
        $('.res').on('click', function (e) {
            e.preventDefault();
            // whenever a button is clicked, set the hidden helper
            var res = $(this).text();
            var resxy = res.split('x');
            $("#resx").val(resxy[0]);
            $("#resy").val(resxy[1]);
            var resx = $("#resx").val();
            var resy = $("#resy").val();
            var audio_b = $("#audio_bitrate").val();
            var video_b = $("#video_bitrate").val();
            var tot_b = Number(video_b) + Number(audio_b);
            $("#st_info").text(resx + "x" + resy + "px " + tot_b + "Kbps");
        });
    });

    $(function () {
        $('#stream').on('click', function () {
            // whenever a button is clicked, set the hidden helper
            // console.log($(this).val());
            var resx = $("#resx").val();
            var resy = $("#resy").val();
            var audio_b = $("#audio_bitrate").val();
            var video_b = $("#video_bitrate").val();
            var tot_b = Number(video_b) + Number(audio_b);
            $("#st_info").text(resx + "x" + resy + " " + tot_b + "Kbps");
            //    console.log(resx + "x" + resy + " V: " + video_b + "Kbps A: " + audio_b + "Kbps" );
        });
    });

    $(function () {
        $('#iframe_code').button().click(function () {
            var iframe_x = $("#if_resx").val();
            var iframe_y = $("#if_resy").val();
            var rtmp_url = $("#s_rtmp").val();
            $("#iframe_remote").text('<iframe src=\"http://live.top-ix.org/player/iframe.php?name=\" frameborder=\"0\" width=\"' + iframe_x + '\" width=\"' + iframe_y + '\" ></iframe>');
        });
    });
});
