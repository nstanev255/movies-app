{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Movies" icon="la la-question" :link="backpack_url('movies')" />
<x-backpack::menu-item title="Types" icon="la la-question" :link="backpack_url('types')" />
<x-backpack::menu-item title="Genres" icon="la la-question" :link="backpack_url('genres')" />
<x-backpack::menu-item title="People" icon="la la-question" :link="backpack_url('people')" />
<x-backpack::menu-item title="Occupations" icon="la la-question" :link="backpack_url('occupations')" />