@extends('dashboard.partials.base')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (App\Http\Controllers\NotifyController::notifyTrigger())
        <div class="notifyTray">
            <div class="sectionTitle">
                <a href="{{ route('dashboard.admin.showNotify') }}">
                    TIENE NOTIFICACIONES PENDIENTES
                </a>
            </div>
        </div>
    @else
        <div class="notifyTray">
            <div class="sectionTitle">
                    AHORA MISMO NO TIENES NOTIFICACIONES QUE ATENDER<br/>GRACIAS
            </div>
        </div>
    @endif

@endsection
