@extends('layouts.emails')
@section('content')

    <h3>{{ __('Emails/emails.dear_user', ['name' => $invoice->customer_name]) }}</h3>

    <h4>{{ __('Emails/emails.greetings') }}</h4>

    <p>{!! __('Emails/emails.find_an_invoice') !!}</p>

@endsection
