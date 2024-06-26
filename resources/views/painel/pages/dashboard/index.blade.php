@extends('painel.layouts.master')

@section('header')
	<div class="content-header-left col-md-6 col-12">
		<h1 class="content-header-title mb-0">Dashboard</h1>
	</div>
	<div class="content-header-right text-md-right col-md-6 col-12">
		{{--  @include('instaciaFilial')  --}}
	</div>
	<div class="col-12">
		<hr/>
	</div>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">CABAL DARKNESS</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">
                <div class="bs-callout-success callout-border-left callout-round callout-bordered mt-1 p-2 py-1">
                    <strong>Olá,{{ Auth::user()->ID }}</strong>
                    <p>Seja bem vindo ao Cabal Darkness. Nesse painel você vai encontrar tudo que você precisa, Caso tenha algum problema entre em contato pelo nosso DISCORD!
                    </p>
                </div>
            </div>
          </div>
        </div>
      </div>

  </div>

@endsection
