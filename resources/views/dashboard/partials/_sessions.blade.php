@if (session('success'))
    <script>
        new Noty({
            layout: 'topRight',
            text: "{{session('success') }}",
            killer: true, //هذه بمعنى لو عندي أكتر من نوتفيكاشن واحدة التي تظهر
            timeout: 2000,
        }).show();
    </script>
@endif




