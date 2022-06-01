@include('styles.style')
@include('partials.sidebar')

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			@if(Auth::guard('admin')->check())         
			@if(Auth::guard('admin')->user()->role('admin')	)
				<a href="#" id = "navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					<span class="badge badge-danger">
						@if(Auth::guard('admin')->user()->unreadNotifications->count())
							{{Auth::guard('admin')->user()->unreadNotifications->count()}}</span>@endif
							<span><i class='bx bxs-bell'></i></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class = "btn btn-link"href="{{route('markAsRead')}}">Mark all as Read</a>
						@foreach(Auth::guard('admin')->user()->unreadNotifications as $notification)
						<a class="dropdown-item">{{$notification->data['hall_name']}} Hall Added</a>
						@endforeach
				</div>
				@endif
				@endif
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			@include('partials.head')
			@yield('content')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
@include('scripts.script')