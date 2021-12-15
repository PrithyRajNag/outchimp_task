
<div class="col">
    <div class="row">
        <div class="col-lg-12 bg-primary pt-2 justify-content-between d-flex top-nav">
            <a href="#" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>

            <a href="{{ route('logout') }}" class="text-light mt-1"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

