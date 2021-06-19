@extends('Layouts.print')
@section('content')

@push('custum-styles')
    <style>
          @page{
              size:'A5';
              margin: 0;
          }

          body{
              height: 210mm;
              width: 148.5mm;
              margin: 0;
          }
    </style>
@endpush






@push('custom-scripts')
<script>
     window.print();
</script> 
@endpush
@endsection