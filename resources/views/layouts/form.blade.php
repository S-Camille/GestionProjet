@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading centerText">@yield('formName')</div>

                <div class="panel-body">
                    @yield('formHead')
                        {{ csrf_field() }}

                        @yield('formContent')

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a onclick="window.history.back()" class="btn">
                                    Retour
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    @yield('btnSubmitContent')
                                </button>
                            </div>
                        </div>
                        <div>(*) champs obligatoires</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
