<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>

    <input id="text" value="{{ $text }}" type="hidden" name="content">
    <trix-editor input="text"></trix-editor>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    @section('scripts')
        <script>
            var trixEditor = document.getElementById("text")
            addEventListener("trix-blur", function (event) {
            @this.$parent.text =  trixEditor.getAttribute('value');
            })
        </script>
    @endsection
</div>
