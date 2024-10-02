<div>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>
    <div class="col-6 p-1 float-start text-start">
        <label class=" form-label {{($requirment)?'required':''}}">{{ __('index.as date') }}</label>
        <input wire:model.lazy="$parent.startDate" class="form-control form-control-solid start-date" type="text"
               placeholder="{{ __('index.as date') }}">
        <div class="error mt-4"> @error('startDate') {{ $message }} @enderror</div>

    </div>

    <div class="col-6 p-1 float-start text-start">
        <label class=" form-label {{($requirment)?'required':''}}">{{ __('index.from date') }}</label>
        <input wire:model.lazy="$parent.endDate" class="form-control form-control-solid end-date" type="text"
               placeholder="{{__('index.from date')}}">
        <div class="error mt-4"> @error('endDate') {{ $message }} @enderror</div>

    </div>
    @if($showDescriptionText)
        <div class="col-12 p-1 float-start text-start"><span>برای جستجو باید هر دو تاریخ را انتخاب کنید</span></div>
    @endif
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
        <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var to, from;
                to = $(".end-date").persianDatepicker({
                    altField: '.end-date',
                    altFormat: 'YYYY/MM/DD',
                    initialValue: false,
                    onSelect: function (unix) {
                        @this.
                        $parent.endDate = toEnDigit(new persianDate(unix).format('YYYY/MM/DD'));
                        to.touched = true;
                        if (from && from.options && from.options.maxDate != unix) {
                            var cachedValue = from.getState().selected.unixDate;
                            from.options = {maxDate: unix};
                            if (from.touched) {
                                from.setDate(cachedValue);
                            }
                        }
                    }
                });
                from = $(".start-date").persianDatepicker({
                    altField: '.start-date',
                    altFormat: 'YYYY/MM/DD',
                    initialValue: false,
                    onSelect: function (unix) {
                        @this.
                        $parent.startDate = toEnDigit(new persianDate(unix).format('YYYY/MM/DD'));
                        from.touched = true;
                        if (to && to.options && to.options.minDate != unix) {
                            var cachedValue = to.getState().selected.unixDate;
                            to.options = {minDate: unix};
                            if (to.touched) {
                                to.setDate(cachedValue);
                            }
                        }
                    }
                });
            });


            function toEnDigit(s) {
                return s.replace(/[\u0660-\u0669\u06f0-\u06f9]/g,    // Detect all Persian/Arabic Digit in range of their Unicode with a global RegEx character set
                    function (a) {
                        return a.charCodeAt(0) & 0xf
                    }     // Remove the Unicode base(2) range that not match
                )
            }
        </script>

    @endsection
</div>
