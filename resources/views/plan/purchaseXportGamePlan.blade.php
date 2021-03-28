@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<div class="container">
        <div class="section-header">

          <h3>Adquirir plan</h3>
          <p>Módulo para adquirir un plan y conseguir más beneficios en los XportGames</p>

        </div>
        
        <form action="{{ route('plan.purchaseXportGamePlanStore') }}" method="post" id="form_purchase_plan">

          {{ csrf_field() }}
          <input type="hidden" name="hIdPlan" value="{{ $planInfo->planid}}">

          <div class="row g-0 bg-light position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
              <img src="{{ asset('img/about_registr.jpg') }}" class="w-100" alt="...">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
              <h5 class="mt-0"><b>{{ $planInfo->planname }}</b></h5>
              <p>{{ $planInfo->plandescription }}</p>
              <p>Duración: <b>{{ $planInfo->expirationname }}</b></p>
              <p>Costo: {{ $planInfo->planamount }} {!! env('GOLD') !!}</p>
              <button type="submit" class="btn btnPlusXG btn-sm">Adquirir plan</button>
            </div>
          </div>

        </form>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/plan.js') }}?v={{ env('VERSION_APP') }}"></script>
@endsection

