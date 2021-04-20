@extends('layouts.default')

@section('content')
<h1>Homepage</h1>
<ul>
  <li><a href="/filemanager/demo">Demo File Manager + TinyMCE</a></li>
  <li><a href="/demo-dompdf">Demo DOM PDF</a></li>
  <li><a href="/demo-laravel-excel">Demo Laravel Excel</a></li>
</ul>
@include('components/file-manager')
<br>
@include('components/tiny-mce')
@endsection