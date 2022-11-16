@if (Session::has('msgSuccess'))
    @php
        Alert::success(Session::get("msgSuccess"));
    @endphp
@endif

@if (Session::has('msgError'))
    @php
        Alert::error(Session::get("msgError"));
    @endphp
@endif