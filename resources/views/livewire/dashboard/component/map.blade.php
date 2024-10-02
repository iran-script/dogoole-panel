<div>
    <link rel="stylesheet" href="{{ asset('panel/assets/plugins/custom/map/ol-v4.6.5.css') }}">

    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 box-map"
         id="Select-address-map" style="margin-top: 20px; padding:0">
        <div id="neshan_map_holder" class="container card_map card_map_product" style="padding: 0" wire:ignore>
            <div id="neshan_map_holder" class="container card_map card_map_product" style="padding: 0">
                <div id="neshan_map" style="">
                    <div style="justify-content: center;display: flex;background-color: transparent"
                         class="field-wrapper boxSearch  m-0 small row">
                        <input style="margin-bottom: 10px" class="relative-field rounded form-control " type="text"
                               id="myInput" onkeyup="searchLocation()" placeholder="جستجوی آدرس ...." title=""
                               autocomplete="off">
                        <ul style="flex-direction: row;list-style-type: none;" id="myUL"
                            class="card-content"></ul>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control lat ltr neshan_dynamic_changer" id="map_lat"
               wire:model="$parent.lat">
        <input type="hidden" class="form-control ltr neshan_dynamic_changer" id="map_lng"
               wire:model="$parent.lng">
    </div>
    <style>
        .custom-checkbox2 label {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-bottom: 10px;
        }

        #neshan_map_center_marker {
            position: absolute;
            right: 50%;
            top: 50%;
            width: 29px;
            height: 43px;
        }
    </style>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="{{ asset('panel/assets/plugins/custom/map/map.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/custom/map/ol.js') }}"></script>
        <script type="text/javascript">
            function searchLocation() {
                var input, filter, ul, li, a, i, txtValue;
                var text = $("#myInput").val();
                $.ajax({
                    url: "https://api.neshan.org/v1/search",
                    data: {
                        'term': text,
                        'lat': 36.287594,
                        'lng': 59.605803
                    },
                    type: "GET",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Api-Key', '{!! env('SERVICE_NESHAN') !!}');
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
            var _map, _latEl, _lngEl, _zoomEl, _widthEl, _heightEl, _apiKeyEl, _apiBaseUrl, _checkApiKeyTimeoutId,
                _checkApiKeyPromise, _resultEl, _resultBoxEl, _resultLinkEl, _markerEl, _markerSelectEl, _img;
            $(document).ready(function () {
                (function ($, undefined) {
                    'use strict';
                    _apiBaseUrl = 'https://api.neshan.org/v2/static?key='
                    var formEl, mapEl
                    _resultEl = $('#neshan_result');
                    mapEl = $('#neshan_map');
                    formEl = $('#neshan_form');
                    _latEl = $('#map_lat');
                    _lngEl = $('#map_lng');
                    _zoomEl = $('#zoom');
                    _widthEl = $('#width');
                    _heightEl = $('#height');
                    _apiKeyEl = $('#api_key');
                    _resultBoxEl = $('#neshan_form_box_result');
                    _resultLinkEl = $('#neshan_result_link a');
                    $('#neshan_form input').val(null);
                    _markerSelectEl = $('#marker').on('change', function () {
                        var el = $(this);
                        _markerEl.css('background-image', 'url("/panel/assets/plugins/custom/map/marker_red.png")');
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
                        alert('cds')
                        var value, id, el = $(this), width, height;
                        id = $(this).attr('id');
                        if (id === 'map_lat' || id === 'map_lng') {
                            value = parseFloat(el.val());
                        } else if (id !== 'api_key') {
                            value = parseInt(el.val());
                        } else {
                            value = el.val();
                        }
                        if (id !== 'api_key' && isNaN(value)) {
                            el.addClass('error');
                            if (id === 'map_lat' || id === 'map_lng') {
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
                        if (id === 'map_lat' || id === 'map_lng') {
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
                    createMap();
                    update();
                    _heightEl.val(mapEl.outerHeight());
                    _widthEl.val(mapEl.outerWidth());
                    _markerEl = $('<div id="neshan_map_center_marker" class="ol-unselectable" />').appendTo($('.ol-overlaycontainer-stopevent'));
                    _markerEl.css('background-image', 'url("/panel/assets/plugins/custom/map/marker_red.png")');
                    function createMap() {
                        _map = new ol.Map({
                            target: 'neshan_map',
                            maptype: 'dreamy',
                            nowarn: true,
                            key:"{!! env('WEB_NESHAN') !!}",
                            view: new ol.View({
                                center: ol.proj.fromLonLat([{{ $lng == null ? 59.605803 : (float)$lng }}, {{ $lat == null ? 36.287594: (float)$lat }}]),
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
                        @this.$parent.lat=center[1];
                        @this.$parent.lng=center[0];
                        _zoomEl.val(zoom);
                        _resultEl.html(result);
                        _resultLinkEl.attr('href', result.split('&amp;').join('&'));
                        checkApiKey();
                        var element = document.getElementById('map_lat');
                        element.dispatchEvent(new Event('input'));
                        var element2 = document.getElementById('map_lng');
                        element2.dispatchEvent(new Event('input'));
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
                                    console.log('ER');
                                    _img.remove();
                                    _img = null;
                                    _resultBoxEl.addClass('error');
                                }
                            }).appendTo($(document.body));
                            _checkApiKeyPromise = null;
                            _checkApiKeyTimeoutId = null;
                        }, 500);
                    }
                })(jQuery);
            })


            // $(document).ready(function () {
            //     var to, from;
            //     to = $(".end-date").persianDatepicker({
            //         altField: '.end-date',
            //         altFormat: 'YYYY/MM/DD',
            //         initialValue: false,
            //         onSelect: function (unix) {
            //         @this.$parent.endDate =toEnDigit(new persianDate(unix).format('YYYY/MM/DD'));
            //             to.touched = true;
            //             if (from && from.options && from.options.maxDate != unix) {
            //                 var cachedValue = from.getState().selected.unixDate;
            //                 from.options = {maxDate: unix};
            //                 if (from.touched) {
            //                     from.setDate(cachedValue);
            //                 }
            //             }
            //         }
            //     });
            //     from = $(".start-date").persianDatepicker({
            //         altField: '.start-date',
            //         altFormat: 'YYYY/MM/DD',
            //         initialValue: false,
            //         onSelect: function (unix) {
            //         @this.$parent.startDate = toEnDigit(new persianDate(unix).format('YYYY/MM/DD'));
            //             from.touched = true;
            //             if (to && to.options && to.options.minDate != unix) {
            //                 var cachedValue = to.getState().selected.unixDate;
            //                 to.options = {minDate: unix};
            //                 if (to.touched) {
            //                     to.setDate(cachedValue);
            //                 }
            //             }
            //         }
            //     });
            // });
            // function toEnDigit(s) {
            //     return s.replace(/[\u0660-\u0669\u06f0-\u06f9]/g,    // Detect all Persian/Arabic Digit in range of their Unicode with a global RegEx character set
            //         function(a) { return a.charCodeAt(0) & 0xf }     // Remove the Unicode base(2) range that not match
            //     )
            // }
        </script>
    @endsection
</div>
