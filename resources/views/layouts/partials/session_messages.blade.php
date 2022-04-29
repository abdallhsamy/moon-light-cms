@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
        $(document).Toasts('create', {
            title: 'Whoops! Something went wrong.',
            body: '{{ $error }}'
        })
        @endforeach
    </script>
@endif

@if(session()->has('status'))
    <script>
        $(document).Toasts('create', {
            title: 'notification.',
            body: '{{ session('status') }}'
        })
    </script>
@endif
