<div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirmer le Mot de Passe') }}</div>

                <div class="card-body">
                    {{ __('Changer votre mot de passe avant de continuer.') }}
  <form action="{{route('login.password')}}" method="post">
         @csrf
                        <div class="form-group row mt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nouveau Mot de Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model="password" required autocomplete="current-password">
                                <input type="hidden" name="phone" id="" value ="{{ isset($_GET['parameterKey']) ? $_GET['parameterKey'] : "" @endif}} ">
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                           
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Confirmez le mot de Passe') }}
                                </button>

                            </div>
                        </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
