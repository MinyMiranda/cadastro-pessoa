@extends('layouts.app')

@section('content')
<transition name="fade" mode="out-in">
    <router-view />
</transition>
@endsection