<p>test</p>

<a href="{{route('backendLogin')}}">backend</a>



<h1>suggest</h1>
<form method="post" action="{{route('BN_names_mock_suggest')}}">
    @csrf
    <input type="text" name="name_th" placeholder="name_th" autocomplete="off" />
    <input type="text" name="name_en" placeholder="name_en" autocomplete="off"/>
    <input type="text" name="email" placeholder="email" />
    <input type="text" name="phone"  placeholder="phone"/>

    <button type="submit" class="">OK</button>
</form>