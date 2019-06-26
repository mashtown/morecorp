<div class="container-fluid top-head">
    <div class="row">
        <div class="col-sm-3 p-r-0">{{ config('app.name', 'Laravel') }}</div>
        <div class="col-sm-7 p-l-0">
            <form class="">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search product and hit enter">
                </div>
                <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            </form>
        </div>
        <div class="col-sm-2 text-center">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>