
var _map, _latEl, _lngEl, _zoomEl, _widthEl, _heightEl, _apiKeyEl, _apiBaseUrl, _checkApiKeyTimeoutId,
    _checkApiKeyPromise, _resultEl, _resultBoxEl, _resultLinkEl, _markerEl, _markerSelectEl, _img;

function searchLocation($lat, $long) {
    var input, filter, ul, li, a, i, txtValue;
    var text = $("#myInput").val();
    $.ajax({
        url: "https://api.neshan.org/v1/search",
        data: {
            'term': text,
            'lat': $lat == null ? 31.825680 : parseInt($lat) ,
    'lng': $long == null ? 54.374744 : parseInt($long)
},
    type: "GET",
        beforeSend: function (xhr) {
        xhr.setRequestHeader('Api-Key', 'service.UiqB5TMJ1zRQ1ujxkLNJqC99U0L6N55Inwksp7cq');
    },
    success: function (data) {
        $("#myUL").html("");
        var i = 5;
        $.each(data.items, function (key, value) {
            if (i > 0)
                i--;
            else
                exit;
            var tag = ' <li><div class="custom-checkbox2" > <label for="setLocaion' + key + '" style=" font-size: 11px;"><span class="circle"></span><a onclick="setLocaion(' + value.location.x + ',' + value.location.y + ')">' + value.title + '</a> </label> </div></li>';
            $("#myUL").append(tag);
        });
    }
});
}

function setLocaion(x, y) {
    _map.getView().setCenter(ol.proj.transform([x, y], 'EPSG:4326', 'EPSG:3857'));
    $("#myUL").html("");
    $('#selectLocationM').modal('hide');
}


function createMap($lat, $long) {
    _map = new ol.Map({
        target: 'neshan_map',
        maptype: 'dreamy',
        nowarn: true,
        key: 'web.W50lUOMqRn6G2dD8gBtirMXrCfDNyE1vJ1QEQD4I',
        view: new ol.View({
            center: ol.proj.fromLonLat([ $long == null ? 54.374744 : parseFloat($long) ,  $lat == null ? 31.825680 : parseFloat($lat) ]),
    zoom: 14,
        minZoom: 5,
        maxZoom: 19,
        extent: [4891969.8103, 2856910.3692, 7051774.4815, 4847942.0820]
}),

    controls: ol.control.defaults().extend([
        new ol.control.FullScreen()
    ]),
        interactions: ol.interaction.defaults({
        altShiftDragRotate: false,
        pinchRotate: false,
        shiftDragZoom: false
    })
});

    _map.getView().on('change:center', function () {
        update();
    });

    _map.on('moveend', function () {
        update();
    });

    setTimeout(function () {
        $('#neshan_form_locker').remove();
    }, 100);
}

function update(isError) {

    var center, result, key, zoom;
    if (isError) {
        _resultEl.html('ERROR!');
        _resultBoxEl.addClass('error');
        return;
    }

    key = $.trim(_apiKeyEl.val());
    _resultBoxEl.removeClass('error');
    if (key) {
        result = _apiBaseUrl + key;
    } else {
        result = _apiBaseUrl + '<span>YOUR_API_KEY</span>';
        _resultBoxEl.addClass('error');
    }

    center = ol.proj.toLonLat(_map.getView().getCenter());
    zoom = parseInt(_map.getView().getZoom());
    center = [parseFloat(center[0]).toFixed(6), parseFloat(center[1]).toFixed(6)];
    result += '&amp;type=' + $('#neshan_maptype_switcher_wrapper a.active').attr('rel');
    result += '&amp;zoom=' + zoom;
    result += '&amp;center=' + center[1] + ',' + center[0];
    result += '&amp;width=' + parseInt(_widthEl.val());
    result += '&amp;height=' + parseInt(_heightEl.val());
    result += '&amp;marker=' + _markerSelectEl.val();
    _latEl.val(center[1]);
    _lngEl.val(center[0]);
    _zoomEl.val(zoom);
    _resultEl.html(result);
    _resultLinkEl.attr('href', result.split('&amp;').join('&'));
    checkApiKey();

}


function checkApiKey() {
    if (_checkApiKeyTimeoutId) {
        clearTimeout(_checkApiKeyTimeoutId);
        _checkApiKeyTimeoutId = null;
    }

    if (_img) {
        _img.remove();
        _img = null;
    }

    if (_resultBoxEl.hasClass('error')) {
        return;
    }

    _checkApiKeyTimeoutId = setTimeout(function () {
        _img = $('<img />').attr('src', _resultEl.text()).on({
            'load': function () {
                console.log('OK');
                _img.remove();
                _img = null;
            },

            'error': function () {

                _img.remove();
                _img = null;
                _resultBoxEl.addClass('error');
            }
        }).appendTo($(document.body));
        _checkApiKeyPromise = null;
        _checkApiKeyTimeoutId = null;
    }, 500);
}

$('.modal-subset').on('shown.bs.modal', function (e) {
    $("#neshan_map").html("");

    'use strict';
    _apiBaseUrl = 'https://api.neshan.org/v2/static?key='

    var formEl, mapEl
    _resultEl = $('#neshan_result');
    mapEl = $('#neshan_map');
    formEl = $('#neshan_form');
    _latEl = $('#lat');
    _lngEl = $('#long');
    _zoomEl = $('#zoom');
    _widthEl = $('#width');
    _heightEl = $('#height');
    _apiKeyEl = $('#api_key');
    _resultBoxEl = $('#neshan_form_box_result');
    _resultLinkEl = $('#neshan_result_link a');
    $('#neshan_form input').val(null);
    _markerSelectEl = $('#marker').on('change', function () {
        var el = $(this);
        _markerEl.css('background-image', 'url("https://dstods.com/file/default/marker_red.png?v=2")');
        update();
    });


    $('#neshan_maptype_switcher_wrapper').on('click', 'a:not(.active)', function (evt) {
        var el = $(this);
        evt.preventDefault();
        _map.setMapType(el.attr('rel'));
        $('#neshan_maptype_switcher_wrapper .active').removeClass('active');
        el.addClass('active');
        update();
    });

    formEl.on('keyup', '.neshan_dynamic_changer', function () {
        var value, id, el = $(this), width, height;
        id = $(this).attr('id');
        if (id === 'factory_lat' || id === 'factory_lng') {
            value = parseFloat(el.val());
        } else if (id !== 'api_key') {
            value = parseInt(el.val());
        } else {
            value = el.val();
        }

        if (id !== 'api_key' && isNaN(value)) {
            el.addClass('error');
            if (id === 'factory_lat' || id === 'factory_lng') {
                $('#lat_lng_error').removeClass('hidden');
            }
            update(true);
            return;
        }

        if ((id === 'width' || id === 'height') && (value > 1200 || value < 50)) {
            el.addClass('error');
            update(true);
            return;
        }

        if (id === 'zoom' && (value > 19 || value < 5)) {
            el.addClass('error');
            update(true);
            return;
        }

        el.removeClass('error');

        if (id === 'factory_lat' || id === 'factory_lng') {
            $('#lat_lng_error').addClass('hidden');
            _map.getView().setCenter(ol.proj.fromLonLat([parseFloat(_lngEl.val()), parseFloat(_latEl.val())]));
        } else if (id === 'width' || id === 'height') {
            width = _widthEl.val();
            height = _heightEl.val();
            mapEl.css({
                'width': width,
                'height': height
            });
            _map.setSize([width, height]);
            _map.renderSync();
        } else if (id === 'zoom') {
            _map.getView().setZoom(value);
        }
        update();
    });

    _heightEl.val(mapEl.outerHeight());
    _widthEl.val(mapEl.outerWidth());
    _markerEl = $('<div id="neshan_map_center_marker" class="ol-unselectable" />').appendTo($('.ol-overlaycontainer-stopevent'));
    _markerEl.css('background-image', 'url("https://dstods.com/file/default/marker_red.png?v=2")');
    createMap();
    update();
});



